<!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <!--<div class="user-details">
                    <div class="pull-left">
                        <img src="assets/images/users/avatar-1.jpg" alt="" class="thumb-md rounded-circle">
                    </div>
                    <div class="user-info">
                        <a href="#">Stanley Jones</a>
                        <p class="text-muted m-0">Administrator</p>
                    </div>
                </div>-->

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu" id="side-menu">
                        <li class="menu-title">Navigation</li>
                        <li>
                            <a href="index.html">
                                <i class="ti-home"></i><span> Dashboard </span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);"><i class="ti-files"></i><span> Pages </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="<?= base_url('office/pages'); ?>">All Pages</a></li>
                                <li><a href="<?= base_url('office/pages/add'); ?>">Add New</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);"><i class="fa fa-users" aria-hidden="true"></i><span> Users </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="<?= base_url('office/users'); ?>">Users</a></li>
                                <li><a href="<?= base_url('office/groups'); ?>">Groups</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);"><i class="fa fa-paint-brush"></i><span> Appearance </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="<?= base_url('office/appearance/menus'); ?>">Menus</a></li>
                            </ul>
                        </li>
						<li>
							<a href="<?= base_url('office/settings'); ?>"><i class="fa fa-cog" aria-hidden="true"></i><span> Settings </span></a>
						</li>

                    </ul>

                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>

            </div>
            <!-- Left Sidebar End -->