<!DOCTYPE html>
<html lang="en">
<head>
    
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
                <h2><i class="glyphicon glyphicon-info-sign"></i> Dashboard</h2>

                <div class="box-icon">
                    
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
			
			
            <div class="box-content row">
                <div class="col-lg-7 col-md-12">
					<p>
						Today is : <b><?php echo date('d-M-Y (l)');?></b>
					</p>
					
                    <h1>Welcome <span style="font-size:25px">'<?php echo $oSession->getUserName(); ?>'</span><br>
                        
                    </h1>
                    <h4>Your Current Location is: </h4>
					<?php include('gui/admin/location.php');?>
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
