<?php
if ($_SESSION['username'] != 'admin') {
    header("Location: ./?controller=login&action=index");
}
?>
<body class="navbar-fixed sidebar-fixed" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>
    <div id="toaster"></div>
    <div class="wrapper">
        <?php require_once "./Views/admin/templates/sidebar.php" ?>
        <div class="page-wrapper">
            <?php require_once "./Views/admin/templates/headerNav.php" ?>
            <div class=content-wrapper>
                <div class=content>
                    <div class=row>
                        <div class=col-xl-3>
                            <div class="card card-default">
                                <div class=card-header>
                                    <h2>Settings</h2>
                                </div>
                                <div class="card-body pt-0">
                                    <ul class="nav nav-settings">
                                        <li class=nav-item>
                                            <a class="nav-link active" href="user-account-settings.html"> <i class="mdi mdi-settings-outline mr-1"></i> Account </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class=col-xl-9>
                            <div class="card card-default">
                                <div class=card-header>
                                    <h2 class=mb-5>Account Settings</h2>
                                </div>
                                <div class=card-body>
                                <?php
                                if (isset($_POST["submit"])) {
                                    $password = $_POST["password"];
                                    $password = strip_tags($password);
                                    $password = md5(addslashes($password));
                                    $result = new ProfileController;
                                    $username = $_SESSION['username'];
                                    if($result->updatePass($username, $password)){
                                        echo '  <div class="alert alert-success alert-icon" role="alert">
                                                    <i class="mdi mdi-checkbox-marked-outline"></i>  Success!
                                                </div>
                                            ';
                                    }else{
                                        echo '  <div class="alert alert-danger alert-icon" role="alert">
                                                    <i class="mdi mdi-diameter-variant"></i> Fail!
                                                </div>
                                            ';
                                    }
                                }
                                ?>
                                    <form method="POST">
                                        <div class="form-group mb-4">
                                            <label for=newPassword>New password</label>
                                            <input name="password" type=password class=form-control id=newPassword>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for=conPassword>Confirm password</label>
                                            <input type=password class=form-control id=conPassword>
                                            <div class="text-danger small mt-1">Invalid password</div>
                                        </div>
                                        <div class="d-flex justify-content-end mt-6">
                                            <button name="submit" type=submit class="btn btn-primary mb-2 btn-pill" disabled>Update Profile</button>
                                        </div>
                                    </form>
                                </div>
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        let val1= '';
                                        let val2= '';
                                        $('.text-danger.small.mt-1').hide();
                                        $("#newPassword").on("input", function() {
                                            val1 = $(this).val();
                                        });
                                        $("#conPassword").on("input", function() {
                                            val2 = $(this).val();
                                            $(this).addClass('border-danger');
                                            $('.text-danger.small.mt-1').show();
                                            $('.btn.btn-primary.mb-2.btn-pill').attr('disabled' , 'true');
                                            if(val1 == val2){
                                                $('.text-danger.small.mt-1').hide();
                                                $(this).removeClass('border-danger');
                                                $('.btn.btn-primary.mb-2.btn-pill').removeAttr('disabled');
                                            }
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <?php require_once "./Views/admin/templates/footerSecond.php" ?>
        </div>
    </div>

    <!-- Card Offcanvas -->
    <?php require_once "./Views/admin/templates/cardoffcanvas.php" ?>