<?php
if ($_SESSION['username'] != 'admin') {
    header("Location: ./?controller=login&action=index");
}
$result = new UserController;
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
                        <div class=col-12>
                            <div class="card card-default">
                                <div class=card-header>
                                    <h2>Products Inventory</h2>
                                </div>
                                <div class=card-body>
                                    <table id=productsTable class="table table-hover table-product" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Level</th>
                                                <th>Group</th>
                                                <th>Daily Earnings</th>
                                                <th>Weekly Earnings</th>
                                                <th>Monthly Earnings</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $array = ['id','name','username','level','group_name'];
                                                foreach($result->getListUser($array) as $value){
                                                    if($value['username'] != 'admin'){
                                                        switch ($value['level']) {
                                                            case 1:
                                                                $level = 'Admin';
                                                                break;
                                                            case 2:
                                                                $level = 'Leader';
                                                                break;
                                                            case 3:
                                                                $level = 'Member';
                                                                break;
                                                            default:
                                                                $level = 'Free Member';
                                                                break;
                                                        }
                                            ?>
                                            <tr>
                                                <td class=py-0><?= $value['id'] ?></td>
                                                <td><?= $value['name'] ?></td>
                                                <td><?= $value['username'] ?></td>
                                                <td><?= $level ?></td>
                                                <td><?= $value['group_name'] ?></td>
                                                <td><?= $result->getValueAmountTable('daily_earnings',$value['username']) ?></td>
                                                <td><?= $result->getValueAmountTable('weekly_earnings',$value['username']) ?></td>
                                                <td><?= $result->getValueAmountTable('monthly_earnings',$value['username']) ?></td>
                                                <td>
                                                    <div class=dropdown>
                                                        <a class="dropdown-toggle icon-burger-mini" href="#" role=button id=dropdownMenuLink data-toggle=dropdown aria-haspopup=true aria-expanded=false> </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby=dropdownMenuLink> 
                                                            <a class=dropdown-item href="#">Edit</a> 
                                                            <a class=dropdown-item href="?controller=user&action=delRow&username=<?= $value['username'] ?>">Del</a> 
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=row>
                        <div class=col-xl-6>
                            <div class="card card-default">
                                <div class="card-header mb-6">
                                    <h2>number of users</h2>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 ">
                                            Admin
                                            <span class="badge badge-primary badge-pill"><?= $result->numberOfUsers('Admin') ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                                            Leader
                                            <span class="badge badge-primary badge-pill"><?= $result->numberOfUsers('Leader') ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                                            Member
                                            <span class="badge badge-primary badge-pill"><?= $result->numberOfUsers('Member') ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                                            Free Member
                                            <span class="badge badge-primary badge-pill"><?= $result->numberOfUsers('Free Member') ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                                            Total
                                            <?php
                                                $total = $result->numberOfUsers('Admin') 
                                                                + $result->numberOfUsers('Leader') 
                                                                + $result->numberOfUsers('Member') 
                                                                + $result->numberOfUsers('Free Member');
                                            ?>
                                            <span class="badge badge-primary badge-pill"><?= $total ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class=col-xl-6>
                            <div class="card card-default">
                                <div class=card-header>
                                    <h2 class=mb-5>Create Account</h2>
                                </div>
                                <div class=card-body>
                                    <?php
                                    if (isset($_POST["submit"])) {
                                        $username   = $_POST["username"];
                                        $password   = $_POST["password"];
                                        $name       = $_POST["name"];
                                        $level      = $_POST["level"];
                                        $name       = strip_tags($name);
                                        $name       = addslashes($name);
                                        $level      = strip_tags($level);
                                        $level      = addslashes($level);
                                        $username   = strip_tags($username);
                                        $username   = addslashes($username);
                                        $password   = strip_tags($password);
                                        if($username == "" || $password == "" || !isset($password) || !isset($username)){
                                            echo '  <div class="alert alert-warning alert-icon" role="alert">
                                                        <i class="mdi mdi-alert-decagram-outline"></i> Please enter full information!
                                                    </div>
                                                ';
                                        }else{
                                            $password   = md5(addslashes($password));
                                            if ($result->creatUser($username, $password, $name, $level )) {
                                                echo '  <div class="alert alert-success alert-icon" role="alert">
                                                        <i class="mdi mdi-checkbox-marked-outline"></i>  Success!
                                                    </div>
                                                ';
                                            } else {
                                                echo '  <div class="alert alert-danger alert-icon" role="alert">
                                                        <i class="mdi mdi-diameter-variant"></i> 
                                                        Username already exists!
                                                    </div>
                                                ';
                                            }
                                        }
                                    }
                                    ?>
                                    <form method="POST">
                                        <div class="form-row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <label for=newName>Your Name</label>
                                                <input name="name" type=text class=form-control id=newName>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <label for=newuserName>UserName</label>
                                                <input name="username" type=text class=form-control id=newuserName>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-2">
                                                <label for=newLevel>Level</label>
                                                <select class="form-control rounded-0" id="newLevel" name="level">
                                                    <option>Admin</option>
                                                    <option>Leader</option>
                                                    <option>Member</option>
                                                    <option selected>Free Member</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-2">
                                                <label for=conPassword>Password</label>
                                                <input name="password" type=password class=form-control id=conPassword>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end mt-6">
                                            <button name="submit" type=submit class="btn btn-primary mb-2 btn-pill">Create</button>
                                        </div>
                                    </form>
                                </div>
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