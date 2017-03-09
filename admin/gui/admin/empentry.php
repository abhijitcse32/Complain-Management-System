<?php
	$oCommon=new CCommon();
	$id=FALSE;
	if(isset($_GET['id']))
	{
		$id= base64_decode($_GET['id']);
	}

	if (isset($_POST['btnSave']))
	{
		$emp_id = trim(addslashes($_POST['emp_id']));
		$emp_name = trim(addslashes($_POST['emp_name']));
		$com_id = trim(addslashes($_POST['com_id']));
		$dept_id = trim(addslashes($_POST['dept_id']));
		$des_id = trim(addslashes($_POST['des_id']));
		$sort = trim(addslashes($_POST['sort']));
		$user_id = trim(addslashes($_POST['emp_id']));
		$password = md5(trim(addslashes($_POST['emp_id'])));
		$CreatedBy=$oSession->getUserName();
		$CreateDate=date('Y-m-d H:i:s');
		$UpdateBy=$oSession->getUserName();
		$UpdateDate=date('Y-m-d H:i:s');
		//$createdate = date('Y-M-d');
	
	
		if($_POST['btnSave']=='Save')
		{
			$sql="INSERT INTO employee (emp_id, emp_name, com_id, dept_id, des_id, sort, CreatedBy, CreateDate) 
				  VALUES ('$emp_id', '$emp_name', '$com_id', '$dept_id', '$des_id', '$sort', '$CreatedBy', '$CreateDate')";
			$oResult=$oBasic->SqlQuery($sql);
			//print_r($oResult);
			
			$sql="INSERT INTO user (name, username, password, CreateDate) 
					  VALUES ('Local', '$user_id', '$password', '$CreateDate')";
				$oResult=$oBasic->SqlQuery($sql);
				
			$sql="INSERT INTO exist_user (username, emp_name, CreateBy, CreateDate) 
					  VALUES ('$emp_id', '$emp_name', '$CreatedBy', '$CreateDate')";
				$oResult=$oBasic->SqlQuery($sql);
			
			
			echo "<script>alert('Insert Employee Successfully');</script>";
			echo "<script>window.location='?Basic=EmpE'</script>";
		}
		
		
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
	<?php include('meta.php');?>
	<script>
			function deletecheck(id)
			{
				if(confirm("Are you sure to delete?"))
				{
					window.location="?Basic=EmpE&Delete="+id;
				}
			}
		</script>

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
                <h2><i class="glyphicon glyphicon-info-sign"></i> Employee Entry</h2>

                <div class="box-icon">
                    
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
                <div class="col-lg-7 col-md-12">
                    
					<?php 
						$sql="SELECT * FROM employee WHERE id = $id";
						$oResultUp=$oBasic->SqlQuery($sql);
					?>
					
					
					<form method="post" action="" enctype="multipart/form-data" id="registerform">
			<table>
				<tr>
				<div class="form-group">
					<td>Employee Code: </td>
					<td>:</td>
					<td><input type="text" class="form-control" name="emp_id" id="emp_id" required="required" style="min-width:300px" value="<?php echo ($id?$oResultUp->row['emp_id']:''); ?>" /></td>
				</div>
					</tr>
				
				<tr>
					<td>Employee Name: </td>
					<td>:</td>
					<td><input type="text" class="form-control" name="emp_name" id="emp_name" required="required" style="min-width:300px" value="<?php echo ($id?$oResultUp->row['emp_name']:''); ?>"/></td>
				</tr>
				
				
				<tr>
					<td>Company Name</td>
					<td>:</td>
					<td>
						<select id="com_id" name="com_id" class="form-control" style="min-width:300px">
							<?php
							$sql="SELECT * FROM company ORDER BY sort";
							$oResult=$oBasic->SqlQuery($Sql);
							$oCommon->ReadAllSelectedOption($sql,'com_id','com_name',$id?$oResultUp->row['com_name']:'','');
							?>
						</select>
					</td>
				</tr>
				
				
				<tr>
					<td>Department Name</td>
					<td>:</td>
					<td>
						<select id="dept_id" name="dept_id" class="form-control" style="min-width:300px">
							<?php
							$sql="SELECT * FROM department ORDER BY sort";
							$oResult=$oBasic->SqlQuery($Sql);
							$oCommon->ReadAllSelectedOption($sql,'dep_id','dep_name',$id?$oResultUp->row['dep_name']:'','');
							?>
						</select>
					</td>
				</tr>
				
				
				<tr>
					<td>Designation Name</td>
					<td>:</td>
					<td>
						<select id="des_id" name="des_id" class="form-control" style="min-width:300px">
							<?php
							$sql="SELECT * FROM designation ORDER BY sort";
							$oResult=$oBasic->SqlQuery($Sql);
							$oCommon->ReadAllSelectedOption($sql,'des_id','des_name',$id?$oResultUp->row['des_name']:'','');
							?>
						</select>
					</td>
				</tr>
				
				<tr>
					<td>Order By</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="sort" id="sort" required="required" style="min-width:300px" value="<?php echo ($id?$oResultUp->row['sort']:''); ?>"/></td>
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
        <?php include('footer.php');?>
    </footer>

</div>
<?php include('external.php');?>

</body>
</html>