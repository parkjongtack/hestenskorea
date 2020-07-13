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

class Sub extends Controller
{

	public function acc(Request $request) {

		return view('sub/acc'); 

	}

	public function beds(Request $request) {

		return view('sub/beds'); 

	}

	public function beds_sub(Request $request) {

		return view('sub/beds_sub'); 

	}

	public function heritage01(Request $request) {

		return view('sub/heritage01'); 

	}

	public function heritage02(Request $request) {

		return view('sub/heritage02'); 

	}

	public function heritage03(Request $request) {

		return view('sub/heritage03'); 

	}

	public function materials(Request $request) {

		return view('sub/materials'); 

	}

	public function news(Request $request) {

		if($request->tab == 1) {
			$board_type = 'press';
		} else {
			$board_type = 'media';
		}

		$board_inform = DB::table('board')
					->select(DB::raw('*'))
					->where('board_type', $board_type)
					->get();

		$return_list['data'] = $board_inform;
		
		return view('sub/news', $return_list); 

	}

	public function contact_us(Request $request) {

		return view('sub/contact_us'); 

	}

}