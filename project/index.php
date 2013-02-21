
<?php include_once("../header_files.php"); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span2">
			<a href=''>new</a>
			
			<?php echo $_SERVER['DOCUMENT_ROOT']; ?>
			<!--Sidebar content-->
		</div>
		<div class="span10">
			<!--Body content-->

			<table class='table table-bordered'>


				<?php 
					
				$projects = $Project->all();
				//print_r($projects);
				//$query = mysql_query( "SELECT * FROM projects");
				//$result = mysql_fetch_array($query);
				//print_r($result);
					foreach($projects as $project) : ?>
				<?php // print_r($project);?>
				<tr>
					<td><?php echo $project[0]; ?>
					</td>
					<td><?php echo $project[1]; ?>
					</td>
					<td><?php echo $project[2]; ?>
					</td>
				</tr>
				<?php endforeach; ?>


			</table>

		</div>
	</div>
</div>
<?php include_once('../footer.php') ?>