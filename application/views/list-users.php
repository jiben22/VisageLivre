<div class="content-wrapper">
<div class="box">
              <div class="box-header">
              <h3 class="box-title">Liste des utilisateurs</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" aria-sort="ascending" aria-label="Pseudonyme: activate to sort column descending">Pseudonyme</th>
                  <th>
                  </th>
                </tr>

                </thead>
                <tbody class="row">

                  <?php
                  $count = 0;
                  foreach ($users as $key => $user) {
                      if ($count%2 == 0) {
                          ?>
                        <tr role="row" class="odd">
                          <td class="sorting_1 col-lg-1"><a href="<?php echo base_url(). "index.php/friend/profile?nickname=" . $user['nickname']; ?>"><?php echo $user['nickname']?></a></td>
                        <?php
                      } else {
                          ?>
                      <tr role="row" class="even">
                        <td class="sorting_1 col-lg-1"><?php echo $user['nickname']?></td>
                      <?php
                      } ?>
                    <td class="col-lg-4">
                      <?php
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
                    </td>
                    <?php
                  }
                   ?>
              </table>
            </div>
          </div>
</div>
<!--<div class="col-md-6">-->
<div>
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Members</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">8 New Members</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    <li>
                      <img src="<?php echo base_url() . "assets/dist/img/user1-128x128.jpg"; ?>" alt="User Image">
                      <a class="users-list-name" href="#">Alexander Pierce</a>
                      <span class="users-list-date">Today</span>
                    </li>
                    <li>
                      <img src="<?php echo base_url() . "assets/dist/img/user8-128x128.jpg"; ?>" alt="User Image" width="80" height="80">
                      <a class="users-list-name" href="#">Norman</a>
                      <span class="users-list-date">Yesterday</span>
                    </li>
                    <li>
                      <img src="dist/img/user7-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Jane</a>
                      <span class="users-list-date">12 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/user6-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">John</a>
                      <span class="users-list-date">12 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/user2-160x160.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Alexander</a>
                      <span class="users-list-date">13 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/user5-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Sarah</a>
                      <span class="users-list-date">14 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/user4-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Nora</a>
                      <span class="users-list-date">15 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/user3-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Nadia</a>
                      <span class="users-list-date">15 Jan</span>
                    </li>
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase">View All Users</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
