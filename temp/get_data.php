<?php
    include "./temp/root.php";
    include "./temp/db_send.php";

	$s_up_time = array();
	$s_st_time = array();
	$s_en_time = array();
	$s_co_time = array();

	$defult_time = 6 * 60;
	$total_time = 0;

	$start_date = new DateTime('2022-3-21');
	$now_date = new DateTime();
	$now_date = $now_date->modify('+1 hour');

	$length_time = $start_date->diff($now_date);

	//echo $length_time->format('%a');

	for($i = 0;$i < (int)$length_time->format('%a') - 1;$i++){
		$select_time = $start_date->modify('+1 day'); 

		$sql_select = 'select * from study_hours where Update_day = "'.$select_time->format('Y-m-d H:i:s').'" order by Start_time';
		//echo $sql_select;
		$result_sql = mysqli_query($db_link,$sql_select);

		$s_up_time = array();
		$s_st_time = array();
		$s_en_time = array();
		$s_co_time = array();

		$m_up_time = array();
		$m_us_time = array();
		$m_ad_time = array();
		$m_co_time = array();

		if(!$result_sql){
	        die('失敗'.mysqli_error());
	    }else{
	        while ($row = mysqli_fetch_assoc($result_sql)) {
	            array_push($s_up_time,$row['Update_day']);
				array_push($s_st_time,$row['Start_time']);
				array_push($s_en_time,$row['End_time']);
				array_push($s_co_time,$row['Content_str']);
	    	}
		}
		
		$chas_s_time = 0;

		for($c = 0;$c < count($s_up_time);$c++){
			$chas_start_time = new DateTime($s_st_time[$c]);
			$chas_end_time = new DateTime($s_en_time[$c]); 
			
			$chas_time = $chas_end_time->diff($chas_start_time);

			$chas_s_h_time = (int)$chas_time->format('%i');
			$chas_s_m_time = (int)$chas_time->format('%h') * 60;

			$chas_s_time = $chas_s_h_time + $chas_s_m_time + $chas_s_time;
			$chas_view_time = $chas_s_h_time + $chas_s_m_time;
		}
		
		$sql_select = 'select * from motion_hours where Update_day = "'.$select_time->format('Y-m-d H:i:s').'"';
		
	    $result_sql = mysqli_query($db_link,$sql_select);

		if(!$result_sql){
	        die('失敗'.mysqli_error());
	    }else{
	        while ($row = mysqli_fetch_assoc($result_sql)) {
	            array_push($m_up_time,$row['Update_day']);
				array_push($m_us_time,$row['User_id']);
				array_push($m_ad_time,$row['Add_time']);
				array_push($m_co_time,$row['Content_str']);
	    	}
		}
	
		$chas_hours = 0;
		for($c = 0;$c < count($m_up_time);$c++){
			$chas_hours = ((int)$m_ad_time[$c] * 60) + $chas_hours;
		}

		$add_time = 0;
		if($chas_s_time == 0){
			$add_time = 60;
		}

		$total_time = ($chas_s_time - ($chas_hours + $defult_time)) + $total_time + $add_time;
	}
	if($total_time < 0){
		echo "<div class=\"total_time_A\">
		<label class=\"coution_class\">C A U T I O N !</label>
		合計　<label class=\"total_time_int_A\">".($total_time/60)."時間</label>
		<label class=\"coution_class\">C A U T I O N !</label>
		</div><br />";
	}else{
		echo "<div class=\"total_time_A\">
		合計　<label class=\"total_time_int_B\">".($total_time/60)."時間</label>
		</div><br />";
	}
	echo "<hr />";


	//==================================================================================
	$s_up_time = array();
	$s_st_time = array();
	$s_en_time = array();
	$s_co_time = array();

	$defult_time = 6 * 60;
	$total_time = 0;

	$start_date = new DateTime('2022-3-21');
	$now_date = new DateTime();
	$now_date = $now_date->modify('+1 hour');

	$length_time = $start_date->diff($now_date);

	//echo $length_time->format('%a');

	for($i = 0;$i < (int)$length_time->format('%a') - 1;$i++){
		$select_time = $start_date->modify('+1 day'); 

		$sql_select = 'select * from study_hours where Update_day = "'.$select_time->format('Y-m-d H:i:s').'" order by Start_time';
		echo $select_time->format('Y年m月d日')."<br />";
		//echo $sql_select;
		$result_sql = mysqli_query($db_link,$sql_select);

		$s_up_time = array();
		$s_st_time = array();
		$s_en_time = array();
		$s_co_time = array();

		$m_up_time = array();
		$m_us_time = array();
		$m_ad_time = array();
		$m_co_time = array();

		if(!$result_sql){
	        die('失敗'.mysqli_error());
	    }else{
	        while ($row = mysqli_fetch_assoc($result_sql)) {
	            array_push($s_up_time,$row['Update_day']);
				array_push($s_st_time,$row['Start_time']);
				array_push($s_en_time,$row['End_time']);
				array_push($s_co_time,$row['Content_str']);
	    	}
		}
		
		$chas_s_time = 0;

		for($c = 0;$c < count($s_up_time);$c++){
			$chas_start_time = new DateTime($s_st_time[$c]);
			$chas_end_time = new DateTime($s_en_time[$c]); 
			
			$chas_time = $chas_end_time->diff($chas_start_time);

			$chas_s_h_time = (int)$chas_time->format('%i');
			$chas_s_m_time = (int)$chas_time->format('%h') * 60;

			$chas_s_time = $chas_s_h_time + $chas_s_m_time + $chas_s_time;
			$chas_view_time = $chas_s_h_time + $chas_s_m_time;

			echo $chas_start_time->format('H:i:s')." - ".$chas_end_time->format('H:i:s')." = ".($chas_view_time/60)."H<br/>";
		}
		
		$sql_select = 'select * from motion_hours where Update_day = "'.$select_time->format('Y-m-d H:i:s').'"';
		
	    $result_sql = mysqli_query($db_link,$sql_select);

		if(!$result_sql){
	        die('失敗'.mysqli_error());
	    }else{
	        while ($row = mysqli_fetch_assoc($result_sql)) {
	            array_push($m_up_time,$row['Update_day']);
				array_push($m_us_time,$row['User_id']);
				array_push($m_ad_time,$row['Add_time']);
				array_push($m_co_time,$row['Content_str']);
	    	}
		}
	
		$chas_hours = 0;
		for($c = 0;$c < count($m_up_time);$c++){
			$chas_hours = ((int)$m_ad_time[$c] * 60) + $chas_hours;
		}

		$add_time = 0;
		if($chas_s_time == 0){
			echo "報告なし<br />";
			$add_time = 60;
			echo "<br />";
			echo "未報告分".($add_time/60)."<br />";
		}else{
			echo "<br />";
		}

		
		echo "勉強時間 = " .($chas_s_time/60)."<br />";
		echo "運動時間 = -" .($chas_hours/60)."<br />";
		echo "基礎勉強時間 = -" .($defult_time/60)."<br />";

		$total_time = ($chas_s_time - ($chas_hours + $defult_time)) + $total_time + $add_time;
		echo "合計".($total_time/60)."時間<br />";

		echo "<hr />";
	}
?>