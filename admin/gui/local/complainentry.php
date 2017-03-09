<?php
	$oCommon=new CCommon();
	$id=FALSE;
	if(isset($_GET['id']))
	{
		$id= base64_decode($_GET['id']);
	}

	if (isset($_POST['btnSave']))
	{
		$heading = trim(addslashes($_POST['heading']));
		$description = trim(addslashes($_POST['description']));
		$CreatedBy=$oSession->getUserName();
		$CreateDate=date('Y-m-d H:i:s');
		$UpdateBy=$oSession->getUserName();
		$UpdateDate=date('Y-m-d H:i:s');
		//$createdate = date('Y-M-d');
	
	
		if($_POST['btnSave']=='Save')
		{
			$sql="INSERT INTO complain (heading, description, CreatedBy, CreateDate) 
				  VALUES ('$heading', '$description', '$CreatedBy', '$CreateDate')";
			$oResult=$oBasic->SqlQuery($sql);
			//print_r($oResult);
			
			echo "<script>alert('Insert complain Successfully');</script>";
			echo "<script>window.location='?Basic=ComplE'</script>";
		}
		
		
	}
	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
	<?php include('gui/admin/meta.php');?>
	<script>
			function deletecheck(id)
			{
				if(confirm("Are you sure to delete?"))
				{
					window.location="?Basic=DeptE&Delete="+id;
				}
			}
		</script>

		<script language="javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
	<script language="javascript" src="js/scripts.js"></script>
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
                <h2><i class="glyphicon glyphicon-info-sign"></i> Complain Entry</h2>

                <div class="box-icon">
                    
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
                <div class="col-lg-7 col-md-12">
                    
					<?php 
						$sql="SELECT * FROM complain WHERE id = $id";
						$oResultUp=$oBasic->SqlQuery($sql);
					?>
					
					
					<form method="post" action="" enctype="multipart/form-data" id="registerform">
			<table>
				<tr>
				<div class="form-group">
					<td>Heading: </td>
					<td>:</td>
					<td><input type="text" class="form-control" name="heading" id="heading" required="required" style="min-width:300px" value="<?php echo ($id?$oResultUp->row['heading']:''); ?>" /></td>
				</div>
					</tr>
				
				<tr>
					<td>Description: </td>
					<td>:</td>
					<td><textarea class="form-control" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="description" name="description"><?php echo $id?$oResultUp->row['description']:''; ?></textarea></td>
				</tr>
				
			</table>
			<input type="submit" value="<?php if($id) echo "Update"; else echo "Save";?>" id="btnSave" name="btnSave"  style="margin-right:10px; background:#003eff" class="btn btn-success" onClick="return checkValid();"/>
			<input type="reset" value="Reset" id="reset" name="reset" style="background:#003eff" class="btn btn-success" onClick="?Basic=ComE"  />
		
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
        <?php include('gui/admin/footer.php');?>
    </footer>

</div>
<script>WeSeeTextArea()</script>
<?php include('gui/admin/external.php');?>

</body>
</html>