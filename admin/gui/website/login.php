<?php 
	include_once ('bll/CConManager.php');
	include_once ('bll/CBasic.php');
	include_once ('library/Session.php');
	include_once ('model/CResult.php');
	$oSession=new Session();
	$oConmanager=new CConManager;
	$oBasic=new CBasic;
	$oResult=new CResult;
	$flag = false;
	if (isset($_POST['btnLogin']))
	{ 
	    $username = $_POST['username'];
	    $password = md5($_POST['password']);
		$login_date=date('Y-m-d H:i:s');
		$sql = "SELECT * FROM user WHERE username= '$username' AND password='$password'";
		$oResult=$oBasic->SqlQuery($sql);
		if($oResult->IsSuccess)
		{
			$sql1="INSERT INTO login (username, login_date) VALUES ('$username', '$login_date')";
				$oResultup=$oBasic->SqlQuery($sql1);
			if($oResult->num_rows==1)
			{
				$_SESSION['SESS_USERNAME']=$oResult->row['username'];
				$_SESSION['SESS_PASSWORD']=$oResult->row['password'];
				$_SESSION['SESS_ID']=$oResult->row['id'];
				$_SESSION['SESS_NAME']=$oResult->row['name'];
				echo "<script>window.location='index.php'</script>";
				exit;
			}
			else
			{
				$flag = true;
			}
			
		}
		else
				echo "<script>window.location='index.php'</script>";	
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
        <link rel="icon" href="images/kumu_logo.jpg">
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            
            
            <section>				
                <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form" style="width:70%; height:60%; margin-top:10px; margin-left:10px">
						
							<form class="form-horizontal" name="form1" id="form1" action="" method="post" enctype="multipart/form-data" autocomplete="on"> 
								<center><img src="images/kumu_logo.jpg" style="width:20%; height:10%"/></center>
								
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
								
                                <p style="text-align:center; font-size:25px" class="noselect">KWT Complain</p> 
                                <p> 
                                    <center><label for="username" class="uname">Your Username</label></center>
                                    <input id="username" name="username" required="required" class="noselect" type="text" placeholder="USERNAME"/>
                                </p>
                                <p> 
                                    <center><label for="password" class="youpasswd"> Your Password </label></center>
                                    <input id="password" name="password" required="required" class="noselect" type="password" placeholder="PASSWORD" /> 
                                </p>
								
								<?php
									if($flag){?>
									<div class="clearfix"></div>
									<div style="color:red; text-decoration:blink; weight:500px">Miss your username or password.</div>
								<?php }?>
                                
                                <p class="login button" style="text-align:center"> 
                                    <input type="submit" value="Login" id="btnLogin" name="btnLogin" /> 
								</p>
                                
                            </form>
							
                        </div>

                    </div>
					
                </div>  
            </section>
        </div>
    </body>

</html>