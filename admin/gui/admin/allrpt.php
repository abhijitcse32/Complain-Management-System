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


	<?php include('meta.php');?>
</head>

<body>
    
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner" style="background:#003eff">
            <?php include('header.php');?>
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
		
					if(isset($_GET['complain']))
					{
						$sql="SELECT a.id, a.heading, a.description, a.CreatedBy, b.emp_name
								FROM complain a, employee b
						WHERE a.id='".base64_decode($_GET['complain'])."'
						" ;
					}
				
					else
						$sql="SELECT * FROM complain ORDER BY id";
				
					$oResultUp=$oBasic->SqlQuery($sql);
				
				?>
					
					<form method="post" action="" enctype="multipart/form-data" id="registerform">
			
			
		<?php for($i=0;$i<$oResultUp->num_rows;$i++){ ?>
		<p style="font-size:15px">ID: <b><?php echo $oResultUp->rows[$i]['CreatedBy']?></b></p>
		<p style="font-size:15px">Name: <b><?php echo $oResultUp->rows[$i]['emp_name']?></b></p>
		<p style="font-size:15px">Heading: <b><?php echo $oResultUp->rows[$i]['heading']?></b></p>
		<p style="font-size:15px">Message: <b><?php echo $oResultUp->rows[$i]['description']?></b></p>
		<?php }?>

			
		</form>
		<br>
		
			

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
        <?php include('footer.php');?>
    </footer>

</div>
<?php include('external.php');?>

</body>
</html>