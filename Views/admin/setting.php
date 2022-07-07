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
								$title = $_POST["title"];
								$title = strip_tags($title);
								$title = addslashes($title);
								$theme = $_POST["theme"];
								switch ($theme) {
									case 'Theme 2':
										$theme = 2;
										break;
									
									default:
										$theme = 1;
										break;
								}
								$result = new SettingController;
								$array = [
									'site_title' => $title,
									'site_theme' => $theme
								];
								// $result->setValueSetting($array);

								// $helper = new Data;
								// $helper->uploadImg($_FILES["fileupload"]);
								$check = getimagesize($_FILES["fileupload"]["tmp_name"]);
								if($check !== false)
								{
									echo "Đây là file ảnh - " . $check["mime"] . ".";
								}
								else
								{
									echo "Không phải file ảnh.";
								}
							}						
							?>
							<form method="POST">
								<div class="card">
									<div class="card-header d-flex justify-content-between">
										<div class="card-title">Sweet Alert</div>
										<button name="submit" type="submit" class="btn btn-success">Save</button>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="card">
											<div class="card-body">
												<div class="form-group">
													<label for="title2">Tiêu đề của website</label>
													<input name="title" type="text" class="form-control" id="title2" value=<?= $setting->settingTheme('site_title') ?>>
													<small id="emailHelp2" class="form-text text-muted">Tiêu đề mặc định là Thành Aloha</small>
												</div>
												<div class="form-group">
													<label for="exampleFormControlSelect1">Chọn Theme trang chủ</label>
													<select name="theme" class="form-control form-control-lg" id="exampleFormControlSelect1">
														<option>Theme 1</option>
														<option>Theme 2</option>
													</select>
													<small id="emailHelp3" class="form-text text-muted">Chọn theme -> save -> F5 trang chủ để xem kết quả</small>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="card">
											<div class="card-body">
												<div class="form-group">
													<label for="exampleFormControlFile1">Upload Favicon</label>
													<input type="file" name="fileupload" id="fileupload">
													<!-- <input name="fileupload" type="file" class="form-control-file" id="exampleFormControlFile1"> -->
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