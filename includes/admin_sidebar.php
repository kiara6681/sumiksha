<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header" style="text-align:-webkit-center">
                <div class="dropdown profile-element"> <span>
                    <img alt="image" class="img-circle" src="<?= base_url();?>frontend_assets/images/logo.png" style="background: #fff;width: 100px;"/>
                     </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Sumiksha Services</strong>
                     <b class="caret"></b> </span>  </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="<?= base_url();?>admin_dashboard/profile">Profile</a></li>
                        <li><a href="<?= base_url();?>admin_dashboard/changepassword">Change Password</a></li>
                        <li><a href="<?= base_url();?>logout.php?logout">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    DM
                </div>
            </li>

            <li class="active">
                <a href="<?= base_url();?>"><i class="fa fa-globe"></i> <span class="nav-label">Go to Website</span></a>
            </li>

            <li>
                <a href="<?= base_url();?>includes/admin_home.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
            </li>

            <li><a href="<?= base_url();?>admin_dashboard/check-civil-score-list.php"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Check Civil Score</span></a></li>

            <li><a href="<?= base_url();?>admin_dashboard/refer-earn-list.php"><i class="fa fa-users"></i> <span class="nav-label">Lead Generation List</span></a></li>

            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Request</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="<?= base_url();?>admin_dashboard/redemption.php">Redemption</a></li>
                    <li><a href="<?= base_url();?>admin_dashboard/statement.php">Statement</a></li>
                </ul>
            </li>

            <li><a href="<?= base_url();?>admin_dashboard/users-list.php"><i class="fa fa-users"></i> <span class="nav-label">Users</span></a></li>

            <li><a href="<?= base_url();?>admin_dashboard/business_lead.php"><i class="fa fa-users"></i> <span class="nav-label">Business Lead</span></a></li>
            
            <li><a href="<?= base_url();?>admin_dashboard/job.php"><i class="fa fa-users"></i> <span class="nav-label">Job</span></a></li>

            <li><a href="<?= base_url();?>admin_dashboard/content-list.php"><i class="fa fa-users"></i> <span class="nav-label">Content</span></a></li>

            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Products</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="<?= base_url();?>admin_dashboard/courses-list.php">Product List</a></li>
                    <li><a href="<?= base_url();?>admin_dashboard/course1-list.php">Product Category</a></li>
                </ul>
            </li>

            <li><a href="<?= base_url();?>admin_dashboard/facilities-list.php"><i class="fa fa-users"></i> <span class="nav-label">Customer Reviews</span></a></li>

            <li><a href="<?= base_url();?>admin_dashboard/gallery1-list.php"><i class="fa fa-users"></i> <span class="nav-label">Our Partners</span></a></li>

            <li><a href="<?= base_url();?>admin_dashboard/news_events-list.php"><i class="fa fa-users"></i> <span class="nav-label">Blogs</span></a></li>

            <li><a href="<?= base_url();?>admin_dashboard/notifications-list.php"><i class="fa fa-users"></i> <span class="nav-label">Notifications</span></a></li>

            <li><a href="<?= base_url();?>admin_dashboard/offers-list.php"><i class="fa fa-users"></i> <span class="nav-label">Offers</span></a></li>
            
			<li><a href="<?= base_url();?>admin_dashboard/contact-list.php"><i class="fa fa-users"></i> <span class="nav-label">Contact Us</span></a></li>
        </ul>
	</div>
</nav>
