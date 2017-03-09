<?php 
	$a=$oSession->getName();
	if (!isset($no_visible_elements) || !$no_visible_elements) 
	{ 
	?>
		<ul class="nav nav-pills nav-stacked main-menu">
		
			
			
			<!--
			<li class="accordion"><a class="ajax-link" href="./"><i class="glyphicon glyphicon-home"></i><span> Home</span></a>
			
				<ul class="nav nav-pills nav-stacked">
					<li><a href="index.php?Basic=Logo"><i class="glyphicon glyphicon-pencil"></i> Change Logo</a></li>
					<li><a href="index.php?Basic=Slide"><i class="glyphicon glyphicon-pencil"></i> Change Slide</a></li>
					<li><a href="index.php?Basic=RP"><i class="glyphicon glyphicon-pencil"></i> R P Shaha</a></li>
					<li><a href="index.php?Basic=Details"><i class="glyphicon glyphicon-pencil"></i> Kumudini Details</a></li>
				</ul>
			
			</li>
-->
			<?php 
				$sql="SELECT * FROM menulist WHERE main_menu_id=0 AND access='$a' ORDER BY menu_id";
				$oResultUp=$oBasic->SqlQuery($sql);
			?>
			
			
			
			
			<ul class="nav nav-pills nav-stacked">
			<?php for($i=0;$i<$oResultUp->num_rows;$i++){ ?>
					<li><a class="ajax-link" href="<?php echo $oResultUp->rows[$i]['menu_path'];?>"><i class="glyphicon glyphicon-pencil"></i><span> <?php echo $oResultUp->rows[$i]['menu_name'];?></span></a></li>
				<?php }?>
			</ul>
			
			
			
			
			

				
			
						
		</ul>
	<?php }?>