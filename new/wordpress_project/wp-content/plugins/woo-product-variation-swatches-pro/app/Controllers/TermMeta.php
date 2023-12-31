<?php

namespace Rtwpvs\Controllers;

use Rtwpvs\Helpers\Functions;
use Rtwpvs\Helpers\Options;

class TermMeta
{

    private $taxonomy;
    private $post_type = 'product';
    private $fields = array();

    public function __construct($taxonomy, $fields = array()) {

        $this->taxonomy = $taxonomy;
        $this->fields = $fields;

        add_action('delete_term', array($this, 'delete_term'), 5, 4);

        // Add form
        add_action("{$this->taxonomy}_add_form_fields", array($this, 'add'));
        add_action("{$this->taxonomy}_edit_form_fields", array($this, 'edit'), 10);
        add_action("created_term", array($this, 'save'), 10, 3);
        add_action("edit_term", array($this, 'save'), 10, 3);
        add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));

        // Add columns
        add_filter("manage_edit-{$this->taxonomy}_columns", array($this, 'taxonomy_columns'));
        add_filter("manage_{$this->taxonomy}_custom_column", array($this, 'taxonomy_column'), 10, 3);

    }

    public function taxonomy_columns($columns) {
        $new_columns = array();
        if (isset($columns['cb'])) {
            $new_columns['cb'] = $columns['cb'];
            unset($columns['cb']);
        }
        $new_columns['rtwpvs-meta-preview'] = '';

        return array_merge($new_columns, $columns);
    }

    public function taxonomy_column($columns, $column, $term_id) {
        $attribute = Functions::get_wc_attribute_taxonomy($this->taxonomy);
        $fields = Options::get_taxonomy_meta_fields($attribute->attribute_type);
        switch ($attribute->attribute_type) {
            case 'color':
                $key = $fields[0]['id'];
                $is_dual_key = $fields[1]['id'];
                $dual_color_key = $fields[2]['id'];

                $value = sanitize_hex_color(get_term_meta($term_id, $key, true));

                $is_dual = (bool)(get_term_meta($term_id, $is_dual_key, true) === 'yes');
                if ($is_dual) {
                    $secondary_color = sanitize_hex_color(get_term_meta($term_id, $dual_color_key, true));
                    printf('<div class="rtwpvs-preview rtwpvs-color-preview rtwpvs-dual-color-preview" style="background: linear-gradient(-45deg, %1$s 0%%, %1$s 50%%, %2$s 50%%, %2$s 100%%);"></div>', esc_attr($secondary_color), esc_attr($value));
                } else {
                    printf('<div class="rtwpvs-preview rtwpvs-color-preview" style="background-color:%s;"></div>', esc_attr($value));
                }
                break;
            case 'image':
                $key = $fields[0]['id'];
                $attachment_id = absint(get_term_meta($term_id, $key, true));
                $image = wp_get_attachment_image_url($attachment_id);

                printf('<img src="%s" class="rtwpvs-preview rtwpvs-image-preview" />', esc_url($image));
                break;
            case 'button':
            default:
                do_action('rtwpvs_variation_attribute_preview', $term_id, $attribute, $fields);
                break;
        }
    }

    public function delete_term($term_id, $tt_id, $taxonomy, $deleted_term) {
        global $wpdb;

        $term_id = absint($term_id);
        if ($term_id and $taxonomy == $this->taxonomy) {
            $wpdb->delete($wpdb->termmeta, array('term_id' => $term_id), array('%d'));
        }
    }

    public function enqueue_scripts() {
        wp_enqueue_media();
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');
    }

    public function save($term_id, $tt_id = '', $taxonomy = '') {

        if ($taxonomy == $this->taxonomy) {
            foreach ($this->fields as $field) {
                $need_to_remove_checkbox_for_unselected = true;
                foreach ($_POST as $post_key => $post_value) {
                    if ($field['id'] == $post_key) {
                        switch ($field['type']) {
                            case 'text':
                            case 'color':
                                $post_value = esc_html($post_value);
                                break;
                            case 'url':
                                $post_value = esc_url($post_value);
                                break;
                            case 'image':
                                $post_value = absint($post_value);
                                break;
                            case 'textarea':
                                $post_value = esc_textarea($post_value);
                                break;
                            case 'checkbox':
                                $need_to_remove_checkbox_for_unselected = false;
                                $post_value = $post_value === 'yes' ? 'yes' : '';
                                break;
                            case 'editor':
                                $post_value = wp_kses_post($post_value);
                                break;
                            case 'select':
                            case 'select2':
                                $post_value = sanitize_key($post_value);
                                break;
                            default:
                                do_action('rtwpvs_save_term_meta', $term_id, $field, $post_value, $taxonomy);
                                break;
                        }
                        update_term_meta($term_id, $field['id'], $post_value);
                    }
                    if ('checkbox' === $field['type'] && $need_to_remove_checkbox_for_unselected) {
                        delete_term_meta($term_id, $field['id']);
                    }
                }
            }
            do_action('rtwpvs_after_term_meta_saved', $term_id, $taxonomy);
        }
    }

    public function add() {
        $this->generate_fields();
    }

    private function generate_fields($term = false) {

        $screen = get_current_screen();

        if (($screen->post_type == $this->post_type) and ($screen->taxonomy == $this->taxonomy)) {
            self::generate_form_fields($this->fields, $term);
        }
    }

    public static function generate_form_fields($fields, $term) {

        $fields = apply_filters('rtwpvs_term_meta_fields', $fields, $term);

        if (empty($fields)) {
            return;
        }

        foreach ($fields as $field) {

            $field = apply_filters('rtwpvs_term_meta_field', $field, $term);

            $field['id'] = esc_html($field['id']);

            if (!$term) {
                $field['value'] = isset($field['default']) ? $field['default'] : '';
            } else {
                $field['value'] = get_term_meta($term->term_id, $field['id'], true);
            }

            $field['size'] = isset($field['size']) ? $field['size'] : '40';
            $field['required'] = (isset($field['required']) and $field['required'] == true) ? ' aria-required="true"' : '';
            $field['placeholder'] = (isset($field['placeholder'])) ? ' placeholder="' . $field['placeholder'] . '" data-placeholder="' . $field['placeholder'] . '"' : '';
            $field['desc'] = (isset($field['desc'])) ? $field['desc'] : '';

            $field['dependency'] = (isset($field['dependency'])) ? $field['dependency'] : array();

            self::field_start($field, $term);
            switch ($field['type']) {
                case 'text':
                case 'url':
                    ob_start();
                    ?>
                    <input name="<?php echo $field['id'] ?>" id="<?php echo $field['id'] ?>"
                           type="<?php echo $field['type'] ?>"
                           value="<?php echo $field['value'] ?>"
                           size="<?php echo $field['size'] ?>" <?php echo $field['required'] . $field['placeholder'] ?>>
                    <?php
                    echo ob_get_clean();
                    break;
                case 'color':
                    ob_start();
                    ?>
                    <input name="<?php echo $field['id'] ?>" id="<?php echo $field['id'] ?>" type="text"
                           class="rtwpvs-color-picker" value="<?php echo $field['value'] ?>"
                           data-default-color="<?php echo $field['value'] ?>"
                           size="<?php echo $field['size'] ?>" <?php echo $field['required'] . $field['placeholder'] ?>>
                    <?php
                    echo ob_get_clean();
                    break;
                case 'textarea':
                    ob_start();
                    ?>
                    <textarea name="<?php echo $field['id'] ?>" id="<?php echo $field['id'] ?>" rows="5"
                              cols="<?php echo $field['size'] ?>" <?php echo $field['required'] . $field['placeholder'] ?>><?php echo $field['value'] ?></textarea>
                    <?php
                    echo ob_get_clean();
                    break;
                case 'editor':
                    $field['settings'] = isset($field['settings'])
                        ? $field['settings']
                        : array(
                            'textarea_rows' => 8,
                            'quicktags'     => false,
                            'media_buttons' => false
                        );
                    ob_start();
                    wp_editor($field['value'], $field['id'], $field['settings']);
                    echo ob_get_clean();
                    break;
                case 'select':
                case 'select2':

                    $field['options'] = isset($field['options']) ? $field['options'] : array();
                    $field['multiple'] = isset($field['multiple']) ? ' multiple="multiple"' : '';
                    $css_class = ($field['type'] == 'select2') ? 'rtwpvs-selectwoo' : '';

                    ob_start();
                    ?>
                    <select name="<?php echo $field['id'] ?>" id="<?php echo $field['id'] ?>"
                            class="<?php echo $css_class ?>" <?php echo $field['multiple'] ?>>
                        <?php
                        foreach ($field['options'] as $key => $option) {
                            echo '<option' . selected($field['value'], $key, false) . ' value="' . $key . '">' . $option . '</option>';
                        }
                        ?>
                    </select>
                    <?php
                    echo ob_get_clean();
                    break;
                case 'image':
                    ob_start();
                    ?>
                    <div class="rtwpvs-image-wrapper">
                        <div class="image-preview">
                            <img data-placeholder="<?php echo esc_url(self::placeholder_img_src()); ?>"
                                 src="<?php echo esc_url(self::get_img_src($field['value'])); ?>" width="60px"
                                 height="60px"/>
                        </div>
                        <div class="button-wrapper">
                            <input type="hidden" id="<?php echo $field['id'] ?>" name="<?php echo $field['id'] ?>"
                                   value="<?php echo esc_attr($field['value']) ?>"/>
                            <button type="button"
                                    class="rtwpvs-upload-image button button-primary button-small"><?php esc_html_e('Upload / Add image', 'woo-product-variation-swatches'); ?></button>
                            <button type="button"
                                    style="<?php echo(empty($field['value']) ? 'display:none' : '') ?>"
                                    class="rtwpvs-remove-image button button-danger button-small"><?php esc_html_e('Remove image', 'woo-product-variation-swatches'); ?></button>
                        </div>
                    </div>
                    <?php
                    echo ob_get_clean();
                    break;
                case 'checkbox':
                    $label = isset($field['trigger_label']) ? $field['trigger_label'] : $field['label'];
                    ob_start();
                    ?>
                    <label for="<?php echo esc_attr($field['id']) ?>">

                        <input name="<?php echo $field['id'] ?>" id="<?php echo $field['id'] ?>"
                            <?php checked($field['value'], 'yes') ?>
                               type="<?php echo $field['type'] ?>"
                               value="yes" <?php echo $field['required'] . $field['placeholder'] ?>>

                        <?php echo $label ?></label>
                    <?php
                    echo ob_get_clean();
                    break;
                default:
                    do_action('rtwpvs_term_meta_field', $field, $term);
                    break;

            }
            self::field_end($field, $term);

        }
    }

    private static function field_start($field, $term) {
        $depends = empty($field['dependency']) ? '' : "data-rt-depends='" . wp_json_encode($field['dependency']) . "'";
        $classes = array($field['id']);
        if (isset($field['class'])) {
            $classes[] = $field['class'];
        }
        ob_start();
        if (!$term) {
            ?>
            <div <?php echo $depends ?> class="form-field <?php echo esc_attr(implode(' ', $classes)) ?> <?php echo empty($field['required']) ? '' : 'form-required' ?>">
            <label for="<?php echo esc_attr($field['id']) ?>"><?php echo $field['label'] ?></label>
            <?php
        } else {
            ?>
            <tr <?php echo $depends ?> class="form-field  <?php echo esc_attr($field['id']) ?> <?php echo empty($field['required']) ? '' : 'form-required' ?>">
            <th scope="row"><label
                        for="<?php echo esc_attr($field['id']) ?>"><?php echo $field['label'] ?></label></th>
            <td>
            <?php
        }
        echo ob_get_clean();
    }

    private static function get_img_src($thumbnail_id = false) {
        if (!empty($thumbnail_id)) {
            $image = wp_get_attachment_thumb_url($thumbnail_id);
        } else {
            $image = self::placeholder_img_src();
        }

        return $image;
    }

    private static function placeholder_img_src() {
        return rtwpvs()->get_images_uri('placeholder.png');
    }

    private static function field_end($field, $term) {

        ob_start();
        if (!$term) {
            ?>
            <p><?php echo $field['desc'] ?></p>
            </div>
            <?php
        } else {
            ?>
            <p class="description"><?php echo $field['desc'] ?></p></td>
            </tr>
            <?php
        }
        echo ob_get_clean();
    }

    public function edit($term) {
        $this->generate_fields($term);
    }

}

