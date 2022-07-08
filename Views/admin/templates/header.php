<?php 
	$setting = new BaseModel;
	try {
		$title = $setting->settingTheme('site_title');
		$favicon = $setting->settingTheme('site_favicon');
	} catch (\Throwable $th) {
		$title = "Thanh Aloha";
		$favicon = "./uploads/icon.ico";
	};
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?= $title ?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?= $favicon ?>" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="./Views/admin/web/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['./Views/admin/web/assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="./Views/admin/web/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="./Views/admin/web/assets/css/atlantis.min.css">
	<link rel="stylesheet" href="./Views/admin/web/assets/css/atlantis.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="./Views/admin/web/assets/css/demo.css">
	<script src="./Views/admin/web/assets/js/core/jquery.3.2.1.min.js"></script>
</head>