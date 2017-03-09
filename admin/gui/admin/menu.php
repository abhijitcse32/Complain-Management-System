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
			
			<?php for($i=0;$i<$oResultUp->num_rows;$i++){ ?>
			
			<li class="accordion"><a class="ajax-link" href="./"><i class="glyphicon glyphicon-plus"></i>
				<span> <?php echo $oResultUp->rows[$i]['menu_name']?></span></a>
				<ul class="nav nav-pills nav-stacked">
				<?php 
					$sql="SELECT * FROM menulist 
					WHERE main_menu_id='".$oResultUp->rows[$i]['id']."' 
					AND access='$a' ORDER BY menu_id";
					$oResultCond=$oBasic->SqlQuery($sql);
				?>
				<?php for($j=0;$j<$oResultCond->num_rows;$j++){?>
				<li><a href="<?php echo $oResultCond->rows[$j]['menu_path'];?>"><i class="glyphicon glyphicon-pencil"></i> <?php echo $oResultCond->rows[$j]['menu_name'];?></a></li>
				<?php } ?>
				</ul>
			</li>
			
			<?php }?>

				
			
						
		</ul>
	<?php }?>