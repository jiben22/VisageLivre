<div class="content-wrapper">
    <div class="row">
      <div class="col-md-offset-1 col-md-3" style="margin-top: 5px;">

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

      <div class="col-md-7" style="margin-top: 5px;">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Activité</a></li>
              <li><a href="#settings" data-toggle="tab">Éditer son profil</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?php echo base_url()."assets/"; ?>/dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Shared publicly - 7:30 PM today</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>
                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>

                  <input class="form-control input-sm" placeholder="Type a comment" type="text">
                </div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post clearfix">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?php echo base_url()."assets/"; ?>/dist/img/user1-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Sent you a message - 3 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>

                  <form class="form-horizontal">
                    <div class="form-group margin-bottom-none">
                      <div class="col-sm-9">
                        <input class="form-control input-sm" placeholder="Response">
                      </div>
                      <div class="col-sm-3">
                        <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?php echo base_url()."assets/"; ?>/dist/img/user1-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Posted 5 photos - 5 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <div class="row margin-bottom">
                    <div class="col-sm-6">
                      <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-6">
                          <img class="img-responsive" src="../../dist/img/photo2.png" alt="Photo">
                          <br>
                          <img class="img-responsive" src="../../dist/img/photo3.jpg" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <img class="img-responsive" src="../../dist/img/photo4.jpg" alt="Photo">
                          <br>
                          <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>

                  <input class="form-control input-sm" placeholder="Type a comment" type="text">
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputNickname" class="col-sm-3 control-label">Pseudonyme</label>

                    <div class="col-sm-9">
                      <input class="form-control" id="inputNickname" placeholder="Pseudonyme" type="text">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input class="form-control" id="inputEmail" placeholder="Email" type="email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-sm-3 control-label">Mot de passe</label>

                    <div class="col-sm-9">
                      <input class="form-control" id="inputName" placeholder="Mot de passe" type="text">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                      <button type="submit" class="btn btn-danger">Modifier</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
    </div>
    <!-- /.row -->
</div>
