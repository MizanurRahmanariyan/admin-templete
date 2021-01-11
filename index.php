<?php
  include "include/header.php";
?>
<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">


			<div class="col-md-12  form-group pull-right top_search">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search for...">
					<span class="input-group-btn">
						<button class="btn btn-secondary" type="button">Go!</button>
					</span>
				</div>
			</div>

		</div>

		<div class="clearfix"></div>

		<div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
				<div class="x_title">
					<h2>User All Infomation</small></h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" href="#">Settings 1</a>
								<a class="dropdown-item" href="#">Settings 2</a>
							</div>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box table-responsive">
								<p class="text-muted font-13 m-b-30">

								</p>
								<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>ID</th>
											<th>Email</th>
											<th>Name</th>
											<th>Age</th>
											<th>Telephone</th>
											<th>Action</th>
										</tr>
									</thead>


									<tbody>
										<!--										database infomsiton -->
										<?php
//		3step 
		                                 $query = "SELECT * FROM wp_info";
		                                 $result = mysqli_query($db,$query);
		                                 $count = 0;
		                                 while($row = mysqli_fetch_assoc($result)){
			                             $c_id = $row['U_ID'];
			                             $email = $row['c_email'];
			                             $name = $row['c_name'];
			                             $age = $row['c_age'];
			                             $tele = $row['c_telephone'];
			                             $count++;
			                             ?>

										<tr>
											<td><?php echo $count; ?></td>
											<td><?php echo $email; ?></td>
											<td><?php echo $name; ?></td>
											<td><?php echo $age; ?></td>
											<td><?php echo  $tele; ?></td>
											<td>
                                                <div class="form-group">
                                                     <button type='submit' class="btn btn-primary">Edit</button>
													
													<a href="index.php?deleteId=<?php echo $c_id;?>" class="bst"><i class="fa fa-trash-o " aria-hidden="true"></i>
</a>
												</div>
											</td>
                							</tr>
										<?php 
										  };
										?>



									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--					=============2nd option=================-->
		<div class="col-md-12 col-sm-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Add your user infomation</small></h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" href="#">Settings 1</a>
								<a class="dropdown-item" href="#">Settings 2</a>
							</div>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form class="" action="" method="POST" novalidate>

						<span class="section">Personal Info</span>

						<div class="field item form-group">

							<div class="col-md-6 col-sm-12">
								<input class="form-control" name="cat_email" class='email' placeholder="Enter Your Email Name​*" required="required" type="email" /></div>
						</div>

						<div class="field item form-group">

							<div class="col-md-6 col-sm-12">
								<input class="form-control" data-validate-length-range="6" data-validate-words="2" name="cat_name" placeholder="FULL Name​*" required="required" />
							</div>
						</div>

						<div class="field item form-group">

							<div class="col-md-6 col-sm-6">
								<input class="form-control" type="tel" class='tel' name="cat_age" placeholder="Age*" required='required' data-validate-length-range="8,20" /></div>
						</div>


						<div class="field item form-group">

							<div class="col-md-6 col-sm-6">
								<input class="form-control" type="tel" class='tel' name="cat_phone" placeholder="Telephone*" required='required' data-validate-length-range="8,20" /></div>
						</div>


						<div class="form-group">
							<div class="col-md-6 offset-md-3">
								<button name="cat_submit" type='submit' class="btn btn-primary">Submit</button>


							</div>
						</div>
					</form>
					<?php
					 if(isset($_POST['cat_submit'])){
						  $c_email = $_POST['cat_email'];
						  $c_name = $_POST['cat_name'];
						  $c_age = $_POST['cat_age'];
						  $c_phone = $_POST['cat_phone'];
						 $query = "INSERT INTO wp_info(c_email,c_name,c_age,c_telephone) VALUES('$c_email','$c_name', '$c_age', '$c_phone')";
//                         $query = "INSERT INTO wp_info(c_email,c_desc) VALUES ('$cat_name', '$cat_desc')";
						 $result = mysqli_query($db,$query);
						 if($result){
				  header('location: index.php');
			   }else{
				   echo "error";
			   }
					 }
					?>
				</div>
                
		 
			</div>
		</div>

 	
<?php 
	if(isset($_GET['deleteId'])){
		$delete_id = $_GET['deleteId'];
		
		
		$query = "DELETE FROM wp_info WHERE $c_id='$delete_id'";
			   $result = mysqli_query($db,$query);
			   if($result){
				  header('location: index.php');
			   }else{
				   echo "not right okay yet";
			   }
	}
	?>	


		<!-- /page content -->

		<!-- /page content -->
		<?php 
    include "include/footer.php";
 ?>
