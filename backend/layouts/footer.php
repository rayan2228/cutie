             <div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
                 <div class="mdk-drawer__content">
                     <div class="sidebar sidebar-light sidebar-left sidebar-p-t" data-perfect-scrollbar>
                         <div class="sidebar-heading">Menu</div>
                         <ul class="sidebar-menu">
                             <li class="sidebar-menu-item active open">
                                 <a class="sidebar-menu-button" data-toggle="collapse" href="#dashboards_menu">
                                     <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                                     <span class="sidebar-menu-text">Dashboards</span>
                                 </a>
                             </li>


                         </ul>
                         <div class="sidebar-heading">Pages</div>
                         <?php
                            if ($_SESSION["user_role"] == "admin") { ?>

                             <div class="sidebar-block p-0 mb-0">
                                 <ul class="sidebar-menu">
                                     <li class="sidebar-menu-item">
                                         <a class="sidebar-menu-button" data-toggle="collapse" href="#service">
                                             <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">info</i>
                                             <span class="sidebar-menu-text">Services</span>
                                             <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                         </a>
                                         <ul class="sidebar-submenu collapse" id="service">
                                             <li class="sidebar-menu-item">
                                                 <a class="sidebar-menu-button" href="../services/add.php">
                                                     <span class="sidebar-menu-text">Add Service</span>
                                                 </a>
                                             </li>
                                             <li class="sidebar-menu-item">
                                                 <a class="sidebar-menu-button" href="../services/service_lists.php">
                                                     <span class="sidebar-menu-text">Service lists</span>
                                                 </a>
                                             </li>
                                         </ul>
                                     </li>
                                     <li class="sidebar-menu-item">
                                         <a class="sidebar-menu-button" data-toggle="collapse" href="#portfolio">
                                             <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">info</i>
                                             <span class="sidebar-menu-text">Services</span>
                                             <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                         </a>
                                         <ul class="sidebar-submenu collapse" id="portfolio">
                                             <li class="sidebar-menu-item">
                                                 <a class="sidebar-menu-button" href="../portfolio/add.php">
                                                     <span class="sidebar-menu-text">Add portfolio</span>
                                                 </a>
                                             </li>
                                             <li class="sidebar-menu-item">
                                                 <a class="sidebar-menu-button" href="../portfolio/portfolio_lists.php">
                                                     <span class="sidebar-menu-text">portfolio lists</span>
                                                 </a>
                                             </li>
                                         </ul>
                                     </li>
                                 </ul>
                             </div>
                         <?php
                            }
                            ?>

                         <div class="d-flex align-items-center sidebar-p-a border-bottom sidebar-account">
                             <a href="profile.html" class="flex d-flex align-items-center text-underline-0 text-body">
                                 <span class="avatar avatar-sm mr-2">
                                     <img src="../assets/images/avatar/demi.png" alt="avatar" class="avatar-img rounded-circle">
                                 </span>
                                 <span class="flex d-flex flex-column">
                                     <strong><?= $_SESSION["user_name"] ?></strong>
                                     <small class="text-muted text-uppercase"><?= $_SESSION["user_role"] ?></small>
                                 </span>
                             </a>
                             <div class="dropdown ml-auto">
                                 <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                 <div class="dropdown-menu dropdown-menu-right">
                                     <div class="dropdown-item-text dropdown-item-text--lh">
                                         <div><strong><?= $_SESSION["user_name"] ?></strong></div>
                                         <div><?= $_SESSION["user_email"] ?></div>
                                     </div>
                                     <div class="dropdown-divider"></div>
                                     <a class="dropdown-item active" href="index.html">Dashboard</a>
                                     <a class="dropdown-item" href="profile.html">My profile</a>
                                     <a class="dropdown-item" href="edit-account.html">Edit account</a>
                                     <div class="dropdown-divider"></div>
                                     <a class="dropdown-item" href="login.
                                html">Logout</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             </div>
             <!-- // END drawer-layout -->

             </div>
             <!-- // END header-layout__content -->
             </div>
             <!-- // END header-layout -->
             <!-- App Settings FAB -->
             <div id="app-settings">
                 <app-settings layout-active="default" :layout-location="{
      'default': 'index.html',
      'fixed': 'fixed-dashboard.html',
      'fluid': 'fluid-dashboard.html',
      'mini': 'mini-dashboard.html'
    }"></app-settings>
             </div>

             <!-- jQuery -->
             <script src="../assets/vendor/jquery.min.js"></script>

             <!-- Bootstrap -->
             <script src="../assets/vendor/popper.min.js"></script>
             <script src="../assets/vendor/bootstrap.min.js"></script>

             <!-- Perfect Scrollbar -->
             <script src="../assets/vendor/perfect-scrollbar.min.js"></script>

             <!-- DOM Factory -->
             <script src="../assets/vendor/dom-factory.js"></script>

             <!-- MDK -->
             <script src="../assets/vendor/material-design-kit.js"></script>

             <!-- App -->
             <script src="../assets/js/toggle-check-all.js"></script>
             <script src="../assets/js/check-selected-row.js"></script>
             <script src="../assets/js/dropdown.js"></script>
             <script src="../assets/js/sidebar-mini.js"></script>
             <script src="../assets/js/app.js"></script>

             <!-- App Settings (safe to remove) -->
             <script src="../assets/js/app-settings.js"></script>

             <!-- Flatpickr -->
             <script src="../assets/vendor/flatpickr/flatpickr.min.js"></script>
             <script src="../assets/js/flatpickr.js"></script>

             <!-- Global Settings -->
             <script src="../assets/js/settings.js"></script>

             <!-- Moment.js -->
             <script src="../assets/vendor/moment.min.js"></script>
             <script src="../assets/vendor/moment-range.js"></script>

             <!-- Chart.js -->
             <script src="../assets/vendor/Chart.min.js"></script>

             <!-- App Charts JS -->
             <script src="../assets/js/charts.js"></script>
             <script src="../assets/js/chartjs-rounded-bar.js"></script>

             <!-- Chart Samples -->
             <script src="../assets/js/page.dashboard.js"></script>
             <script src="../assets/js/progress-charts.js"></script>

             <!-- Vector Maps -->
             <script src="../assets/vendor/jqvmap/jquery.vmap.min.js"></script>
             <script src="../assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
             <script src="../assets/js/vector-maps.js"></script>

             </body>

             </html>