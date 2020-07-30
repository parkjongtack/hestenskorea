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

class Main extends Controller
{

	public function main(Request $request) {

		$board_list_pcslider_main = DB::table('board') 
								->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
								->where('board_type', 'pcslider')
								//->where('start_period', '<=', date("Y-m-d"))
								//->where('end_period', '>=', date("Y-m-d"))
								->where('use_status', 'Y')
								->orderBy('priority','asc')
								->get();			

		$return_list['data'] = $board_list_pcslider_main;

		return view('index', $return_list); 

	}

}