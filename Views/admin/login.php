<body data-background-color="dark">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-lg-3 mx-auto mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="page-title mb-0">Login</h4>
                        </div>
                        <?php
                        if (isset($_POST["submit"])) {
                            $username = $_POST["username"];
                            $password = $_POST["password"];
                            $username = strip_tags($username);
                            $username = addslashes($username);
                            $password = strip_tags($password);
                            if ($username == "" || $password == "") {
                                echo    '<div class="alert alert-warning" role="alert">
                                            Please enter full information
                                        </div>';
                            } else {
                                $password = md5(addslashes($password));
                                $result = new LoginController;
                                $result->submit($username, $password);
                            }
                        }
                        ?>
                        <form method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="input-icon">
                                        <span class="input-icon-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input name="username" type="text" class="form-control" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-icon">
                                        <span class="input-icon-addon">
                                            <i class="fas fa-key"></i>
                                        </span>
                                        <input name="password" type="password" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group mb-5">
                                    <button class="btn btn-success float-right" name="submit" type="submit">
                                        <span class="btn-label">
                                            <i class="fa fa-check"></i>
                                        </span>
                                        Sign In
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>