<?php
if ($_SESSION['username'] != 'admin') {
	header("Location: ./?controller=login&action=index");
}
?>
<style>
	.accordion .card {
		background: #202940 !important;
		color: rgba(169, 175, 187, 0.82) !important;
	}

	.accordion.accordion-secondary .card .card-header {
		color: #f25961;
	}

	.accordion.accordion-secondary .card .card-header .span-title {
		color: rgba(169, 175, 187, 0.82);
		font-size: 16px;
	}

	.accordion .card .card-body {
		border-top: 1px solid rgba(0, 0, 0, .125);
	}
</style>

<body data-background-color="dark">
	<div class="wrapper">
		<?php require_once "./Views/admin/templates/main-header.php" ?>
		<!-- Sidebar -->
		<?php require_once "./Views/admin/templates/sidebar.php" ?>
		<!-- End Sidebar -->
		<div class="main-panel">
			<div class="container">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Form Widget</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Forms</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Form Widget</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
						<?php
							if (isset($_POST["submit_group"])) {
								if(isset($_POST["members"]) && isset($_POST["leader"]) && isset($_POST["name_group"]) && $_POST["name_group"] != ''){
									$result = new GroupController;
									$name = $_POST["name_group"];
									$leader = $_POST["leader"];
									$members = $_POST["members"];
									if($result->setValueGroup($name,$leader,$members)){
										echo    '<div class="alert alert-success" role="alert">
													Add Success
												</div>';
									}else{
										echo    '<div class="alert alert-danger" role="alert">
													Fail !
												</div>';
									}
								}else{
									echo    '<div class="alert alert-warning" role="alert">
												Please enter full information
											</div>';
								}
							}
							?>
							<form method="POST">
								<div class="card">
									<div class="card-header d-flex justify-content-between">
										<h4 class="card-title">Add New Group</h4>
										<button class="btn btn-secondary" name="submit_group" type="submit">
											<span class="btn-label">
												<i class="fa fa-check"></i>
											</span>
											Save
										</button>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-lg-2 col-md-6">
												<div class="form-group">
													<label>Tên Nhóm</label>
													<input type="text" class="form-control form-control" id="defaultInput" placeholder="Tên nhóm" name="name_group">
												</div>
											</div>
											<div class="col-lg-2 col-md-6">
												<div class="form-group">
													<label>Leader</label>
													<div class="select2-input">
														<select id="leader" name="leader" class="form-control">
															<option value="AZ">Arizona</option>
															<option value="CO">Colorado</option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-lg-8 col-md-12">
												<div class="form-group">
													<label>Member</label>
													<div class="select2-input select2-warning">
														<select id="multiple-states" name="members[]" class="form-control" multiple="multiple">
															<option value="">&nbsp;</option>
															<optgroup label="Alaskan/Hawaiian Time Zone">
															<option value="CA">California</option>
																<option value="NV">Nevada</option>
																<option value="OR">Oregon</option>
																<option value="WA">Washington</option>
															</optgroup>
														</select>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="accordion accordion-secondary"">
								<div class=" card">
								<div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									<div class="span-icon">
										<div class="flaticon-box-1"></div>
									</div>
									<div class="span-title">
										Lorem Ipsum #1
									</div>
									<div class="span-mode"></div>
								</div>

								<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
									<div class="card-body">
										<table class="table table-striped mt-3">
											<thead>
												<tr>
													<th scope="col">#</th>
													<th scope="col">First</th>
													<th scope="col">Last</th>
													<th scope="col">Handle</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>Mark</td>
													<td>Otto</td>
													<td>@mdo</td>
												</tr>
												<tr>
													<td>2</td>
													<td>Jacob</td>
													<td>Thornton</td>
													<td>@fat</td>
												</tr>
												<tr>
													<td>3</td>
													<td colspan="2">Larry the Bird</td>
													<td>@twitter</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header collapsed" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									<div class="span-icon">
										<div class="flaticon-box-1"></div>
									</div>
									<div class="span-title">
										Lorem Ipsum #2
									</div>
									<div class="span-mode"></div>
								</div>
								<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
									<div class="card-body">
										Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header collapsed" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									<div class="span-icon">
										<div class="flaticon-box-1"></div>
									</div>
									<div class="span-title">
										Lorem Ipsum #3
									</div>
									<div class="span-mode"></div>
								</div>
								<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
									<div class="card-body">
										Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php require_once "./Views/admin/templates/main-footer.php" ?>
	</div>
	<script src="./Views/admin/web/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
	<script src="./Views/admin/web/assets/js/plugin/moment/moment.min.js"></script>
	<script src="./Views/admin/web/assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>
	<script src="./Views/admin/web/assets/js/plugin/select2/select2.full.min.js"></script>
	<script>
		$('#basic').select2({
			theme: "bootstrap"
		});

		$('#multiple').select2({
			theme: "bootstrap"
		});

		$('#multiple-states').select2({
			theme: "bootstrap"
		});
	</script>
	</div>