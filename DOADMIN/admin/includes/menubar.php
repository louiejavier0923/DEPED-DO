<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo (!empty($user['IMG'])) ? '../images/'.$user['IMG'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user['LASTNAME'] ?>,<?php echo $user['FIRSTNAME'] ?></p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">REPORTS</li>
        <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="header">MANAGE</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Accounts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="users.php"><i class="fa fa-user"></i>User</a></li>
            <li><a href="personnel.php"><i class="fa fa-user"></i>Personnel</a></li>
		
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text"></i>
            <span>News & Updates</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="news.php"><i class="fa fa-file"></i>News</a></li>
            <li><a href="announcement.php"><i class="fa fa-bullhorn"></i>Announcements</a></li>
          </ul>
        </li>
   
        <li><a href="publish_vacancy.php"><i class="fa fa-search"></i>Publish Vacancy</a></li>
        <li><a href="schools.php"><i class="fa fa-building"></i>Schools</a></li>
  
             <li><a href="summary.php"><i class="fa fa-suitcase"></i>Summary</a></li>
                <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text"></i>
            <span>Manage Accounts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="placement.php"><i class="fa fa-building"></i>Placement</a></li>
             <li><a href="appointments.php"><i class="fa fa-suitcase"></i>Appointment</a></li>
             <li><a href="recalibrate.php"><i class="fa fa-building"></i>Calibrate</a></li>
            <li><a href="personal_info.php"><i class="fa fa-user"></i>Personal Info.</a></li>
      
          </ul>
        </li>
           <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text"></i>
            <span>Archives</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="archive_announcement.php"><i class="fa fa-bullhorn"></i>Announcements</a></li>
            <li><a href="archive_news.php"><i class="fa fa-file"></i>News</a></li>
            <li><a href="archive_personnel.php"><i class="fa fa-user"></i>Personnel</a></li>
            <li><a href="archive_schools.php"><i class="fa fa-building"></i>Schools</a></li>
            <li><a href="archive_user.php"><i class="fa fa-user"></i>User</a></li>
            <li><a href="archive_vacancy.php"><i class="fa fa-search"></i>Vacancy</a></li>
          </ul>
        </li>
        <li class="header">PRINTABLES</li>
        <li><a href="ranking.php"><i class="fa fa-files-o"></i> <span>Ranking</span></a></li>
        <li><a href="rqa.php"><i class="fa fa-suitcase"></i>RQA LIST</a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>