<body data-background-color="dark">
	<div class="wrapper">
		<?php require_once "./Views/admin/templates/main-header.php" ?>
		<!-- Sidebar -->
		<?php require_once "./Views/admin/templates/sidebar.php" ?>
		<!-- End Sidebar -->
		<div class="main-panel">
			<div class="content">
			<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Alert</h4>
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
								<a href="#">Base</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Sweet Alert</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
						<?php
							if (isset($_POST["submit"])) {
								$username = $_POST["title"];
								// $password = $_POST["password"];
								$username = strip_tags($username);
								$username = addslashes($username);
								// $password = strip_tags($password);
								$result = new SettingController;
								$column = 'site_title';
								$value = $username;
								$result->setValueSetting($column, $value);
							}
						?>
							<form method="POST">
								<div class="card">
									<div class="card-header d-flex justify-content-between">
										<div class="card-title">Sweet Alert</div>
										<button name="submit" type="submit" class="btn btn-success">Save</button>	
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label for="title2">Tiêu đề của website</label>
													<input name="title" type="text" class="form-control" id="title2" placeholder="Tiêu đề của website">
													<small id="emailHelp2" class="form-text text-muted">Tiêu đề mặc định là Thành Aloha</small>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="https://www.themekita.com">
									ThemeKita
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Help
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Licenses
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">ThemeKita</a>
					</div>
				</div>
			</footer>
		</div>
	</div>