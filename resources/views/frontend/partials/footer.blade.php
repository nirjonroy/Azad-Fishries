<div class="uren-footer_area">
<div class="footer-top_area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="newsletter-area">
                    <h3 class="title">Join Our Newsletter Now</h3>
                    <p class="short-desc">Get E-mail updates about our latest shop and special offers.</p>
                    <div class="newsletter-form_wrap">
                        <form action="{{ action ('HomeController@emailStore') }}" method="post">
                            @csrf
                            <div id="">
                                <div id="mc-form" class="mc-form subscribe-form">
                                    <input class="newsletter-input" type="email" autocomplete="off" placeholder="Enter your email" name="email" required />
                                    @if($errors->has('email'))
                                        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                    @endif
                                    <button type="submit" class="newsletter-btn" id="mc-submit">Subscribe</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer-middle_area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="footer-widgets_info">
                    <div class="footer-widgets_logo">
                        <a href="#">
                            <img src="{{ asset('assets/images/menu/logo/1.png')}}" alt="Uren's Footer Logo">
                        </a>
                    </div>
                    <div class="widget-short_desc">
                        <!--<p>We are a team of designers and developers that create high quality HTML Template &-->
                        <!--    Woocommerce, Shopify Theme.-->
                        <!--</p>-->
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="footer-widgets_area">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="footer-widgets_title">
                                <h3>Social Link</h3>
                            </div>
                            <div class="uren-social_link">
                                <ul>
                                    <li class="facebook">
                                        <a href="https://www.facebook.com/azadfisheries" data-toggle="tooltip" target="_blank" title="Facebook">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <!--<li class="twitter">-->
                                    <!--    <a href="https://twitter.com/" data-toggle="tooltip" target="_blank" title="Twitter">-->
                                    <!--        <i class="fab fa-twitter-square"></i>-->
                                    <!--    </a>-->
                                    <!--</li>-->
                                    <li class="google-plus">
                                        <a href="https://www.youtube.com/channel/UC4kmvBB-iW1g07NjsKfQ-_A" data-toggle="tooltip" target="_blank" title="youtube">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <!--<li class="instagram">-->
                                    <!--    <a href="https://rss.com/" data-toggle="tooltip" target="_blank" title="Instagram">-->
                                    <!--        <i class="fab fa-instagram"></i>-->
                                    <!--    </a>-->
                                    <!--</li>-->
                                </ul>
                            </div>
                            
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="footer-widgets_title">
                                <h3>Customer Service</h3>
                            </div>
                            <div class="footer-widgets">
                                <ul>
                                    <li><a href="javascript:void(0)">Delivery Information</a></li>
                                    <li><a href="{{ route('privacyPolicy')}}">Privacy Policy</a></li>
                                    <li><a href="{{ route('termCondition')}}">Terms & Conditions</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="footer-widgets_title">
                                <h3>My Account</h3>
                            </div>
                            <div class="footer-widgets">
                                <ul>
                                    <li><a href="{{ route('myAccount')}}">My Account</a></li>
                                    <li><a href="{{ route('user_order_list')}}">Order History</a></li>
                                    <li><a href="{{ route('wishlists.index')}}">Wish List</a></li>
                              
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer-bottom_area">
    <div class="container-fluid">
        <div class="footer-bottom_nav">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright">
                        
                    </div>

                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="payment">
                        <a href="#">
                            <img src="{{ asset('assets/images/footer/payment/1.png')}}" alt="Uren's Payment Method">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<!-- Messenger Chat plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "110514603853651");
      chatbox.setAttribute("attribution", "biz_inbox");

      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v12.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>