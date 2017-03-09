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
	    $com_id = trim(addslashes($_POST['com_id']));
	    $des_id = trim(addslashes($_POST['des_id']));
	    $name = trim(addslashes($_POST['name']));
	    $mail = trim(addslashes($_POST['mail']));
	    $subject = trim(addslashes($_POST['subject']));
		$description = trim(addslashes($_POST['description']));
		$CreatedBy=trim(addslashes($_POST['name']));
		$CreateDate=date('Y-m-d');
		$aggregate_val=$com_id.'-'.$subject.'('.$CreateDate.')';
	
		$sql="INSERT INTO complain (com_id, name, des_id, mail, subject, description, aggregate_val, CreatedBy, CreateDate) 
			  VALUES ('$com_id', '$name', '$des_id', '$mail', '$subject', '$description', '$aggregate_val', '$CreatedBy', '$CreateDate')";
		$oResult=$oBasic->SqlQuery($sql);
		//print_r($oResult);
		
		echo "<script>alert('Insert complain Successfully');</script>";
		echo "<script>window.location='?Page=EntryPanel'</script>";
			
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
                                    <center><label for="com_id" class="com_id">Select Company</label></center>
									<select id="com_id" name="com_id" class="noselect" style="width:92%">
										<?php
										$sql="SELECT * FROM company ORDER BY sort";
										$oResult=$oBasic->SqlQuery($Sql);
										$oCommon->ReadAllSelectedOption($sql,'com_id','com_name',$id?$oResultUp->row['com_name']:'','');
										?>
									</select>
								</p>
                                
								<p> 
                                    <center><label for="name" class="name">Name</label></center>
                                    <input id="name" name="name" required="required" class="noselect" type="text" placeholder="Name" /> 
                                </p>
								
								<p> 
                                    <center><label for="des_id" class="des_id">Designation</label></center>
                                    <input id="des_id" name="des_id" required="required" class="noselect" type="text" placeholder="Designation" /> 
                                </p>
								
								<p> 
                                    <center><label for="mail" class="mail">E-mail</label></center>
                                    <input id="mail" name="mail" required="required" class="noselect" type="text" placeholder="mail" /> 
                                </p>
								
								<p> 
                                    <center><label for="subject" class="subject">Subject</label></center>
                                    <input id="subject" name="subject" required="required" class="noselect" type="text" placeholder="Subject" /> 
                                </p>
								
								<p> 
                                    <center><label for="description" class="description"> Description</label></center>
									<textarea class="form-control" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" 
									id="description" name="description" placeholder="Description"></textarea>
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
						<td width="5%" valign="middle" style="border: 2px solid #000; text-align:center" bgcolor="<?php echo $bgcol;?>"><p><a href='<?php echo "?Page=ComplainView&complain=".base64_encode($oResult->rows[$i]['id'])?>' style="color:black">VIEW</a></p></td>
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