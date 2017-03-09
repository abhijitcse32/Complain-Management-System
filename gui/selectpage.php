<?php	
	if(isset($_GET['Page']))
	{
		$Page=trim($_GET['Page']);
		if($Page=='Login')
		{
			include('gui/subs.php');
		}
		elseif($Page=='EntryPanel')
		{
			include('gui/entry.php');
		}
		
		elseif($Page=='EntryPanelAd')
		{
			include('gui/entryad.php');
		}
		
		elseif($Page=='ComplainView')
		{
			include('gui/entryvw.php');
		}
		
	}
	else
	{
		include('gui/mainhome.php');
	}
?>