<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">


                <li class="sidebar-item  <?php if ($_GET['menuItem'] == 1) {

                                                echo "active";
                                            } ?>">
                    <a href="index.php?menuItem=1" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Programme</span>
                    </a>
                </li>

                <li class="sidebar-item  <?php if ($_GET['menuItem'] == 2) {

                                                echo "active";
                                            } ?>">
                    <a href="users.php?menuItem=2" class='sidebar-link'>
                        <i class="bi bi-people"></i>
                        <span>Gestion des utilisateurs</span>
                    </a>
                </li>
                <li class="sidebar-item  <?php if ($_GET['menuItem'] == 3) {

                                                echo "active";
                                            } ?>">
                    <a href="transports.php?menuItem=3" class='sidebar-link'>
                        <i class="bi bi-life-preserver"></i>
                        <span>Gestion des transports</span>
                    </a>
                </li>



            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>