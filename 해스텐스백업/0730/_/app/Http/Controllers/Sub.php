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

		$boardType = request()->segment(2);

		$paging_option = array(
			"pageSize" => 10,
			"blockSize" => 5
		);		

		$thisPage = ($request->page) ? $request->page : 1 ;
		$paging = new PagingFunction($paging_option);

		$totalQuery = DB::table('board');
		if($request->key != "") {
			$totalQuery->where(function($totalQuery) use($request){
				$totalQuery->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		$totalQuery->where('use_status', 'Y');
		$totalQuery->where('board_type', $boardType);
		$totalQuery->where('category2', request()->segment(3));
        $totalQuery->where(function($query_set) {
                $query_set->where('top_type', '<>', 'Y')
                ->orWhere('top_type', null);
        });

		if($request->category_type) {
			$totalQuery->where('category', $request->category_type);
		}

		if(request()->segment(2) == "ey_data_room" && !$request->category_type) {
			$totalQuery->where('category', 1);
		}

		$totalCount = $totalQuery->get()->count();
		
		$paging_view = $paging->paging($totalCount, $thisPage, "page");
		
		$query = DB::table('board')
				->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
				->orderBy('priority', 'asc');
				
		if($request->key != "") {
			$query->where(function($query) use($request){
				$query->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		$query->where('use_status', 'Y');
		$query->where('board_type', $boardType);
		$query->where('category2', request()->segment(3));
        $query->where(function($query_set2) {
                $query_set2->where('top_type', '<>', 'Y')
                ->orWhere('top_type', null);
        });
		
		//$query->where('top_type', '<>', 'Y');
		//$query->orWhere('top_type', null);
		
		if($request->category_type) {
			$query->where('category', $request->category_type);
		}

		if(request()->segment(2) == "ey_data_room" && !$request->category_type) {
			$query->where('category', 1);
		}

		if($request->page != "" && $request->page > 1) {
			$query->skip(($request->page - 1) * $paging_option["pageSize"]);
		}

		$list = $query->take($paging_option["pageSize"])->get();
		
		// 게시판 출력 글 번호 계산
		$number = $totalCount-($paging_option["pageSize"]*($thisPage-1));

		$board_top_count = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', $boardType)
					->where('top_type', 'Y')
					->where('category2', request()->segment(3))
					->get()->count();

		$board_top_list = DB::table('board') 
					->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
					->where('board_type', $boardType)
					->where('top_type', 'Y')
					->where('category2', request()->segment(3))
					->get();

		$return_list = array();
		$return_list["i"] = 1;
		$return_list["j"] = 1;
		$return_list["board_top_count"] = $board_top_count;
		$return_list["board_top_list"] = $board_top_list;
		$return_list["data"] = $list;
		$return_list["data2"] = $list;
		$return_list["number"] = $number;
		$return_list["key"] = $request->key;
		$return_list["totalCount"] = $totalCount;
		$return_list["paging_view"] = $paging_view;
		$return_list["page"] = $thisPage;
		$return_list["key"] = $request->key;

		return view('sub/acc', $return_list); 

	}

	public function beds(Request $request) {

		$boardType = request()->segment(2);

		$paging_option = array(
			"pageSize" => 30000,
			"blockSize" => 5
		);		

		$thisPage = ($request->page) ? $request->page : 1 ;
		$paging = new PagingFunction($paging_option);

		$totalQuery = DB::table('board');
		if($request->key != "") {
			$totalQuery->where(function($totalQuery) use($request){
				$totalQuery->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		$totalQuery->where('use_status', 'Y');
		$totalQuery->where('board_type', $boardType);
        $totalQuery->where(function($query_set) {
                $query_set->where('top_type', '<>', 'Y')
                ->orWhere('top_type', null);
        });

		if($request->category_type) {
			$totalQuery->where('category', $request->category_type);
		}

		if(request()->segment(2) == "ey_data_room" && !$request->category_type) {
			$totalQuery->where('category', 1);
		}

		$totalCount = $totalQuery->get()->count();
		
		$paging_view = $paging->paging($totalCount, $thisPage, "page");
		
		$query = DB::table('board')
				->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
				->orderBy('priority', 'asc');
				
		if($request->key != "") {
			$query->where(function($query) use($request){
				$query->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		$query->where('use_status', 'Y');
		$query->where('board_type', $boardType);
        $query->where(function($query_set2) {
                $query_set2->where('top_type', '<>', 'Y')
                ->orWhere('top_type', null);
        });
		
		//$query->where('top_type', '<>', 'Y');
		//$query->orWhere('top_type', null);
		
		if($request->category_type) {
			$query->where('category', $request->category_type);
		}

		if(request()->segment(2) == "ey_data_room" && !$request->category_type) {
			$query->where('category', 1);
		}

		if($request->page != "" && $request->page > 1) {
			$query->skip(($request->page - 1) * $paging_option["pageSize"]);
		}

		$list = $query->take($paging_option["pageSize"])->get();
		
		// 게시판 출력 글 번호 계산
		$number = $totalCount-($paging_option["pageSize"]*($thisPage-1));

		$board_top_count = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', $boardType)
					->where('top_type', 'Y')
					->get()->count();

		$board_top_list = DB::table('board') 
					->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
					->where('board_type', $boardType)
					->where('top_type', 'Y')
					->get();

		$return_list = array();
		$return_list["board_top_count"] = $board_top_count;
		$return_list["board_top_list"] = $board_top_list;
		$return_list["data"] = $list;
		$return_list["number"] = $number;
		$return_list["key"] = $request->key;
		$return_list["totalCount"] = $totalCount;
		$return_list["paging_view"] = $paging_view;
		$return_list["page"] = $thisPage;
		$return_list["key"] = $request->key;

		return view('sub/beds', $return_list); 

	}

	public function beds_sub(Request $request) {

		$boardType = $request->board_idx;

		$paging_option = array(
			"pageSize" => 3000,
			"blockSize" => 5
		);		

		$thisPage = ($request->page) ? $request->page : 1 ;
		$paging = new PagingFunction($paging_option);

		$totalQuery = DB::table('file_list');

		$totalQuery->where('board_idx', $boardType);

		$totalCount = $totalQuery->get()->count();
		
		$paging_view = $paging->paging($totalCount, $thisPage, "page");
		
		$query = DB::table('file_list')
				->select(DB::raw('*'))
				->orderBy('priority', 'asc');

		$query->where('board_idx', $boardType);
		
		if($request->page != "" && $request->page > 1) {
			$query->skip(($request->page - 1) * $paging_option["pageSize"]);
		}

		$list = $query->take($paging_option["pageSize"])->get();
		
		//print_r($list);
		//exit;

		$html_data = "";
		$sub_main_status_check = "loop_not";
		foreach($list as $key => $value) {

			//echo "sub_main_status=".$value->sub_main_status."<br/>";
			//exit;

			if($value->sub_main_status == "N") {

				//echo "N";

				if($sub_main_status_check == "loop_not") {

					$html_data .= '<div class="swiper-container beds_sub_slide" style="margin-bottom:10px;">';
					$html_data .= '	<div class="swiper-wrapper">';

					$sub_html_inform = DB::table('file_list') 
								->select(DB::raw('*'))
								->where('board_idx', $value->board_idx)
								->where('sub_main_status', 'N')
								->get();
					
					//echo count($sub_html_inform);

					foreach($sub_html_inform as $key2 => $value2) {

						$html_data .= '<div class="beds_detail swiper-slide">';
						$html_data .= '<img class="mo_none" src="/storage/app/images/'.$value2->real_file_name.'" alt="">';
						$html_data .= '<img class="mo_block" src="/storage/app/images/'.$value2->real_file_name2.'" alt="">';
						$html_data .= '<div class="besd_explain">';
						$html_data .= '<div class="besd_explain_title">';
						$html_data .= '<p class="beds_txt hei85p_kr">'.$value2->sub_subject.'</p>';
						$html_data .= '<p class="beds_txt hei85p_kr">'.$value2->sub_subject2.'</p>';
						$html_data .= '</div>';
						$html_data .= '<div class="besd_explain_detail">';
						$html_data .= 'COLOR : <b>'.$value2->sub_subject3.'</b>';
						$html_data .= '</div>';
						$html_data .= '</div>';
						$html_data .= '</div>';					

					}
					
					$html_data .= '</div>';
					$html_data .= '<div class="swiper-pagination"></div>';
					$html_data .= '<div class="swiper-button-next"></div>';
					$html_data .= '<div class="swiper-button-prev"></div>';
					$html_data .= '</div>';
					
					$sub_main_status_check = "loop_ok";

				}

			} else {


				$html_data .= '<div class="beds_bot" style="margin-bottom:10px;">';
				$html_data .= '	<img class="mo_none" src="/storage/app/images/'.$value->real_file_name.'" alt="">';
				$html_data .= '	<img class="mo_block" src="/storage/app/images/'.$value->real_file_name2.'" alt="">';
				$html_data .= '</div>';

			}

		}
		

		//echo htmlspecialchars($html_data);
		//echo $html_data;
		//exit;
		
		// 게시판 출력 글 번호 계산
		$number = $totalCount-($paging_option["pageSize"]*($thisPage-1));
		$return_list = array();
		$return_list["html_data"] = $html_data;
		$return_list["data"] = $list;
		$return_list["data2"] = $list;
		$return_list["data3"] = $list;
		$return_list["number"] = $number;
		$return_list["key"] = $request->key;
		$return_list["totalCount"] = $totalCount;
		$return_list["paging_view"] = $paging_view;
		$return_list["page"] = $thisPage;
		$return_list["key"] = $request->key;

		return view('sub/beds_sub', $return_list); 

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

	public function media_view(Request $request) {

		if($_GET['tab'] == 1) {
			$boardType = "press";
		} else if($_GET['tab'] == 2) {
			$boardType = "media";
		} else if($_GET['tab'] == 3) {
			$boardType = "notice";
		}

		$board_prev_infom = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', $boardType)
					->where('idx', '<', $request->board_idx)
					->orderBy('idx', 'desc')
					->first();

		$return_list['board_prev'] = $board_prev_infom;

		$board_next_infom = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', $boardType)
					->where('idx', '>', $request->board_idx)
					->orderBy('idx', 'desc')
					->first();

		$return_list['board_next'] = $board_next_infom;


		$board_infom = DB::table('board') 
					->select(DB::raw('*'))
					->where('idx', $request->board_idx)
					->first();

		DB::table('board')->where('idx', $request->board_idx)->update(
			[
				'view_cnt' => $board_infom->view_cnt + 1,
			]
		);

		$board_infom = DB::table('board') 
					->select(DB::raw('*'))
					->where('idx', $request->board_idx)
					->first();

		$return_list['data'] = $board_infom;

		return view('sub/media_view', $return_list); 

	}

	public function news(Request $request) {

		if($request->tab == 1) {
			$boardType = 'press';
		} else if($request->tab == 2) {
			$boardType = 'media';
		}else{
			$boardType = 'notice';
		}

		$paging_option = array(
			"pageSize" => 10,
			"blockSize" => 5
		);		

		$thisPage = ($request->page) ? $request->page : 1 ;
		$paging = new PagingFunction($paging_option);

		$totalQuery = DB::table('board');
		if($request->key != "") {
			$totalQuery->where(function($totalQuery) use($request){
				$totalQuery->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		$totalQuery->where('use_status', 'Y');
		$totalQuery->where('board_type', $boardType);
        $totalQuery->where(function($query_set) {
                $query_set->where('top_type', '<>', 'Y')
                ->orWhere('top_type', null);
        });

		if($request->category_type) {
			$totalQuery->where('category', $request->category_type);
		}

		if(request()->segment(2) == "ey_data_room" && !$request->category_type) {
			$totalQuery->where('category', 1);
		}

		$totalCount = $totalQuery->get()->count();
		
		$paging_view = $paging->paging($totalCount, $thisPage, "page");
		
		$query = DB::table('board')
				->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut, substring_index(link_value,"/",-1) as link_key'))
				->orderBy('idx', 'desc');
				
		if($request->key != "") {
			$query->where(function($query) use($request){
				$query->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		$query->where('use_status', 'Y');
		$query->where('board_type', $boardType);
        $query->where(function($query_set2) {
                $query_set2->where('top_type', '<>', 'Y')
                ->orWhere('top_type', null);
        });
		
		//$query->where('top_type', '<>', 'Y');
		//$query->orWhere('top_type', null);
		
		if($request->category_type) {
			$query->where('category', $request->category_type);
		}

		if(request()->segment(2) == "ey_data_room" && !$request->category_type) {
			$query->where('category', 1);
		}

		if($request->page != "" && $request->page > 1) {
			$query->skip(($request->page - 1) * $paging_option["pageSize"]);
		}

		$list = $query->take($paging_option["pageSize"])->get();
		
		// 게시판 출력 글 번호 계산
		$number = $totalCount-($paging_option["pageSize"]*($thisPage-1));

		$board_top_count = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', $boardType)
					->where('top_type', 'Y')
					->get()->count();

		$board_top_list = DB::table('board') 
					->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
					->where('board_type', $boardType)
					->where('top_type', 'Y')
					->get();

		$return_list = array();
		$return_list["board_top_count"] = $board_top_count;
		$return_list["board_top_list"] = $board_top_list;
		$return_list["data"] = $list;
		$return_list["data2"] = $list;
		$return_list["data3"] = $list;
		$return_list["number"] = $number;
		$return_list["key"] = $request->key;
		$return_list["totalCount"] = $totalCount;
		$return_list["paging_view"] = $paging_view;
		$return_list["page"] = $thisPage;
		$return_list["key"] = $request->key;
		
		return view('sub/news', $return_list); 

	}

	public function contact_us(Request $request) {

		return view('sub/contact_us'); 

	}

}