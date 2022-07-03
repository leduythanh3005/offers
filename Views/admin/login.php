<body class="bg-light-gray" id="body">
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
        <div class="d-flex flex-column justify-content-between">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="card card-default mb-0">
                        <div class="card-header pb-0">
                            <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                                <a class="w-auto pl-0" href="/index.html">
                                    <img src="./Views/admin/web/images/logo.png" alt="Mono">
                                    <span class="brand-name text-dark">MONO</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-body px-5 pb-5 pt-0">
                            <h4 class="text-dark mb-6 text-center">Sign in for free</h4>
                            <?php
                            if (isset($_POST["submit"])) {
                                $username = $_POST["username"];
                                $password = $_POST["password"];
                                $username = strip_tags($username);
                                $username = addslashes($username);
                                $password = strip_tags($password);
                                if ($username == "" || $password == "") {
                                    echo "Please enter full information";
                                } else {
                                    $password = md5(addslashes($password));
                                    $result = new LoginController;
                                    $result->submit($username, $password);
                                }
                            }
                            ?>
                            <form method="POST">
                                <div class="row">
                                    <div class="form-group col-md-12 mb-4">
                                        <input name="username" type="text" class="form-control input-lg" id="email" aria-describedby="emailHelp" placeholder="username">
                                    </div>
                                    <div class="form-group col-md-12 ">
                                        <input name="password" type="password" class="form-control input-lg" id="password" placeholder="Password">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div class="custom-control custom-checkbox mr-3 mb-3">
                                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                <label class="custom-control-label" for="customCheck2">Remember me</label>
                                            </div>
                                            <a class="text-color" href="#"> Forgot password? </a>
                                        </div>
                                        <button name="submit" type="submit" class="btn btn-primary btn-pill mb-4">Sign In</button>
                                        <p>Don't have an account yet ?
                                            <a class="text-blue" href="#">Sign Up</a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>