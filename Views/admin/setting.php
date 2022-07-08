<?php
	if ($_SESSION['username'] != 'admin') {
	header("Location: ./?controller=login&action=index");
	}
?>
<body data-background-color="dark">
	<div class="wrapper">
		<?php require_once "./Views/admin/templates/main-header.php" ?>
		<!-- Sidebar -->
		<?php require_once "./Views/admin/templates/sidebar.php" ?>
		<!-- End Sidebar -->
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
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
								$helper = new Data;
								if ($helper->uploadImg($_FILES["filefavicon"])) {
									$favicon = "./uploads/" . $_FILES["filefavicon"]['name'];
								} else {
									$favicon = $setting->settingTheme('site_favicon');
								};
								if ($helper->uploadImg($_FILES["filelogo"])) {
									$logo = "./uploads/" . $_FILES["filelogo"]['name'];
								} else {
									$logo = $setting->settingTheme('site_logo');
								};
								$array = [
									'site_title' => $title,
									'site_theme' => $theme,
									'site_logo'	 => $logo,
									'site_favicon' => $favicon
								];
								$result->setValueSetting($array);
							}
							?>
							<form method="POST" enctype="multipart/form-data">
								<div class="card">
									<div class="card-header d-flex justify-content-between">
										<div class="page-header mb-0">
											<h4 class="page-title">Setting</h4>
										</div>
										<button class="btn btn-success" name="submit" type="submit">
											<span class="btn-label">
												<i class="fa fa-check"></i>
											</span>
											Save
										</button>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="card">
											<div class="card-body">
												<div class="form-group">
													<label for="title2">Tiêu đề của website</label>
													<input name="title" type="text" class="form-control" id="title2" value=<?= $setting->settingTheme('site_title') ?>>
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
										<div class="row">
											<div class="col-md-6">
												<div class="card">
													<div class="card-body">
														<div class="card card-post card-round mb-0">
															<img class="card-img-top" src="<?= $setting->settingTheme('site_favicon') ?>" alt="Card image cap" style="width : 50px !important" height="50">
														</div>
														<div class="form-group">
															<label for="exampleFormControlFile1">Upload Favicon</label>
															<input name="filefavicon" type="file" class="form-control-file" id="exampleFormControlFile1">
															<small class="form-text text-muted">Size 16 X 16px</small>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="card">
													<div class="card-body">
														<div class="card card-post card-round mb-0">
															<img class="card-img-top" src="<?= $setting->settingTheme('site_logo') ?>" alt="Card image cap">
														</div>
														<div class="form-group">
															<label for="exampleFormControlFile2">Upload Logo</label>
															<input name="filelogo" type="file" class="form-control-file" id="exampleFormControlFile2">
															<small class="form-text text-muted">Size 108 X 35px</small>
														</div>
													</div>
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
			<?php require_once "./Views/admin/templates/main-footer.php" ?>
		</div>
	</div>