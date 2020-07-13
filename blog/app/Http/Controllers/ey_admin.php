<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Classes\CommonFunction;
use App\Classes\PagingFunction;
use App\Admin;
use App\User;
use Auth;
use DB;
use App\Classes\jsonRPCClient;

class Ey_admin extends Controller
{

    public function ey_login(Request $request) {

		return view('ey_login'); 

	}

	public function ey_acc(Request $request) {

		return view('ey_acc'); 

	}

	public function ey_beds(Request $request) {

		return view('ey_beds'); 

	}

	public function ey_press(Request $request) {

		return view('ey_press'); 

    }
    
    public function ey_media(Request $request) {

		return view('ey_media'); 

    }
    
    public function ey_pcslider(Request $request) {

		return view('ey_pcslider'); 

    }
    
    public function ey_moslider(Request $request) {

		return view('ey_moslider'); 

    }
    
    public function ey_pcpopup(Request $request) {

		return view('ey_pcpopup'); 

    }
    
    public function ey_mopopup(Request $request) {

		return view('ey_mopopup'); 

	}

    public function ey_write_notice(Request $request) {

		return view('ey_write_notice'); 

    }
    
}