<?php

		$orgin_name = "";
		$save_name = "";
		if($_FILES['upfiles']['name'] != "") {

			$file = $_FILES['upfiles'];
			$upload_directory = './';
			$ext_str = "hwp,xls,doc,xlsx,docx,pdf,jpg,gif,png,txt,ppt,pptx,mp4,wmv,webw,ogg,avi";
			$allowed_extensions = explode(',', $ext_str);

			$max_file_size = 5242880000000000;
			$ext = substr($file['name'], strrpos($file['name'], '.') + 1);

			// 확장자 체크
			if(!in_array($ext, $allowed_extensions)) {
				echo "<script>alert('업로드할 수 없는 확장자 입니다.');history.go(-1);</script>";
				exit;
			}

			// 파일 크기 체크
			if($file['size'] >= $max_file_size) {
				echo "<script>alert('5MB 까지만 업로드 가능합니다.');history.go(-1);</script>";
				exit;
			}

			$path = md5(microtime()) . '.' . $ext;
			if(move_uploaded_file($file['tmp_name'], $upload_directory.$path)) {
				

				//$query = "INSERT INTO upload_file (file_id, name_orig, name_save, reg_time) VALUES(?,?,?,now())";
				$file_id = md5(uniqid(rand(), true));
				$name_orig = $file['name'];
				$name_save = $path;

				//$data['link'] = "http://designwizc.com/sample/editor/html/popular/ce71c16d59422aa4f5f2eb42d02ec6cc.jpg";

				//echo json_encode($data['link']);

				$response = new StdClass;
				//$response->link = Director::absoluteBaseURL() . "" . $file->Filename;
				$response->link = "/sample/editor/html/popular/" . $name_save;
				echo stripslashes(json_encode($response));

				//$orgin_name = $orgin_name.$name_orig."^|^";
				//$save_name = $save_name.$name_save."^|^";

				/*
				$stmt = mysqli_prepare($db_conn, $query);
				$bind = mysqli_stmt_bind_param($stmt, "sss", $file_id, $name_orig, $name_save);
				$exec = mysqli_stmt_execute($stmt);
				mysqli_stmt_close($stmt);
				*/

				//echo"<h3>파일 업로드 성공</h3>";
				//echo '<a href="file_list.php">업로드 파일 목록</a>';

			}


			//$i = $i + 1;
		} else {

			echo "<script>alert('파일이 업로드 되지 않았습니다. 증상이 반복될시 관리자에게 문의해주세요.');history.go(-1);</script>";
			exit;
			//echo '<a href="javascript:history.go(-1);">이전 페이지</a>';

		}

		//$file_origin_array =  substr($orgin_name, 0, -3);
		//$file_real_array = substr($save_name, 0, -3);

?>