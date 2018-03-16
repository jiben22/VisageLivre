<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url()."assets/"; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
            <?php
              if(isset($_SESSION['nickname']))
              {
                echo $_SESSION['nickname'];
              }
             ?>
          </p>
          <a href="<?php echo base_url()."assets/"; ?>#"><i class="fa fa-circle text-success"></i>Online</a>
        </div>
      </div>
      <!-- search form
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu de navigation</li>
        <li class="active treeview menu-open">
          <a href="<?php echo base_url()."assets/"; ?>#">
            <i class=" glyphicon glyphicon-th-list"></i> <span>Liste</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()."index.php/friend"; ?>"> <i class="fa fa-circle-o"></i>Amis</a></li>
            <li><a href="<?php echo base_url()."index.php/user"; ?>"> <i class="fa fa-circle-o"></i>Utilisateurs</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
