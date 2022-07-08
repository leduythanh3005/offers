<?php
if ($_SESSION['username'] != 'admin') {
    header("Location: ./?controller=login&action=index");
}
$result = new UserController;
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
                    <div class="page-header">
                        <h4 class="page-title">Users</h4>
                        <ul class="breadcrumbs">
                            <li class="nav-home">
                                <a href="./?controller=dashboard&action=index">
                                    <i class="flaticon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Users</a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="./?controller=user&action=index">List Users</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row row-card-no-pd">
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-user-5 text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Admin</p>
                                                <h4 class="card-title"><?= $result->numberOfUsers('Admin') ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-user text-success"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Leader</p>
                                                <h4 class="card-title"><?= $result->numberOfUsers('Leader') ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-users text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Member</p>
                                                <h4 class="card-title"><?= $result->numberOfUsers('Member') ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-user-2 text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Toltal</p>
                                                <h4 class="card-title">
                                                <?= 
                                                    $result->numberOfUsers('Admin') 
                                                    + $result->numberOfUsers('Leader') 
                                                    + $result->numberOfUsers('Member') 
                                                    + $result->numberOfUsers('Free Member');
                                                ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">Add User</h4>
                                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                            <i class="fa fa-plus"></i>
                                            Add User
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- Modal -->
                                    <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
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
                                                    if ($username == "" || $password == "" || !isset($password) || !isset($username)) {
                                                        echo '<script>alert("Please enter full information!")</script>';
                                                    } else {
                                                        $password   = md5(addslashes($password));
                                                        if ($result->creatUser($username, $password, $name, $level)) {
                                                            echo '<script>alert("Success!")</script>';
                                                        } else {
                                                            echo '<script>alert("Username already exists!")</script>';
                                                        }
                                                    }
                                                }
                                                ?>
                                                <div class="modal-header no-bd">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold">
                                                            ADD</span>
                                                        <span class="fw-light">
                                                            USER
                                                        </span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>Username</label>
                                                                    <input type="text" class="form-control" placeholder="Username" name="username">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>Name</label>
                                                                    <input name="name" type="text" class="form-control" placeholder="Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>Level</label>
                                                                    <select class="form-control form-control" id="defaultSelect" name="level">
                                                                        <option>Admin</option>
                                                                        <option>Leader</option>
                                                                        <option>Member</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>Password</label>
                                                                    <input name="password" type="password" class="form-control" placeholder="Password">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer no-bd">
                                                            <button name="submit" type="submit" class="btn btn-primary">Add</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="addRowModal2" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <?php
                                                if (isset($_POST["submit_update"])) {
                                                    $username   = $_POST["username_update"];
                                                    $password   = $_POST["password_update"];
                                                    $name       = $_POST["name_update"];
                                                    $level      = $_POST["level_update"];
                                                    $name       = strip_tags($name);
                                                    $name       = addslashes($name);
                                                    $level      = strip_tags($level);
                                                    $level      = addslashes($level);
                                                    $username   = strip_tags($username);
                                                    $username   = addslashes($username);
                                                    $password   = strip_tags($password);
                                                    if ($password == "" || !isset($password)) {
                                                        echo '<script>alert("Vui lòng điền mật khẩu");</script>';
                                                    } else {
                                                        $password   = md5(addslashes($password));
                                                        if ($result->updateRow($username, $password, $name, $level)) {
                                                            // echo '<script>alert("Success!");</script>';
                                                        } else {
                                                            echo '<script>alert("Username already exists!");</script>';
                                                        }
                                                    }
                                                }
                                                ?>
                                                <div class="modal-header no-bd">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold">
                                                            EDIT</span>
                                                        <span class="fw-light">
                                                            USER
                                                        </span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>Username</label>
                                                                    <input type="text" class="form-control username" placeholder="Username" name="username_update">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>Name</label>
                                                                    <input name="name_update" type="text" class="form-control name" placeholder="Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>Level</label>
                                                                    <select class="form-control form-control level" id="defaultSelect" name="level_update">
                                                                        <option>Admin</option>
                                                                        <option>Leader</option>
                                                                        <option>Member</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>Password</label>
                                                                    <input name="password_update" type="password" class="form-control" placeholder="Password">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer no-bd">
                                                            <button name="submit_update" type="submit" class="btn btn-primary">Update</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="add-row" class="display table table-striped table-hover">
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
                                                    <th style="width: 10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Username</th>
                                                    <th>Level</th>
                                                    <th>Group</th>
                                                    <th>Daily Earnings</th>
                                                    <th>Weekly Earnings</th>
                                                    <th>Monthly Earnings</th>
                                                    <th style="width: 10%">Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                $array = ['id', 'name', 'username', 'level', 'group_name'];
                                                foreach ($result->getListUser($array) as $value) {
                                                    if ($value['username'] != 'admin') {
                                                ?>
                                                        <tr>
                                                            <td class=py-0><?= $value['id'] ?></td>
                                                            <td class="name_0"><?= $value['name'] ?></td>
                                                            <td class="username_0"><?= $value['username'] ?></td>
                                                            <td class="level_0"><?= $value['level'] ?></td>
                                                            <td><?= $value['group_name'] ?></td>
                                                            <td><?= $result->getValueAmountTable('daily_earnings', $value['username']) ?></td>
                                                            <td><?= $result->getValueAmountTable('weekly_earnings', $value['username']) ?></td>
                                                            <td><?= $result->getValueAmountTable('monthly_earnings', $value['username']) ?></td>
                                                            <td>
                                                                <div class="form-button-action">
                                                                    <button type="button" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task" data-toggle="modal" data-target="#addRowModal2">
                                                                        <i class="fa fa-edit"></i>
                                                                    </button>
                                                                    <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove" href="?controller=user&action=delRow&username=<?= $value['username'] ?>"><i class="fa fa-times"></i></a>
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
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $('#basic-datatables').DataTable({});

                    $('#multi-filter-select').DataTable({
                        "pageLength": 5,
                        initComplete: function() {
                            this.api().columns().every(function() {
                                var column = this;
                                var select = $('<select class="form-control"><option value=""></option></select>')
                                    .appendTo($(column.footer()).empty())
                                    .on('change', function() {
                                        var val = $.fn.dataTable.util.escapeRegex(
                                            $(this).val()
                                        );

                                        column
                                            .search(val ? '^' + val + '$' : '', true, false)
                                            .draw();
                                    });

                                column.data().unique().sort().each(function(d, j) {
                                    select.append('<option value="' + d + '">' + d + '</option>')
                                });
                            });
                        }
                    });

                    // Add Row
                    $('#add-row').DataTable({
                        "pageLength": 5,
                    });

                    var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

                    $('#addRowButton').click(function() {
                        $('#add-row').dataTable().fnAddData([
                            $("#addName").val(),
                            $("#addPosition").val(),
                            $("#addOffice").val(),
                            action
                        ]);
                        $('#addRowModal').modal('hide');

                    });
                    $('#addRowButton2').click(function() {
                        $('#add-row2').dataTable().fnAddData([
                            $("#addName2").val(),
                            $("#addPosition2").val(),
                            $("#addOffice2").val(),
                            action
                        ]);
                        $('#addRowModal2').modal('hide');

                    });

                    $('.btn.btn-link.btn-primary.btn-lg').click(function() {
                        let element = $(this).parent().parent().parent();
                        let name = element.find('.name_0').text();
                        let username = element.find('.username_0').text();
                        let level = element.find('.level_0').text();
                        $('#addRowModal2 .form-control.username').val(username)
                        $('#addRowModal2 .form-control.name').val(name)
                        $('#addRowModal2 .form-control.form-control.level').val(level)
                    });
                });
            </script>
        <?php require_once "./Views/admin/templates/main-footer.php" ?>
        </div>
    </div>