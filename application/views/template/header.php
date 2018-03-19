<header class="main-header">

    <!-- Logo -->
    <div class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Vi</b>sage<b>Li</b>vre</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Vi</b>sage<b>Li</b>vre</span>
    </div>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="<?php echo base_url()."index.php"; ?>" class="sidebar-toggle" role="button" style="font-weight: 600;">
        Fil d'actualités
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="<?php echo base_url()."assets/"; ?>#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-success"><?php echo $_SESSION['number_friendRequests'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="<?php echo base_url()."index.php/friend/listFriendRequests"; ?>">
                      <i class="fa fa-user-plus"></i>Vous avez
                      <?php
                        $number_friendRequests = $_SESSION['number_friendRequests'];
                        if($number_friendRequests <= 1)
                        {
                          echo $number_friendRequests . " demande d'amitié";
                        }
                        else {
                          echo $number_friendRequests . " demandes d'amitié";
                        }
                      ?>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="<?php echo base_url()."assets/"; ?>#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url()."assets/"; ?>dist/img/user1-128x128.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">
                <?php echo $_SESSION['nickname']; ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url()."assets/"; ?>dist/img/user1-128x128.jpg" class="img-circle" alt="User Image">
                <p>
                  <?php echo $_SESSION['nickname'] ?>
                  <small>
                    <?php echo "Connecté depuis " . $_SESSION['diff_date_connexion']; ?>
                  </small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-offset-1 col-xs-4 text-center">
                    <a href="<?php echo base_url()."index.php/friend/listFriends"; ?>">Amis</a>
                  </div>
                  <div class="col-xs-offset-1 col-xs-4 text-center">
                    <a href="<?php echo base_url()."index.php/user"; ?>">Utilisateurs</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url()."index.php/user/profile"; ?>" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url()."index.php/home/signOut"; ?>" class="btn btn-default btn-flat">Se déconnecter</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>

    </nav>
  </header>
