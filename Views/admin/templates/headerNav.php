<header class=main-header id=header>
    <nav class="navbar navbar-expand-lg navbar-light" id=navbar>
        <button id=sidebar-toggler class=sidebar-toggle> <span class=sr-only>Toggle navigation</span> </button> <span class=page-title><?= $_SESSION['pagetitle'] ?></span>
        <div class="navbar-right ">
            <div class=search-form>
                <form action="index.html">
                    <div class="input-group input-group-sm" id=input-group-search>
                        <input autocomplete=off name=query id=search-input class=form-control placeholder="Search..." />
                        <div class=input-group-append>
                            <button class=btn type=button>/</button>
                        </div>
                    </div>
                </form>
                <ul class="dropdown-menu dropdown-menu-search">
                    <li class=nav-item> <a class=nav-link href="index.html">Morbi leo risus</a> </li>
                    <li class=nav-item> <a class=nav-link href="index.html">Dapibus ac facilisis in</a> </li>
                    <li class=nav-item> <a class=nav-link href="index.html">Porta ac consectetur ac</a> </li>
                    <li class=nav-item> <a class=nav-link href="index.html">Vestibulum at eros</a> </li>
                </ul>
            </div>
            <ul class="nav navbar-nav">
                <li class=custom-dropdown>
                    <a class="offcanvas-toggler active custom-dropdown-toggler" data-offcanvas=contact-off href="javascript:"> <i class="mdi mdi-contacts icon"></i> </a>
                </li>
                <li class="dropdown user-menu">
                    <button class="dropdown-toggle nav-link" data-toggle=dropdown> <img src="./Views/admin/web/images/user/user-xs-01.jpg" class="user-image rounded-circle" alt="User Image" /> <span class="d-none d-lg-inline-block"><?= $_SESSION['username'] ?></span> </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a class=dropdown-link-item href="./?controller=profile&action=index"> <i class="mdi mdi-account-outline"></i> <span class=nav-text>My Profile</span> </a>
                        </li>
                        <li class=dropdown-footer>
                            <a class=dropdown-link-item href="./?controller=login&action=logout"> <i class="mdi mdi-logout"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>