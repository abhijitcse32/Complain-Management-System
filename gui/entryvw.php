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
                       
					<?php 
		
						if(isset($_GET['complain']))
						{
							$sql="SELECT *
								FROM complain
						WHERE id='".base64_decode($_GET['complain'])."'
						" ;
						}
					
						else
							$sql="SELECT * FROM complain ORDER BY id";
					
						$oResultCompUp=$oBasic->SqlQuery($sql);
				
					?>		
					
					<h2 style="text-align:center">Details</h2>
					<?php for($i=0;$i<$oResultCompUp->num_rows;$i++){ ?>
					<h2>Complain # <?php echo $oResultCompUp->rows[$i]['id'];?></h2>
					<h2>Subject: <?php echo $oResultCompUp->rows[$i]['subject'];?></h2>
					<?php } ?>
					<?php ?>
					<table style="border: 1px solid black;">
							<tr style="border: 1px solid black;">
								<th style="border: 1px solid black; width:10%; text-align:center">
									#
								</th>
								<th style="border: 1px solid black; width:20%; text-align:center">
									Date
								</th>
								
								<th style="border: 1px solid black; width:20%; text-align:center">
									Handle by
								</th>
								
								<th style="border: 1px solid black; width:20%; text-align:center">
									Action
								</th>
								
								<th style="border: 1px solid black; width:20%; text-align:center">
									Status
								</th>
								
								<th style="border: 1px solid black; width:25%; text-align:center">
									Comments
								</th>
								
								<th style="border: 1px solid black; width:20%; text-align:center">
									Mail
								</th>
							</tr>
					
					<?php 
					$sql="SELECT B.id, B.CreateDate, B.handle_by, B.action, B.status, 
							B.comments, A.mail, C.com_name, A.name complain_name, A.des_id des
										FROM complain A, complain_seq B, company C
										WHERE A.id='".base64_decode($_GET['complain'])."'
										AND A.id=B.complain_id
										AND A.com_id=C.com_id
										";
										
										$oResultUp=$oBasic->SqlQuery($sql);
					?>
					
					
					<?php for($i=0;$i<$oResultUp->num_rows;$i++){ ?>
						<tr class="table_data" style="border: 2px solid #000;">
							<td width="2%" valign="middle" style="border: 2px solid #000; text-align:right" bgcolor="<?php echo $bgcol;?>"><p><?php echo $i+1;?></p></td>
							<td width="5%" valign="middle" style="border: 2px solid #000; text-align:center" bgcolor="<?php echo $bgcol;?>"><p><?php echo $oResultUp->rows[$i]['CreateDate'];?></p></td>
							<td width="5%" valign="middle" style="border: 2px solid #000;" bgcolor="<?php echo $bgcol;?>"><p><?php echo '&nbsp;'.$oResultUp->rows[$i]['handle_by'];?></p></td>
							<td width="5%" valign="middle" style="border: 2px solid #000; text-align:center" bgcolor="<?php echo $bgcol;?>"><p><?php echo $oResultUp->rows[$i]['action'];?></p></td>
							<td width="5%" valign="middle" style="border: 2px solid #000;" bgcolor="<?php echo $bgcol;?>"><p><?php echo '&nbsp;'.$oResultUp->rows[$i]['status'];?></p></td>
							<td width="25%" valign="middle" style="border: 2px solid #000;" bgcolor="<?php echo $bgcol;?>"><p><?php echo '&nbsp;'.$oResultUp->rows[$i]['comments'];?></p></td>
							<td width="5%" valign="middle" style="border: 2px solid #000;" bgcolor="<?php echo $bgcol;?>"><p><?php echo '&nbsp;'.$oResultUp->rows[$i]['mail'];?></p></td>
						</tr>
					
									
					<?php }?>
					</table>

                    </div>
					
                </div>  
            </section>
			
			
			
			
			
        </div>
		<br/><br/><br/><br/>
		
    </body>

</html>