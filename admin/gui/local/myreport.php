<?php
	$oCommon=new CCommon();
	$id=FALSE;
	if(isset($_GET['id']))
	{
		$id= base64_decode($_GET['id']);
	}

	if (isset($_POST['btnSave']))
	{
		$dep_id = trim(addslashes($_POST['dep_id']));
		$dep_name = trim(addslashes($_POST['dep_name']));
		$sort = trim(addslashes($_POST['sort']));
		$CreatedBy=$oSession->getUserName();
		$CreateDate=date('Y-m-d H:i:s');
		$UpdateBy=$oSession->getUserName();
		$UpdateDate=date('Y-m-d H:i:s');
		//$createdate = date('Y-M-d');
	
	
		if($_POST['btnSave']=='Save')
		{
			$sql="INSERT INTO department (dep_id, dep_name, sort, CreatedBy, CreateDate) 
				  VALUES ('$dep_id', '$dep_name', '$sort', '$CreatedBy', '$CreateDate')";
			$oResult=$oBasic->SqlQuery($sql);
			//print_r($oResult);
			
			echo "<script>alert('Insert Department Successfully');</script>";
			echo "<script>window.location='?Basic=DeptE'</script>";
		}
		
		elseif($_POST['btnSave']=='Update')
		{
			$sql="UPDATE department SET dep_id='$dep_id', dep_name='$dep_name'
				, sort='$sort', UpdateBy='$UpdateBy', UpdateDate='$UpdateDate' WHERE id = '$id'";
			$oResult=$oBasic->SqlQuery($sql);
			echo "<script>alert('Update Department Successfully');</script>";
			echo "<script>window.location='?Basic=DeptE'</script>";
		}
	}
	if(isset($_GET['Delete']))
	{
		$Delete=$_GET['Delete'];
		$sql="DELETE FROM department WHERE id=$Delete";
		$oBasic->SqlQuery($sql);
		$oResult=$oBasic->SqlQuery($sql);
		if($oResult->IsSuccess)
		{
			echo ("<script>window.alert('Delete Successfully!!!');</script>");
			echo ("<script>window.location='?Basic=DeptE';</script>");
		}
	}
	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>

<!--
    <script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
 

<script type="text/javascript" src="js/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="css/daterangepicker.css" />-->


	<?php include('gui/admin/meta.php');?>
</head>

<body>
    
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner" style="background:#003eff">
            <?php include('gui/admin/header.php');?>
        </div>
    </div>
    
<div class="ch-container">
    <div class="row">
        
        
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <?php include('menu.php');?>
                    
                </div>
            </div>
        </div>
        
        <div id="content" class="col-lg-10 col-sm-10">
            
            <div>
    
</div>
<div class=" row">
    


</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Complain Report</h2>

                <div class="box-icon">
                    
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
                <div class="col-lg-7 col-md-12">
                    
					<?php 
						$sql="SELECT * FROM department WHERE id = $id";
						$oResultUp=$oBasic->SqlQuery($sql);
					?>
					
					
					<form method="post" action="" enctype="multipart/form-data" id="registerform">
			
			
			<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	
	<script>
         $(function() {
            $( "#formdate" ).datepicker({
               appendText:"(yy-mm-dd)",
               dateFormat:"yy-mm-dd",
               altField: "#datepicker-4",
               altFormat: "DD, d MM, yy"
            });
         });
		 
		 $(function() {
            $( "#todate" ).datepicker({
               appendText:"(yy-mm-dd)",
               dateFormat:"yy-mm-dd",
               altField: "#datepicker-4",
               altFormat: "DD, d MM, yy"
            });
         });
      </script>

			<p>Form Date: <input type="text" id="formdate" name="formdate"></p>
 

			<p>To Date: <input type="text" id="todate" name="todate"></p>
				
			<input type="submit" name="btnRpt" id="btnRpt" value="Show Report" style="width:120px" class="form_input"/>
		</form>
		<br>
		
			<?php
            if(isset($_POST['btnRpt']))
            {
				$a=$oSession->getUserName();
            	$formdate=$_POST['formdate']." 00:00:00";
				$todate=$_POST['todate']." 23:59:59";
				$oBasic=new CBasic();
				
				$Log = $oBasic->SqlQuery("
				SELECT a.id, a.heading, a.CreatedBy, a.CreateDate, b.emp_name
				FROM complain a, employee b
				WHERE a.CreateDate BETWEEN '$formdate' AND '$todate' 
				AND a.CreatedBy=b.emp_id
				AND a.CreatedBy='$a'
				ORDER BY a.CreateDate DESC");	
					  $LNum = $Log->num_rows;
					  if($LNum)
					  {	
				  
            ?>
			<table>
			<tr class="table_head" style="border: 1px solid #000">
                <td width="18%" valign="top" align="center" style="border: 1px solid #000"><strong>SL</strong></td>
				<td width="18%" valign="top" align="center" style="border: 1px solid #000"><strong>ID</strong></td>
				<td width="18%" valign="top" align="center" style="border: 1px solid #000"><strong>Name</strong></td>
				<td width="18%" valign="top" align="center" style="border: 1px solid #000"><strong>Date</strong></td>
				<td width="18%" valign="top" align="center" style="border: 1px solid #000"><strong>Action</strong></td>
              </tr>
			  
			  <?php
				 for($l=0;$l<$LNum;$l++)
				{
						if(($l%2)==0)
						$bgcol="#FFF";
					else
						$bgcol="#e1f3b4";

				?>
				
				<tr class="table_data" style="border: 1px solid #000">
				<td valign="top" bgcolor="<?php echo $bgcol;?>" align="center" style="border: 1px solid #000"><?php echo $l+1;?></td>
				<td valign="top" bgcolor="<?php echo $bgcol;?>" align="center" style="border: 1px solid #000"><?php echo $Log->rows[$l]['CreatedBy'];?></td>
				<td valign="top" bgcolor="<?php echo $bgcol;?>" align="center" style="border: 1px solid #000"><?php echo $Log->rows[$l]['emp_name'];?></td>
                <td valign="top" bgcolor="<?php echo $bgcol;?>" align="center" style="border: 1px solid #000"><?php echo $Log->rows[$l]['CreateDate'];?></td>
				
				<td width="5%" bgcolor="<?php echo $bgcol;?>" align="center"><a href='<?php echo "?Basic=MyComLstvw&complain=".base64_encode($Log->rows[$l]['id'])?>' style="color:black">View</a>  
              </tr>
			  </table>
					  <?php }}} ?>

            </div>
        </div>
    </div>
</div>
</div>
    </div>
</div>

   

    <hr>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="row">
        <?php include('gui/admin/footer.php');?>
    </footer>

</div>
<?php include('gui/admin/external.php');?>

</body>
</html>