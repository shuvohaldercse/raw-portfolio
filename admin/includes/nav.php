<?php
$db_con = mysqli_connect("localhost","root","","sam-pro");

$un_red = "SELECT COUNT(*) AS unread FROM contact WHERE status=0";
$un_red_que = mysqli_query($db_con,$un_red);
$unread_msg = mysqli_fetch_assoc($un_red_que);


?>
<body>
    <div id="wrapper">
          <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/sam/admin/index.php">Admin Panel</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul id="active" class="nav navbar-nav side-nav">
                    <li class="selected"><a href="/sam/admin/index.php"><i class="fa fa-bullseye"></i> Dashboard</a></li>
                    <li><a href="/sam/admin/users/?wel_sam_bd-auth_79"><i class="fa fa-tasks"></i> Users</a></li>
                    <li><a href="/sam/admin/service/?wel_sam_bd-auth_79"><i class="fa fa-globe"></i> Service</a></li>
                    <li><a href="/sam/admin/site-description/?wel_sam_bd-auth_79"><i class="fa fa-list-ol"></i> Site Info</a></li>
                    <li><a href="/sam/admin/project/?wel_sam_bd-auth_79"><i class="fa fa-font"></i> Project</a></li>
                    <li><a href="/sam/admin/contact/"><i class="fa fa-envelope"></i> Message</a></li>
                    <li><a href="/sam/admin/about-me/"><i class="fa fa-list-ol"></i> About Me</a></li>
                    <li><a href="/sam/admin/gallery/"><i class="fa fa-font"></i> Gallery</a></li>
                    <li><a href="bootstrap-elements.html"><i class="fa fa-list-ul"></i> Bootstrap Elements</a></li>
                    <li><a href="bootstrap-grid.html"><i class="fa fa-table"></i> Bootstrap Grid</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown messages-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge"><?php echo $unread_msg['unread']; ?></span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header"><?php echo $unread_msg['unread']; ?> New Messages</li>
                            <?php
                            $sel_msg = "SELECT * FROM contact WHERE status=0";
                            $sel_msg_que = mysqli_query($db_con,$sel_msg);
                            ?>
                            <?php foreach ($sel_msg_que as $msg): ?>
                            <li class="message-preview">
                                <a href="#">
                                    <span class="avatar"><i class="fa fa-envelope"></i></span>
                                    <span class="message"><?php echo $msg['email']; ?></span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <?php endforeach; ?>
                            <li><a href="/sam/admin/contact/">Go to Inbox <span class="badge"><?php echo $unread_msg['unread']; ?></span></a></li>
                        </ul>
                    </li>
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['full_name']; ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="/sam/admin/logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>

                        </ul>
                    </li>
                    <li class="divider-vertical"></li>
                    <li>
                        <form class="navbar-search">
                            <input type="text" placeholder="Search" class="form-control">
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
