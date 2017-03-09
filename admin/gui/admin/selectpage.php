<?php
	$GLOBALS["url"]=""; //LT
	ini_set('max_execution_time', 1000);
	date_default_timezone_set('Asia/Dhaka');
	define('CREATE_DATE',date('Y-m-d H:i:s'));
	include_once ('library/CCommon.php');
	include_once ('library/Session.php');
	$oSession=new Session();   
	include_once ('model/CResult.php');
	include_once ('bll/CConManager.php');
	include_once ('bll/CBasic.php');
	$oBasic=new CBasic();
	
	if(isset($_GET['Page']))
	{
		$System=$_GET["Page"];
		if($System=='Login')
		{
			include('gui/website/login.php');
		}
		
	}
	elseif(isset($_GET['Basic']))
	{
		$Basic=$_GET["Basic"];
		if($Basic=='ComE')
		{
			include('gui/admin/comentry.php');
		}
		
		elseif($Basic=='DeptE')
		{
			include('gui/admin/depentry.php');
		}
		
		elseif($Basic=='DesE')
		{
			include('gui/admin/desentry.php');
		}
		
		elseif($Basic=='EmpE')
		{
			include('gui/admin/empentry.php');
		}
		
		elseif($Basic=='ComplRep')
		{
			include('gui/admin/showrpt.php');
		}
		
		elseif($Basic=='AllComList')
		{
			include('gui/admin/allrpt.php');
		}
		
		elseif($Basic=='Entry')
		{
			include('gui/admin/coment.php');
		}
		
		
	}
	
	else
	{
		include_once('gui/admin/main.php');
	}
?>