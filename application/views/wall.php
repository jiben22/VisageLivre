<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <?php
      if( $user === $_SESSION['nickname'] )
      {
        ?>
      <!-- Create post -->
      <section class="col-lg-offset-2 col-lg-6">
      <div class="box box-widget">
        <div class="box-header with-border">
          <div class="user-block">
            <a href="<?php echo base_url()."index.php/user/wall?nickname=" . $user; ?>"><img src="<?php echo base_url()."assets/"; ?>dist/img/user1-128x128.jpg" width="40" height="40" class="img-circle" alt="User Image"></a>
            <span class="username"><a href="<?php echo base_url()."index.php/user/wall?nickname=" . $user; ?>"><?php echo $user ?></a></span>
          </div>
          <!-- /.user-block -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <!-- post text -->
          <div class="row">
            <div class="col-lg-12">
              <?php echo form_open('home/createPost') ?>
                  <div class="form-group">
                    <textarea placeholder="Exprimez-vous" class="form-control" rows="2" name="post" style="resize: none;"></textarea>
                </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" name="submit" class="btn btn-default">Publier</button>
          </div>
          <!-- /.box-footer -->
        </div>
      </div>
      </section>
      <?php
    }
    ?>

      <section>
        <?php
          foreach($posts as $post) {
            $auteur = $user;
        ?>
        <div class="row">
      <!-- Comments -->
        <div class="col-lg-offset-2 col-lg-6">
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <a href="<?php echo base_url()."index.php/user/wall?nickname=" . $auteur; ?>"><img src="<?php echo base_url()."assets/"; ?>dist/img/user1-128x128.jpg" width="40" height="40" class="img-circle" alt="User Image"></a>
                <span class="username"><a href="<?php echo base_url()."index.php/user/wall?nickname=" . $auteur; ?>"><?php echo $auteur; ?></a></span>
                <span class="description">Publié
                <?php
                  $diff_date = $post['diff_date'];
                  if($diff_date != "à l'instant")
                  {
                    echo "il y a " . $diff_date;
                  }
                  else {
                    echo $diff_date;
                  }
                ?></span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <?php
                if($_SESSION['nickname'] === $auteur)
                {
                  ?>
                  <button type="button" class="btn btn-box-tool btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-caret-down"></i></button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="<?php echo base_url() . "index.php/home/deletePost?iddoc=" . $post['iddoc']; ?>">Supprimer mon post</a></li>
                    </ul>
                  <?php
                }
                ?>

              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- post text -->
              <p>
                <?php echo $post['content']; ?>
              </p>

              <!-- Social sharing buttons -->
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
              <span class="pull-right text-muted">45 likes - 2 comments</span>
            </div>
            <!-- /.box-body -->
            <div class="box-footer box-comments">
              <div class="box-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="<?php echo base_url()."assets/"; ?>/dist/img/user3-128x128.jpg" alt="User Image">

                <div class="comment-text">
                      <span class="username">
                        Maria Gonzales
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span><!-- /.username -->
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
              <div class="box-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="<?php echo base_url()."assets/"; ?>/dist/img/user5-128x128.jpg" alt="User Image">

                <div class="comment-text">
                      <span class="username">
                        Nora Havisham
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span><!-- /.username -->
                  The point of using Lorem Ipsum is that it has a more-or-less
                  normal distribution of letters, as opposed to using
                  'Content here, content here', making it look like readable English.
                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
              <?php echo form_open('login/createComment') ?>
                <img class="img-responsive img-circle img-sm" src="<?php echo base_url()."assets/"; ?>/dist/img/user1-128x128.jpg" alt="Alt Text">
                <!-- .img-push is used to add margin to elements next to floating images -->
                <div class="img-push">
                  <input type="number" class="hide" name="iddoc" value="<?php echo $post['iddoc']; ?>"/>
                  <input class="form-control input-sm" name="comment" placeholder="Votre commentaire..." type="text">
                </div>
              </form>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
      </div>
        <?php
            }
        ?>
      </section>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
