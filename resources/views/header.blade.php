<?php
	$home_dir = str_replace( basename(__DIR__) , "" , __DIR__ );

	//연결되는 서버에 따라 파일따로 사용함, 사용언어:php-mysql, php-mssql

	//윈도우서버용 php-mssql 사용, 도메인 : https://rewardy.co.kr
	//리눅스서버용 php-mysql 사용, 도메인 : http://officeworker.co.kr

	//윈도우 환경 변수 : /inc_lude/conf.php
	//윈도우 환경 함수 : /inc_lude/func.php

	//리눅스 환경 변수 : /inc_lude/conf_mysqli.php
	//리눅스 환경 함수 : /inc_lude/func_mysqli.php

	include $home_dir . "inc_lude/conf_mysqli.php";

	//디렉토리 추출
	$get_dirname = str_replace(NAS_HOME_DIR,"", get_dirname());

	if(!$user_id){
	//	header("Location:https://rewardy.co.kr/myinfo/index.php");
	//	exit;
	}

	//쿼리스트링이 있을경우
	//로그인되어 있는경우
	//로그아웃 처리
	if($_SERVER['QUERY_STRING']){
		parse_str(Decrypt($_SERVER['QUERY_STRING']), $output);
		if($user_id){

			//보낸이메일, 받는이메일, 멤버idx
			if($output['send_email'] && $output['to_email'] && $output['sendno']){

				//쿠키값(아이디, 아이디저장여부:아이디, 아이디저장여부)
				$DelNotCookieArr = array("cid", "id_save");
				if($_COOKIE){
					foreach( $_COOKIE as $key => $value ){
						//쿠키삭제예외
						if(!in_array($key, $DelNotCookieArr)) {
							setcookie( $key, $value, time()-3600 , '/', C_DOMAIN);
							unset($_COOKIE[$key]);
							header("Location:https://".$_SERVER['HTTP_HOST']."/team/?".$_SERVER['QUERY_STRING']);
						}
					}
				}
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge; chrome=1" />
<title>Rewardy</title>

<meta name="title" content="Rewardy">
<meta name="description" content="Rewardy 입니다.">
<meta name="keywords" content="비즈폼, 스마트, SMART, Rewardy, 업무, 오늘업무, Rewardy, 챌린지, 보상, live, 업무관리">

<meta property="og:description" content="Rewardy 입니다.">
<meta property="og:title" content="Rewardy">
<meta property="og:image" content="/images/main/img_meta.jpg">


<link rel="shortcut icon" href="/favicon.ico">

<!--[if lt IE 9]>
<script src="https://www.bizforms.co.kr/js/html5.js"></script>
<script src="https://www.bizforms.co.kr/js/imgSizer.js"></script>
<script src="https://www.bizforms.co.kr/js/html5shiv.js"></script>
<script src="https://www.bizforms.co.kr/js/respond.min.js"></script>
<![endif]-->

<!-- 노토산스 -->
<link href="/css/style_font_notosans.css" rel="stylesheet" />
<!-- <link rel="stylesheet" type="text/css" href="/css/timepicki.css" />
<link rel="stylesheet" type="text/css" href="/css/air_datepicker.css" /> -->
<!-- <link rel="stylesheet" type="text/css" href="/css/tui-time-picker.css" />
<link rel="stylesheet" type="text/css" href="/css/tui-date-picker.css" /> -->
<link rel="stylesheet" type="text/css" href="/html/css/window-date-picker.css<?php echo VER;?>" />
<link rel="stylesheet" type="text/css" href="/html/css/common.css<?php echo VER;?>" />
<link rel="stylesheet" type="text/css" href="/html/css/mainy.css<?php echo VER;?>" />
<link rel="stylesheet" type="text/css" href="/html/css/all.min.css<?php echo VER;?>" />
<link rel="stylesheet" type="text/css" href="/html/css/slick.css<?php echo VER;?>" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/clipboard.js/1.5.3/clipboard.min.js"></script>
<script src="/js/clipboard.min.js"></script>
<!-- <script src="/js/timepicki.js"></script>
<script src="/js/air_datepicker.js"></script>  -->
<!-- <script src="/js/tui-time-picker.js"></script>
<script src="/js/tui-date-picker.js"></script>  -->


<script src="/js/Sortable.min.js"></script>
<script src="/js/spectrum.js"></script>
<link rel="stylesheet" type="text/css" href="/css/spectrum.css" />


<script src="/js/window-date-picker.js"></script>
<script type="text/javascript" src="https://rewardy.co.kr/js/slick.js"></script>
<script type="text/javascript" src="/js/circle-progress.js"></script>
<script type="text/javascript" src="https://rewardy.co.kr/js/jquery.counterup.min.js"></script>
<script type="text/javascript" src="https://rewardy.co.kr/js/jquery.ui.touch-punch.js"></script>
<script src="/js/waypoints.min.js"></script>
<script src="/js/jquery.touchFlow.js"></script>

<link href="/css/datepicker.css<?php echo VER;?>" rel="stylesheet" type="text/css">
<script src="https://rewardy.co.kr/js/datepicker.js<?php echo VER;?>"></script>
<script src="https://rewardy.co.kr/js/datepicker.kr.js<?php echo VER;?>"></script>

<!-- 0608 추가 -->
<script type="text/javascript" src="https://rewardy.co.kr/js/re_common.js"></script>

<?
//페이지별로 js호출
//0:오늘업무
///inc_lude/conf.php
//$reward_type = array("0"=>"todayworks", "1"=>"lives", "2"=>"challenges", "3"=>"team");

//오늘업무
if ($get_dirname == $reward_type['0']){?>
<script src="/js/works_common.js<?php echo VER;?>"></script>
<script src="/js/project_common.js<?php echo VER;?>"></script>

<?//라이브
}else if ($get_dirname == $reward_type['1']){?>
<script src="/js/lives_common.js<?php echo VER;?>"></script>

<?//메인페이지
}else if($get_dirname == $reward_type['3']){?>
<script src="/js/team_common.js<?php echo VER;?>"></script>

<?//보상
}else if($get_dirname == $reward_type['4']){?>
<script src="/js/reward_common.js<?php echo VER;?>"></script>

<?//맴버관리
}else if($get_dirname == $reward_type['5']){?>
<script src="/js/member_common.js<?php echo VER;?>"></script>

<?//파티관리
}else if($get_dirname == $reward_type['9']){?>
<script src="/js/project_common.js<?php echo VER;?>"></script>

<?
//insight
}else if($get_dirname == $reward_type['10']){?>
<script src="/js/insight_common.js<?php echo VER;?>"></script>

<?}?>

<script src="/js/common.js<?php echo VER;?>"></script>
<script src="/js/jquery.fileDownload.js<?php echo VER;?>"></script>
<script src="/js/jquery.mousewheel.min.js"></script>

<?
//라이브 페이지 5분마다 새로고침
/*if ( basename(__FILE__) == "index.php" && get_dirname() == $reward_type['1']){?>
	<meta http-equiv="refresh" content="300">
<?}*/?>
</head>
<body>

<input type="text" name="user_name" autocomplete="false" required="" style="display:none;">
<input style="display:none" aria-hidden="true">
<input type="password" style="display:none" aria-hidden="true">

<?php
	//login페이지
	include $home_dir  . "inc_lude/login_layer.php";
?>

<script type="text/javascript">
	$(document).ready(function(){


	<?if($_COOKIE['onoff']=='1'){?>
		//$(".rew_box").removeClass("on");
	<?}?>

	<?
	//메인페이지에서만 circleProgress 동작하도록 스크립트 제한
	if ($_SERVER["PHP_SELF"] == "/index.php") { ?>

	<?}?>

		$(".input_main").keyup(function(){
			var input_length = $(this).val().length; //입력한 값의 글자수
			if(input_length>0){
				$(".btn_grid_02").addClass("on");
			}else{
				$(".btn_grid_02").removeClass("on");
			}
		});

		$(".btn_grid_02").click(function(){
			if($(".btn_grid_02").hasClass("on")){
				$(".rew_grid_list_none").hide();
				var textspan = $(".input_main").val();
				var text01 = $(".rew_grid_list_in ul li.rew_grid_list_01 span").text();
				var text02 = $(".rew_grid_list_in ul li.rew_grid_list_02 span").text();
				var text03 = $(".rew_grid_list_in ul li.rew_grid_list_03 span").text();
				$(".rew_grid_list_in ul li.rew_grid_list_01 span").text(textspan);
				$(".rew_grid_list_in ul li.rew_grid_list_02 span").text(text01);
				$(".rew_grid_list_in ul li.rew_grid_list_03 span").text(text02);
				//$(".rew_grid_list_in ul").prepend("<li class='ui-sortable-handle'><button></button><div><span>"+textspan+"</span></div></li>");
				//$(".rew_grid_list_in ul li:eq(3)").remove();
			}
			//var textspan = $(".input_main").value();
			//$(".rew_grid_list_in ul").prepend("<li class='ui-sortable-handle'><button></button><div><span>"+textspan+"</span></div></li>");

			if($(".rew_grid_list_in ul li.rew_grid_list_01 span").is(':empty')){

			}else{
				$(".rew_grid_list_in ul li.rew_grid_list_01").addClass("view");
			}
			if($(".rew_grid_list_in ul li.rew_grid_list_02 span").is(':empty')){

			}else{
				$(".rew_grid_list_in ul li.rew_grid_list_02").addClass("view");
			}
			if($(".rew_grid_list_in ul li.rew_grid_list_03 span").is(':empty')){

			}else{
				$(".rew_grid_list_in ul li.rew_grid_list_03").addClass("view");
			}
		});

		$(".rew_grid_list_in ul li button").click(function(){
			$(this).parent("li").toggleClass("on");
		});



		//if (GetCookie("user_id") == null){
		//	if ($(".rew_layer_login").is(":visible") == false){
		//		$(".rew_bar_li_01").trigger("click");
		//	}
		//}


	});



	<?if(ATTEND_STIME){?>
		var late_stime = "<?=ATTEND_STIME?>";
	<?}?>

	<?if(ATTEND_ETIME){?>
		var late_etime = "<?=ATTEND_ETIME?>";
	<?}?>

	$(window).scroll(function(){

	});
</script>

<?

	//if (@in_array(trim(get_dirname()), array("challenges","team","inc"))){
		//챌린지카테고리
		$sql = "select idx, name from work_category where state='0' order by rank asc";
		$cate_info = selectAllQuery($sql);
		for($i=0; $i<count($cate_info['idx']); $i++){
			$chall_category[$cate_info['idx'][$i]] = $cate_info['name'][$i];
		}
	//}

	//로그인상태
	if($user_id){


		if($user_id=='sadary0@nate.com'){
			//$user_id='sun@bizforms.co.kr';
			//echo $user_id;
		}

		//회원등급(관리:1, 일반:5) : manager:1, normal:5
		//$grade_arr['normal']
		if($companyno){
			$where_challenge = " and companyno='".$companyno."'";
			$company_info = company_info();
			$company_comcoin = company_comcoin_total();
		}

		//권한설정으로
		$sql = "select idx, highlevel from work_member where state='0' and companyno='".$companyno."' and email='".$user_id."'";
		$mb_info = selectQuery($sql);
		if($mb_info['highlevel'] != $user_level){
			$user_level = $mb_info['highlevel'];
			if (is_numeric($mb_info['highlevel']) == true){
				setcookie('user_level', $mb_info['highlevel'] , $cookie_limit_time , '/', C_DOMAIN);
			}
		}


		//회원전체목록
		$sql = "select a.idx, a.email, a.name, a.coin, a.comcoin, a.part, a.partno, a.profile_type, a.profile_img_idx, (SELECT count(idx) FROM work_member WHERE partno = b.idx ) AS cnt";
		$sql = $sql .=" from work_member as a left join work_team as b on(a.partno = b.idx)";
		$sql = $sql .=" where a.state='0' and a.companyno='".$companyno."' and highlevel!='1' order by name asc";
		$member_info = selectAllQuery($sql);

		if($member_info['idx']){

			//회사 전체 회원수
			$member_total_cnt = count($member_info['idx']);
			//회원 부서명
			$member_part['part'] = @array_combine($member_info['email'], $member_info['part']);
			$member_coin = @array_combine($member_info['email'], $member_info['coin']);
			$member_comcoin = @array_combine($member_info['email'], $member_info['comcoin']);
		}
		
		//부서별 정렬순
		$sql = "select part, partno from work_member as a left join work_team as b on (a.partno=b.idx) where a.state='0' and b.state='0' and highlevel != '1' and a.companyno='".$companyno."' group by partno, part order by part asc";
		$part_info = selectAllQuery($sql);



		//챌린지 오픈 중 참여 완료한 챌린지 확인, 전체코인/참여한 코인
		$sql = " select a.idx, (CASE WHEN a.day_type='1' THEN a.coin * a.attend WHEN a.day_type='0' THEN a.coin END ) as maxcoin,";
		$sql = $sql .= " (select challenges_idx from work_challenges_result as b where state='1' and email='".$user_id."' and challenges_idx=a.idx order by idx desc limit 1) as chamyeo_cidx";
		$sql = $sql .= " from work_challenges as a where a.state='0' and a.companyno='".$companyno."' and a.template='0' and a.temp_flag='0' and a.edate >='".TODATE."'";

		$get_chcoin_info = selectAllQuery($sql);
		for($i=0; $i<count($get_chcoin_info['idx']); $i++){
			$cha_idx = $get_chcoin_info['idx'][$i];
			$cha_maxcoin = $get_chcoin_info['maxcoin'][$i];
			$chamyeo_cidx = $get_chcoin_info['chamyeo_cidx'][$i];
			if($chamyeo_cidx){
				$chamyeo_coin[$chamyeo_cidx] = $cha_maxcoin;
			}
			//챌린지 코인합계
			$chamyeo_hapcoin += $cha_maxcoin;
		}

		//참여한 챌린지 코인 차감
		for($i=0; $i<count($get_chcoin_info['idx']); $i++){
			$get_maxcoin = $get_chcoin_info['idx'][$i];
			$get_chamyeo_coin = $chamyeo_coin[$get_maxcoin];
			if($get_chamyeo_coin){
				$chamyeo_hapcoin = $chamyeo_hapcoin - $get_chamyeo_coin;
			}
		}

		//획득가능한코인
		$sql = "select (CASE WHEN day_type='1' THEN (coin * attend) WHEN day_type='0' THEN coin   END ) as coin, (select sum(coin) as coin from work_challenges as a left join work_challenges_result as b on(a.idx=b.challenges_idx)";
		$sql = $sql .=" where a.state='0' and a.companyno='".$companyno."' and b.email='".$user_id."' and b.state=1) as chamyeo_coin";
		$sql = $sql .= " from work_challenges as a left join work_challenges_user as b on(a.idx=b.challenges_idx) where a.state='0' and a.companyno='".$companyno."' and a.template='0' and a.temp_flag='0' and b.email='".$user_id."'";
		$sql = $sql .= " and a.edate >='".TODATE."'";

		/*$sql = "select isnull(sum(coin) , 0) as coin, (select sum(coin) as coin from work_challenges as a left join work_challenges_result as b on(a.idx=b.challenges_idx)";
		$sql = $sql .=" where a.state='0' and a.companyno='".$companyno."' and b.email='".$user_id."' and b.state=1) as chamyeo_coin";
		$sql = $sql .= " from work_challenges as a left join work_challenges_user as b on(a.idx=b.challenges_idx) where a.state='0' and a.companyno='".$companyno."' and a.template='0' and a.temp_flag='0' and b.email='".$user_id."'";
		$sql = $sql .= " and a.edate >= convert(varchar(10), getdate(), 120)";*/
		$get_chall_info = selectAllQuery($sql);
		if($chamyeo_hapcoin){
			$get_chall_coin = @number_format($chamyeo_hapcoin);
		}else{
			$get_chall_coin = 0;
		}

		if ($get_dirname == "challenges"){

			//도전중인 챌린지
			$sql = "select idx, state, attend_type, cate, title, coin, ";
			$sql = $sql .=" CASE WHEN attend_type ='1' THEN (SELECT count(idx) FROM work_challenges_comment WHERE challenges_idx = idx and state in (0))";
			$sql = $sql .=" WHEN attend_type ='2' THEN (SELECT count(idx) FROM work_challenges_file WHERE challenges_idx = idx and state in (0))";
			$sql = $sql .=" WHEN attend_type ='3' THEN ( SELECT count(idx) FROM work_challenges_file WHERE challenges_idx = idx and state in (0)) end as challenge";
			$sql = $sql .=" from work_challenges as a where a.state='0' and a.companyno='".$companyno."' and a.template='0' ".$where_challenge." and a.edate >= DATE_FORMAT(now(), '%Y-%m-%d')";
			$sql = $sql .=" order by a.idx desc";
			$chall_ing_list = selectAllQuery($sql);


			//챌린지 도전가능
			$sql = "select a.idx from work_challenges as a";
			$sql = $sql .=" left join work_challenges_result as b on(a.idx=b.challenges_idx)";
			$sql = $sql .= " where a.state='0' AND ( TIMESTAMPDIFF(DAY, DATE_FORMAT(now(), '%Y-%m-%d'), a.edate) >= 0)";
			$sql = $sql .= " and a.coaching_chk='0' and a.view_flag='0' and a.temp_flag='0'";
			$sql = $sql .= " and a.template='0' and a.companyno ='".$companyno."' group by a.idx";
			/*$sql = "select a.idx,count(1) as cnt from work_challenges as a";
			$sql = $sql .=" left join work_challenges_result as b on(a.idx=b.challenges_idx)";
			$sql = $sql .= " where a.state='0' AND ( TIMESTAMPDIFF(DAY, DATE_FORMAT(now(), '%Y-%m-%d'), a.edate) >= 0)";
			$sql = $sql .= " and a.coaching_chk='0' and a.view_flag='0' and a.temp_flag='0'";
			$sql = $sql .= " and a.template='0' and a.companyno ='".$companyno."' group by a.idx";
			*/
			$chall_po_info = selectQuery($sql);
			if($chall_po_info['idx']){
				$chall_po_cnt = count($chall_po_info['idx']);
			}else{
				$chall_po_cnt = 0;
			}


			//챌린지 도전중
			$sql = "select count(1) cnt from ( select a.idx from work_challenges as a  left join work_challenges_result as b on(a.idx=b.challenges_idx)";
			$sql = $sql .= " where a.state='0' AND ( (b.state='0' and b.email='".$user_id."' and TIMESTAMPDIFF(DAY, DATE_FORMAT(now(), '%Y-%m-%d'), a.edate) >= 0))";
			$sql = $sql .= " and a.coaching_chk='0' and a.view_flag='0' and a.temp_flag='0' and a.template='0' and a.companyno ='".$companyno."' group by a.idx ) as c";
			$chall_ing_info = selectQuery($sql);
			if($chall_ing_info['cnt']){
				$chall_ing_cnt = $chall_ing_info['cnt'];
			}else{
				$chall_ing_cnt = 0;
			}

			//챌린지 도전완료
			$sql = "select count(1) cnt from ( select a.idx from work_challenges as a left join work_challenges_result as b on(a.idx=b.challenges_idx)";
			$sql = $sql .= " where a.state='0' AND ( (b.state='1' and a.attend=(select count(1) from work_challenges_result where state='1' and challenges_idx=a.idx and email='".$user_id."')))";
			$sql = $sql .= " and a.coaching_chk='0' and a.view_flag='0' and a.temp_flag='0' and a.template='0' and a.companyno ='".$companyno."' group by a.idx ) as c";
			$chall_complete_info = selectQuery($sql);
			if($chall_complete_info['cnt']){
				$chall_com_cnt = $chall_complete_info['cnt'];
			}else{
				$chall_com_cnt = 0;
			}

			//임시저장 챌린지
			$sql = "select count(1) cnt from ( select a.idx from work_challenges as a where a.state='0' and a.companyno ='".$companyno."' and a.coaching_chk='0' and a.temp_flag='1' and a.email='".$user_id."') as a";
			$chall_temp_info = selectQuery($sql);
			if($chall_temp_info['cnt']){
				$chall_temp_cnt = $chall_temp_info['cnt'];
			}else{
				$chall_temp_cnt = 0;
			}

			//내가 만든 챌린지
			$sql = "select count(1) cnt from ( select a.idx from work_challenges as a where a.state='0' and a.companyno ='".$companyno."' and a.coaching_chk='0' and a.email='".$user_id."') as c";
			$chall_temp_info = selectQuery($sql);
			if($chall_create_info['cnt']){
				$chall_create_cnt = $chall_create_info['cnt'];
			}else{
				$chall_create_cnt = 0;
			}


			//마감임박 챌린지 최근 3건, 7일 남은 챌린지
			$sql = "select a.idx, a.state, a.day_type, a.attend_type, attend, a.cate, a.title,";
			$sql = $sql .= " a.sdate, a.edate, TIMESTAMPDIFF(DAY, DATE_FORMAT(now(), '%Y-%m-%d'), a.edate) as chllday, temp_flag,";
			$sql = $sql .= " (SELECT count(idx) FROM work_challenges_user WHERE state='0' and challenges_idx = a.idx) AS chamyeo, a.coin,";
			$sql = $sql .= " (CASE WHEN a.day_type='1' THEN a.coin * a.attend WHEN a.day_type='0' THEN 0 END ) as maxcoin";
			$sql = $sql .= " from work_challenges as a left join work_challenges_result as b on(a.idx=b.challenges_idx) where a.state='0' and a.coaching_chk='0' and a.temp_flag='0' and a.companyno='".$companyno."' and a.template='0'";
			//and a.edate >= getdate()";
			$sql = $sql .= " and  TIMESTAMPDIFF(DAY, DATE_FORMAT(now(), '%Y-%m-%d'), a.edate)>='0' and TIMESTAMPDIFF(DAY, DATE_FORMAT(now(), '%Y-%m-%d'), a.edate)<='7' group by a.idx, a.state, a.attend_type, cate, title, coin, a.day_type, attend, temp_flag, sdate, edate, TIMESTAMPDIFF(DAY, a.sdate, a.edate) limit 3";
			$chall_deadline_list = selectAllQuery($sql);

			//챌린지 코인
			$sql = "select sum(coin) as coin from work_challenges where state='0' and template='0' and companyno='".$companyno."' and edate >= DATE_FORMAT(now(), '%Y-%m-%d')";
			$chall_coin_info = selectQuery($sql);
		}

		//회원별 공용코인
		$sql = "select idx, highlevel, coin, comcoin from work_member where state='0' and companyno='".$companyno."' and email='".$user_id."' order by idx desc limit 1";
		$common_info = selectQuery($sql);
		if($common_info['idx']){

			//관리자 권한 일때
			if ($common_info['highlevel'] == '0'){

				if($common_info['comcoin'] > 0){
					$common_coin = number_format($common_info['comcoin']);
				}else{
					$common_coin = 0;

					if($common_info['coin']){
						$chall_coin_hap = $common_info['coin'] - $chall_coin_info['coin'];
					}

					//if($common_info['coin'] > 0 ){
					//	$chall_coin_hap = $common_info['coin'] - $chall_coin_info['coin'];
					//	$common_coin = number_format($chall_coin_hap);
					//}

				}
			//일반 권한 경우, 공용코인으로 전환
			}else if ($common_info['highlevel'] == '5'){
				if($common_info['comcoin'] > 0 ){
					$chall_coin_hap = $common_info['comcoin'] - $chall_coin_info['coin'];
					$common_coin = number_format($chall_coin_hap);
				}else{
					$common_coin = 0;
				}
			}
		}

		//전체 공용코인
		$sql = "select sum(comcoin) as comcoin from work_member where state='0' and companyno='".$companyno."' and comcoin > 0";
		$mem_common_info = selectQuery($sql);
		if($mem_common_info['comcoin']){
			$mem_common_coin = number_format($mem_common_info['comcoin']);
		}else{
			$mem_common_coin = 0;
		}


		//관리자권한
		//관리자메뉴 지정을 위해 조회
		/*if($user_level == '0'){
			if($_SERVER['HTTP_HOST'] == T_DOMAIN){
				$sql = "select idx, partno, part, highlevel from work_member where state='0' and companyno='".$companyno."' and email='".$user_id."' order by idx desc limit 1";
				$member_level_info = selectQuery($sql);
				if($member_level_info['idx']){
					$sql = "select idx from work_sendmail where state='0' and companyno='".$companyno."' and highlevel='0' order by idx desc limit 1";
					$member_mail_add_info = selectQuery($sql);
				}

			}else{
				$sql = "select top 1 idx, partno, part, highlevel from work_member where state='0' and companyno='".$companyno."' and email='".$user_id."' order by idx desc";
				$member_level_info = selectQuery($sql);
				if($member_level_info['idx']){
					$sql = "select top 1 idx from work_sendmail where state='0' and companyno='".$companyno."' and highlevel='0' order by idx desc";
					$member_mail_add_info = selectQuery($sql);
				}
			}
		}*/


		//코인보상
		$sql = "select idx,code,coin,icon,memo from work_coin_reward_info where state='0' and kind='lives' order by idx asc";
		$coin_reward_info = selectAllQuery($sql);



		//템플릿 정보
		/*if($template_auth){
			$thema_user_info = challenges_thema_list_info();
			//$sql = "select idx, title, sort, recom from work_challenges_thema where state='0' order by sort asc";
			//$thema_user_info = selectAllQuery($sql);

		}else{
			$sql = "select idx, title from work_challenges_thema_user_list where state='0' and companyno='".$companyno."' and email='".$user_id."' order by sort asc";
			$thema_user_info = selectAllQuery($sql);
			if(!$thema_user_info['idx']){
				$sql = "select idx, title, sort, recom from work_challenges_thema where state='0' order by sort asc";
				$thema_user_info = selectAllQuery($sql);
			}
		}*/

		//챌린지 테마리스트 정보
		$thema_user_info = challenges_thema_list_info();


	}else{




	}
?>
