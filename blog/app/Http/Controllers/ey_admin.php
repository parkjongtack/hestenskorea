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

	public function __construct()
	{
		
	}

    public function ey_login(Request $request) {

		return view('ey_login'); 

	}

	public function ey_login_action(Request $request) {
		
		$member_infom_count = DB::table('admin_member') 
				->select(DB::raw('*'))
				->where('user_id', $request->id)
				->get()->count();		
		
		if($member_infom_count > 0) {
			
			$member_infom = DB::table('admin_member') 
					->select(DB::raw('*'))
					->where('user_id', $request->id)
					->first();

			if (Hash::check($request->pw, $member_infom->passwd)) {

				session(['user_id' => $request->id]);

				echo "<script>alert('로그인되었습니다.');location.href='/ey_admin/pcslider';</script>";
			} else {
				echo "<script>alert('비밀번호가 잘못되었습니다.');location.href='/ey_admin/login';</script>";
			}
			
		} else {
			echo "<script>alert('등록되어 있지 않은 아이디입니다.');location.href='/ey_admin/login';</script>";
		}
		
	}

	public function ey_control(Request $request) {
		DB::table('board')->where('idx', $request->idx)->delete();
		return true;
	}	

	public function ey_logout(Request $request) {
		$request->session()->flush();
		echo "<script>alert('로그아웃 되었습니다.');location.href='/ey_admin/login';</script>";
	}

	public function write_board_form(Request $request) {

		if(request()->segment(4) == "modify") {

			$board_inform = DB::table('board') 
						->select(DB::raw('*'))
						//->where('board_type', $request->board_type)
						->where('idx', $request->board_idx)
						->first();			

			$return_list['data'] = $board_inform;

			return view('ey_modify_board', $return_list);

		} else {

			return view('ey_write_board');

		}

	}

	public function write_board_action(Request $request) {

		$board_cnt = DB::table('board')
					->where('board_type', $request->board_type)
					//->where('idx', $request->board_idx)
					->get()
					->count();

		$answer_infom = DB::table('board') 
					->select(DB::raw('*, board.grp as grp_now, board.prino as prino_now, board.parno as parno_now'))
					//->where('board_type', $request->board_type)
					->orderBy('idx', 'desc')
					->first();

		$reply_answer_infom = DB::table('board') 
					->select(DB::raw('depth, grp, prino, parno'))
					//->where('board_type', $request->board_type)
					->where('idx', $request->board_idx)
					->first();

		if($board_cnt <= 0) {
			$parno_now = 0;
			$prino_now = 0;
			$depth_now = 1;
			$grp_now = 1;
		} else {
			$parno_now = $request->board_idx;
			$prino_now = $answer_infom->prino_now + 1;
			$depth_now = $answer_infom->depth;
			$grp_now = $answer_infom->grp_now + 1;
		}
		
		if($request->write_type == "reply") {
			$parno_now = $request->board_idx;
			$prino_now = $reply_answer_infom->prino + 1;
			$depth_now = $reply_answer_infom->depth + 1;
			$grp_now = $reply_answer_infom->grp;			
		}


		if(request()->segment(2) == "pcslider" || request()->segment(2) == "press") {

			if($request->write_type == "modify") {
				
				if($request->writer_file) {
					$file = $request->writer_file->store('images');
					$file_array = explode("/", $file);
					copy("../storage/app/images/".$file_array[1], "./storage/app/images/".$file_array[1]);
				} else {
					$file_array[1] = null;
				}

				if($file_array[1] != null) {

					DB::table('board')->where('idx', $request->board_idx)->update(
						[
							'subject' => $request->subject,
							'category' => $request->category,
							'writer' => $request->writer,
							'ip_addr' => request()->ip(),
							'board_type' => $request->board_type,
							'attach_file' => $file_array[1],
							'parno' => 0,
							'prino' => $prino_now,
							'depth' => 1,
							'grp' => $grp_now,
							'start_period' => $request->start_period,
							'end_period' => $request->end_period,
							'use_status' => $request->use_status,
							'priority' => $request->priority,
							'link_value' => $request->link_value,
							'reg_date' => \Carbon\Carbon::now(),
						]
					);

				} else {

					DB::table('board')->where('idx', $request->board_idx)->update(
						[
							'subject' => $request->subject,
							'category' => $request->category,
							'writer' => $request->writer,
							'ip_addr' => request()->ip(),
							'board_type' => $request->board_type,
							'parno' => 0,
							'prino' => $prino_now,
							'depth' => 1,
							'grp' => $grp_now,
							'start_period' => $request->start_period,
							'end_period' => $request->end_period,
							'use_status' => $request->use_status,
							'priority' => $request->priority,
							'link_value' => $request->link_value,
							'reg_date' => \Carbon\Carbon::now(),
						]
					);

				}
				
				echo "<script>alert('글 수정이 완료되었습니다.');location.href = '/ey_admin/".$request->board_type."';</script>";
				exit;

			} else {

				if($request->writer_file) {
					$file = $request->writer_file->store('images');
					$file_array = explode("/", $file);
					copy("../storage/app/images/".$file_array[1], "./storage/app/images/".$file_array[1]);
				} else {
					$file_array[1] = null;
				}
				
				DB::table('board')->insert(
					[
						'subject' => $request->subject,
						'category' => $request->category,
						'writer' => $request->writer,
						'ip_addr' => request()->ip(),
						'board_type' => $request->board_type,
						'attach_file' => $file_array[1],
						'parno' => 0,
						'prino' => $prino_now,
						'depth' => 1,
						'grp' => $grp_now,
						'start_period' => $request->start_period,
						'end_period' => $request->end_period,
						'use_status' => $request->use_status,
						'priority' => $request->priority,
						'link_value' => $request->link_value,
						'reg_date' => \Carbon\Carbon::now(),
					]
				);
			
				echo "<script>alert('글 작성이 완료되었습니다.');location.href = '/ey_admin/".$request->board_type."';</script>";
				exit;

			}
		}
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
    
    public function ey_board_list(Request $request) {

		if(request()->segment(2) != "notice") {
			$boardType = request()->segment(2);
		} else {
			$boardType = "ey_notice";
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
				->orderBy('idx', 'desc');
				
		if($request->key != "") {
			$query->where(function($query) use($request){
				$query->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

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

		return view("ey_board_list", $return_list);

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