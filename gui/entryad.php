<?php 
	include_once ('bll/CConManager.php');
	include_once ('bll/CBasic.php');
	include_once ('library/Session.php');
	include_once ('model/CResult.php');
	$oSession=new Session();
	$oConmanager=new CConManager;
	$oBasic=new CBasic;
	$oResult=new CResult;
	$id=FALSE;
	if (isset($_POST['btnSave']))
	{ 
		//$seq = CONCAT('LHPL', LPAD(LAST_INSERT_ID(), 3, '0'));
	    $complain_id = trim(addslashes($_POST['complain_id']));
	    $handle_by = trim(addslashes($_POST['handle_by']));
	    $action = trim(addslashes($_POST['action']));
	    $status = trim(addslashes($_POST['status']));
	    $comments = trim(addslashes($_POST['comments']));
		$CreatedBy='ict';
		$CreateDate=date('Y-m-d H:i:s');
		
	
		$sql="INSERT INTO complain_seq (complain_id, handle_by, action, status, comments, CreatedBy, CreateDate) 
			  VALUES ('$complain_id', '$handle_by', '$action', '$status', '$comments', '$CreatedBy', '$CreateDate')";
		$oResult=$oBasic->SqlQuery($sql);
		//print_r($oResult);
		
		echo "<script>alert('Insert complain Successfully');</script>";
		echo "<script>window.location='?Page=EntryPanelAd'</script>";
			
	}
?>    

<!DOCTYPE html>
<html lang="en">

	<head>
        <meta charset="UTF-8" />
        <title>KWT</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="icon" href="admin/images/kumu_logo.jpg">
        <link rel="stylesheet" type="text/css" href="admin/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="admin/css/style.css" />
		<link rel="stylesheet" type="text/css" href="admin/css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            
            
            <section>				
                <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form" style="width:100%; height:120%; margin-top:10px;">
						
							<form method="post" action="" enctype="multipart/form-data" id="registerform">
								<center><img src="admin/images/kumu_logo.jpg" style="width:20%; height:10%"/></center>
								
								<style>
								.noselect {
									-webkit-touch-callout: none;
									-webkit-user-select: none;
									-khtml-user-select: none;
									-moz-user-select: none;
									-ms-user-select: none;
									user-select: none;
								}
								</style>
								
                                <p style="text-align:center; font-size:25px" class="noselect">KWT Complain Entry</p> 
                                <p> 
                                    <center><label for="com_id" class="com_id">Select Complain</label></center>
									<select id="complain_id" name="complain_id" class="noselect" style="width:92%">
										<?php
										$sql="SELECT * FROM complain ORDER BY CreateDate desc";
										$oResult=$oBasic->SqlQuery($Sql);
										$oCommon->ReadAllSelectedOption($sql,'id','aggregate_val',$id?$oResultUp->row['id']:'','');
										?>
									</select>
								</p>
                                
								<p> 
                                    <center><label for="handle_by" class="handle_by">Handle By</label></center>
						
									<select id="handle_by" name="handle_by" class="noselect" style="width:92%">
										<?php
										$sql="SELECT * FROM itperson ORDER BY id";
										$oResult=$oBasic->SqlQuery($Sql);
										$oCommon->ReadAllSelectedOption($sql,'per_name','per_name',$id?$oResultUp->row['per_name']:'','');
										?>
									</select>
						
                                    
                                </p>
								
								<p> 
                                    <center><label for="action" class="action">Action</label></center>
                                    <input id="action" name="action" required="required" class="noselect" type="text" placeholder="action" /> 
                                </p>
								
								<p> 
                                    <center><label for="status" class="status">Status</label></center>
									
									<select id="status" name="status" class="noselect" style="width:92%">
										<?php
										$sql="SELECT * FROM status ORDER BY id";
										$oResult=$oBasic->SqlQuery($Sql);
										$oCommon->ReadAllSelectedOption($sql,'stat_name','stat_name',$id?$oResultUp->row['stat_name']:'','');
										?>
									</select>
									
                                    
                                </p>
								
								
								
								<p> 
                                    <center><label for="comments" class="comments"> Comments</label></center>
									<textarea class="form-control" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" 
									id="comments" name="comments" placeholder="comments"></textarea>
								</p>
                                
                                <p class="login button" style="text-align:center"> 
                                    <input type="submit" value="Submit" id="btnSave" name="btnSave" /> 
								</p>
                                
                            </form>
							
                        </div>

                    </div>
					
                </div>  
            </section>
			
			
			
			
			
        </div>
		<br/><br/><br/><br/>
		<p style="text-align:center; font-size:30px">All Reports</p>
		<div class="box-inner-right" style="overflow-y : scroll; margin-left:10%; margin-right:10%; min-height:60%; min-width:80%;">	
            	<table width="100%" cellpadding="1" cellspacing="1" style="margin-top:10px; border: 2px solid #000">
                    <tr style="color:#000000; border: 2px solid #000">
                        
						<td width="2%" style="border: 2px solid #000; text-align:center"><b>Com No</b></td>
						<td width="5%" style="border: 2px solid #000; text-align:center"><b>Name</b></td>
                        <td width="10%" style="border: 2px solid #000; text-align:center"><b>Company</b></td>
						<td width="8%" style="border: 2px solid #000; text-align:center"><b>Designation</b></td>
						<td width="8%" style="border: 2px solid #000; text-align:center"><b>Mail</b></td>
						<td width="8%" style="border: 2px solid #000; text-align:center"><b>Subject</b></td>
                        <td width="10%" style="border: 2px solid #000; text-align:center"><b>Complain</b></td>
                        <td width="5%" style="border: 2px solid #000; text-align:center"><b>Status</b></td>
                        <td width="3%" style="border: 2px solid #000; text-align:center"><b>Date</b></td>
						
						
                    </tr>
                    
                    <?php
                        $sql="SELECT A.id, B.com_name, A.name, A.des_id, A.subject, A.description, A.CreateDate, A.status, A.mail
						FROM complain A, company B
						WHERE A.com_id=B.com_id 
						ORDER BY A.id desc ";
                        $oResult=$oBasic->SqlQuery($sql); 
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
                        
						<td width="1%" valign="middle" style="border: 2px solid #000; text-align:center" bgcolor="<?php echo $bgcol;?>"><p><?php echo $oResult->rows[$i]['id'];?></p></td>
						<td width="5%" valign="middle" style="border: 2px solid #000; text-align:center" bgcolor="<?php echo $bgcol;?>"><p><?php echo $oResult->rows[$i]['name'];?></p></td>
						<td width="10%" valign="middle" style="border: 2px solid #000" bgcolor="<?php echo $bgcol;?>"><p><?php echo '&nbsp;'.$oResult->rows[$i]['com_name'];?></p></td>
						<td width="8%" valign="middle" style="border: 2px solid #000" bgcolor="<?php echo $bgcol;?>"><p><?php echo '&nbsp;'.$oResult->rows[$i]['des_id'];?></p></td>
						<td width="5%" valign="middle" style="border: 2px solid #000;" bgcolor="<?php echo $bgcol;?>"><p><?php echo '&nbsp;'.$oResult->rows[$i]['mail'];?></p></td>
						<td width="8%" valign="middle" style="border: 2px solid #000" bgcolor="<?php echo $bgcol;?>"><p><?php echo '&nbsp;'.$oResult->rows[$i]['subject'];?></p></td>
						<td width="10%" valign="middle" style="border: 2px solid #000" bgcolor="<?php echo $bgcol;?>"><p><?php echo '&nbsp;'.$oResult->rows[$i]['description'];?></p></td>
						<td width="5%" valign="middle" style="border: 2px solid #000; text-align:center" bgcolor="<?php echo $bgcol;?>"><p><?php echo '&nbsp;'.$oResult->rows[$i]['status'];?></p></td>
						<td width="3%" valign="middle" style="border: 2px solid #000; text-align:center" bgcolor="<?php echo $bgcol;?>"><p><?php echo $oResult->rows[$i]['CreateDate'];?></p></td>
						
						
						
                    </tr>            

                    <?php
                        }
                    }
                    ?>			
                  </table>
                   
                   
                </div>
    </body>

</html>