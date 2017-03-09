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
    
	<?php include('meta.php');?>
	<script>
			function deletecheck(id)
			{
				if(confirm("Are you sure to delete?"))
				{
					window.location="?Basic=DeptE&Delete="+id;
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
                <h2><i class="glyphicon glyphicon-info-sign"></i> Department Entry</h2>

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
			<table>
				<tr>
				<div class="form-group">
					<td>Department Code: </td>
					<td>:</td>
					<td><input type="text" class="form-control" name="dep_id" id="dep_id" required="required" style="min-width:300px" value="<?php echo ($id?$oResultUp->row['dep_id']:''); ?>" /></td>
				</div>
					</tr>
				
				<tr>
					<td>Department Name: </td>
					<td>:</td>
					<td><input type="text" class="form-control" name="dep_name" id="dep_name" required="required" style="min-width:300px" value="<?php echo ($id?$oResultUp->row['dep_name']:''); ?>"/></td>
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
		
                    <div class="box-inner-right" style="overflow-y : scroll; height: 355px; min-height:398px; min-width:1050px; margin-right:0px; width:100%">	
            	<table width="100%" cellpadding="1" cellspacing="1" style="margin-top:10px">
                    <tr style="color:#000000;">
                        
						<td width="10%"><b>SL#</b></td>
						<td width="10%"><b>Dept. ID</b></td>
                        <td width="10%"><b>Dept. Name</b></td>
						<td width="10%" align="center"><b>Actions</b></td>
                    </tr>
                    
                    <?php
                        $sql="SELECT * FROM department ORDER BY sort";
                        $oResult=$oBasic->SqlQuery($sql); //Paging  Create  
                        $num=$oResult->num_rows;
                        if($num>0)
                        {
                            for($i=0;$i<$oResult->num_rows;$i++)
                            {
                                if(($i%2)==0)
                                    $bgcol="#33A1DE";
                                else
                                    $bgcol="#F5F5F5";
                    ?>
                    
                    <tr class="table_data">
                        
						<td width="10%" valign="middle" bgcolor="<?php echo $bgcol;?>"><p><?php echo $oResult->rows[$i]['sort'];?></p></td>
						<td width="10%" valign="middle" bgcolor="<?php echo $bgcol;?>"><p><?php echo $oResult->rows[$i]['dep_id'];?></p></td>
						<td width="10%" valign="middle" bgcolor="<?php echo $bgcol;?>"><p><?php echo $oResult->rows[$i]['dep_name'];?></p></td>
						
						<td width="10%" bgcolor="<?php echo $bgcol;?>" align="center"><a href='<?php echo "?Basic=DeptE&id=".base64_encode($oResult->rows[$i]['id'])?>'><i class="glyphicon glyphicon-edit" style="color:black" title="Edit"></i></a>  
						<a href="#" onClick="deletecheck('<?php echo $oResult->rows[$i]['id']; ?>');"><i class="glyphicon glyphicon-trash" style="color:black" title="Delete"></i></a>
						</td>
                    </tr>            

                    <?php
                        }
                    }
                    ?>			
                  </table>
                   
                   
                </div>
            
               


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