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
		if($Basic=='AllDepot')
		{
			include('gui/depot.php');
		}
		
		elseif($Basic=='Logo')
		{
			include('gui/logo.php');
		}
		
		elseif($Basic=='Slide')
		{
			include('gui/slide.php');
		}
		
		elseif($Basic=='Message')
		{
			include('gui/message.php');
		}
		
		elseif($Basic=='Details')
		{
			include('gui/dt.php');
		}
		
		elseif($Basic=='Certificate')
		{
			include('gui/creg.php');
		}
		
		elseif($Basic=='COE')
		{
			include('gui/coe.php');
		}
		
		elseif($Basic=='GM')
		{
			include('gui/gm.php');
		}
		
		elseif($Basic=='DCC')
		{
			include('gui/dcc.php');
		}
		
		elseif($Basic=='RP')
		{
			include('gui/rp.php');
		}
		
		elseif($Basic=='MM')
		{
			include('gui/mm.php');
		}
		
		elseif($Basic=='Quality')
		{
			include('gui/quality.php');
		}
		
		elseif($Basic=='DO')
		{
			include('gui/dhaka.php');
		}
		
		elseif($Basic=='FAC')
		{
			include('gui/factory.php');
		}
		
		elseif($Basic=='Gallery')
		{
			include('gui/gallery.php');
		}
		
		elseif($Basic=='Product')
		{
			include('gui/product.php');
		}
		
		elseif($Basic=='VM')
		{
			include('gui/vision.php');
		}
		
		elseif($Basic=='HG')
		{
			include('gui/history.php');
		}
		
		elseif($Basic=='QT')
		{
			include('gui/qt.php');
		}
		
		elseif($Basic=='ACC')
		{
			include('gui/acc.php');
		}
		
		elseif($Basic=='GN')
		{
			include('gui/generic.php');
		}
		
		elseif($Basic=='TC')
		{
			include('gui/therapeutic.php');
		}
		
		elseif($Basic=='BN')
		{
			include('gui/brand.php');
		}
		
		elseif($Basic=='PSW')
		{
			include('gui/changepassword.php');
		}
		
		elseif($Basic=='CAL')
		{
			include('gui/calculator.php');
		}
		
		elseif($Basic=='FPro')
		{
			include('gui/find.php');
		}
		
		elseif($Basic=='FACIMG')
		{
			include('gui/facimg.php');
		}
		
		elseif($Basic=='FACCOM')
		{
			include('gui/faccom.php');
		}
		
		elseif($Basic=='DGM')
		{
			include('gui/dgm.php');
		}
		
		elseif($Basic=='Check')
		{
			include('gui/check.php');
		}
		
		elseif($Basic=="DF")
		{
			include('gui/dosage.php');
		}
		
		elseif($Basic=="Des")
		{
			include('gui/description.php');
		}
		
		elseif($Basic=="Ind")
		{
			include('gui/indication.php');
		}
		
		elseif($Basic=="DA")
		{
			include('gui/dosagead.php');
		}
		
		elseif($Basic=="SE")
		{
			include('gui/side.php');
		}
		
		elseif($Basic=="Pre")
		{
			include('gui/precautions.php');
		}
		
		elseif($Basic=="Con")
		{
			include('gui/contra.php');
		}
		
		elseif($Basic=="Drug")
		{
			include('gui/drug.php');
		}
		
		elseif($Basic=="Sto")
		{
			include('gui/storage.php');
		}
		
	}
	
	else
	{
		include_once('gui/main.php');
	}
?>