<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>ROMERO ADRIANE</p>
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
            <li><a href="users.php"><i class="fa fa-circle-o"></i>User</a></li>
            <li><a href="overtime.php"><i class="fa fa-circle-o"></i>Personnel</a></li>
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
            <li><a href="news.php"><i class="fa fa-circle-o"></i>News</a></li>
            <li><a href="announcement.php"><i class="fa fa-circle-o"></i>Announcements</a></li>
          </ul>
        </li>
        <li><a href="publish_vacancy.php"><i class="fa fa-suitcase"></i>Publish Vacancy</a></li>
        <li><a href="schools.php"><i class="fa fa-suitcase"></i>Schools</a></li>
        <li><a href="placement.php"><i class="fa fa-suitcase"></i>Placement</a></li>
        <li><a href="appointments.php"><i class="fa fa-suitcase"></i>Appointment</a></li>
           <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text"></i>
            <span>Archives</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="archive_users.php"><i class="fa fa-circle-o"></i>User</a></li>
            <li><a href="archive_schools.php"><i class="fa fa-circle-o"></i>Schools</a></li>
            <li><a href="archive_vacancy.php"><i class="fa fa-circle-o"></i>Vacancy</a></li>
            <li><a href="archive_news.php"><i class="fa fa-circle-o"></i>News</a></li>
            <li><a href="archive_announcement.php"><i class="fa fa-circle-o"></i>Announcements</a></li>
          </ul>
        </li>
        <li class="header">PRINTABLES</li>
        <li><a href="ranking.php"><i class="fa fa-files-o"></i> <span>Ranking</span></a></li>
        <li><a href="rqa.php"><i class="fa fa-suitcase"></i>RQA LIST</a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>