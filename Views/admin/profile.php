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
                    <div class="row mx-auto">
                        <div class="col-md-4">
                            <form method="POST" enctype="multipart/form-data">
                                <?php
                                if (isset($_POST["submit"])) {
                                    $password = $_POST["password"];
                                    if (isset($password) && $password != '') {
                                        $password = strip_tags($password);
                                        $password = md5(addslashes($password));
                                        $result = new ProfileController;
                                        $username = $_SESSION['username'];
                                        if ($result->updatePass($username, $password)) {
                                            echo '  <div class="alert alert-success alert-icon" role="alert">
                                                        <i class="mdi mdi-checkbox-marked-outline"></i>  Success!
                                                    </div>
                                                ';
                                        } else {
                                            echo '  <div class="alert alert-danger alert-icon" role="alert">
                                                        <i class="mdi mdi-diameter-variant"></i> Fail!
                                                    </div>
                                                ';
                                        }
                                    }
                                }
                                ?>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group form-floating-label">
                                            <label for="title2">Nh???p m???t kh???u m???i</label>
                                            <input name="password" type="password" class="form-control" id="title2">
                                        </div>
                                        <div class="form-group">
                                            <label for="title3">Nh???p l???i m???t kh???u m???i</label>
                                            <input name="password2" type="password" class="form-control" id="title3">
                                            <p class="text-danger">M???t kh???u kh??ng kh???p</p>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success float-right" name="submit" type="submit" disabled>
                                                <span class="btn-label">
                                                    <i class="fa fa-check"></i>
                                                </span>
                                                Change
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <script type="text/javascript">
                                $(document).ready(function() {
                                    let val1 = '';
                                    let val2 = '';
                                    $('.text-danger').hide();
                                    $("#title2").on("input", function() {
                                        val1 = $(this).val();
                                    });
                                    $("#title3").on("input", function() {
                                        val2 = $(this).val();
                                        $('.text-danger').show();
                                        $('.btn.btn-success.float-right').attr('disabled', 'true');
                                        if (val1 == val2 && val1 != '') {
                                            $('.text-danger').hide();
                                            $('.btn.btn-success.float-right').removeAttr('disabled');
                                        }
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once "./Views/admin/templates/main-footer.php" ?>
        </div>
    </div>