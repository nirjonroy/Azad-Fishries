<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function UnlinkImage($filepath,$fileName)
	{
	    $old_image =public_path($filepath.$fileName);
	    if (file_exists($old_image)) {
	       @unlink($old_image);
	    }
	}
	
}
