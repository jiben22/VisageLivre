<div class="content-wrapper">
    <div class="row">
      <div class="col-md-offset-4 col-md-3" style="margin-top: 5px;">

        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url()."assets/"; ?>dist/img/user1-128x128.jpg" width="100" height="100" alt="User profile picture">
              <a href="<?php echo base_url()."index.php/user/wall?nickname=" . $_SESSION['nickname']; ?>" style="text-decoration: none; color: #333;">
            <h3 class="profile-username text-center"><?php echo $_SESSION['nickname'] ?></h3>
          </a>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <a href="<?php echo base_url(). "index.php/friend/listFriends" ?>">
                  <b>Amis</b> <span class="pull-right"><?php echo $number_friends ?></span>
                </a>
              </li>
            </ul>
            <a href="<?php echo base_url(). "index.php/user/deleteUser?nickname=" . $_SESSION['nickname']?>" class="btn btn-danger btn-block"><b>Supprimer son compte</b></a>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
