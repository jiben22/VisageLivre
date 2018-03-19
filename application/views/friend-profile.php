<div class="content-wrapper">
    <div class="row">
      <div class="col-md-offset-4 col-md-3" style="margin-top: 5px;">

        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url()."assets/"; ?>dist/img/user1-128x128.jpg" alt="User profile picture">

            <h3 class="profile-username text-center"><?php echo $nickname ?></h3>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Amis</b> <a class="pull-right"><?php echo $number_friends ?></a>
              </li>
            </ul>

            <?php
            $user = $user[0];
            if(isset($user['isEligibleForRequest']) && $user['isEligibleForRequest'] === true)
            {
              ?>
              <a href="<?php echo base_url(). "index.php/friend/request?nickname=" . $user['nickname']?>" class="btn btn-primary btn-block" style="width: 240px;"><b>Envoyer une demande d'amitié</b></a>
              <?php
            }
            else if( isset($user['isEligibleForDeleteFriendship']) && ($user['isEligibleForDeleteFriendship'] === true)  )
            {
              ?>
              <a href="<?php echo base_url(). "index.php/friend/deleteFriendship?nickname=" . $user['nickname']?>" class="btn btn-danger btn-block" style="width: 240px;"><b>Supprimer la relation d'amitié</b></a>
              <?php
            }
            else {
              ?>
              <span class="btn btn-primary btn-block disabled" style="width: 240px;"><b>Demande d'amitié en attente</b></span>
              <?php
            }
            ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
