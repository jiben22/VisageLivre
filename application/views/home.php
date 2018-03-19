<?php
function showComment($post, $comments, $ids)
{
  foreach ($ids as $keyID => $iddoc) {
    ?>
    <div style="padding-left: <?php echo ($keyID%10)*2; ?>0px;">
    <?php
    foreach ($comments as $keyCOMM => $comment) {
      //Recover author of comment !
      $auteur = $comment['auteur'];
      if( $comment['idsup'] === $iddoc )
      {
        ?>
              <div class="box-comment">
                <!-- User image -->
                <?php
                if($auteur === $_SESSION['nickname'])
                {
                  ?>
                  <a href="<?php echo base_url()."index.php/user/profile"; ?>"><img src="
                  <?php echo base_url()."assets/dist/img/user1-128x128.jpg";
                }
                else{
                  ?>
                  <a href="<?php echo base_url()."index.php/friend/profile?nickname=" . $auteur; ?>"><img src="
                  <?php
                  echo base_url()."assets/dist/img/user8-128x128.jpg";
                }
                 echo "\""?> width="40" height="40" class="img-circle" alt="User Image"></a>

                <div class="comment-text">
                      <span class="username">
                        <a href="<?php echo base_url()."index.php/user/wall?nickname=" . $auteur; ?>">
                        <?php echo $comment['auteur']; ?>
                      </a>
                        <span class="text-muted pull-right"><?php echo $comment['diff_date']; ?></span>
                      </span>
                      <?php echo $comment['content'] . '</br>'; ?>

                      <div class="box-tools pull-right" style="margin-top: -25px; margin-bottom: 15px;">
                        <button id="write-comment_<?php echo $comment['iddoc']; ?>" type="button" class="write-comment btn btn-box-tool btn-flat dropdown-toggle"><i class="fa fa-edit"></i></button>
                        <?php
                        if($_SESSION['nickname'] === $auteur)
                        {
                          ?>
                          <a href="<?php echo base_url() . "index.php/home/deleteComment?iddoc=" . $comment['iddoc']; ?>">
                            <button type="button" class="btn btn-box-tool btn-flat dropdown-toggle"><i class="fa fa-trash"></i></button>
                          </a>
                          <?php
                        }
                        ?>
                      </div>
                      <!-- /.comment-text -->

                </div>

                <div class="box-footer write" id="write_<?php echo $comment['iddoc']; ?>" style="margin-top: 10px;">
                  <?php echo form_open('home/createComment'); ?>
                    <img class="img-responsive img-circle img-sm" src="<?php echo base_url()."assets/"; ?>/dist/img/user1-128x128.jpg" alt="Alt Text">
                    <!-- .img-push is used to add margin to elements next to floating images -->
                    <div class="img-push">
                      <input type="number" class="hide" name="iddoc" required="true" value="<?php echo $comment['iddoc']; ?>"/>
                      <input class="form-control input-sm" name="comment" placeholder="Votre commentaire..." type="text" required="true">
                      <button type="submit" name="submit" class="hide btn btn-default"></button>
                    </div>
                  <?php echo form_close(); ?>
                </div>
              </div>
              <!-- /.box-comment -->
        <?php
        //Remove this comment into list of comments
        unset($ids[$keyID]);
        unset($ids[$keyCOMM]);

        unset($comments[$keyCOMM]);

        $ids[] = $comment['iddoc'];
        showComment($post, $comments, $ids);
      }
    }
    ?>
    </div>
    <?php
  }
}
 ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Fil d'actualités
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Create post -->
      <section class="col-lg-offset-2 col-lg-6">
      <div class="box box-widget">
        <div class="box-header with-border">
          <div class="user-block">
            <a href="<?php echo base_url()."index.php/user/profile"; ?>"><img src="<?php echo base_url()."assets/"; ?>dist/img/user1-128x128.jpg" width="40" height="40" class="img-circle" alt="User Image"></a>
            <span class="username"><a href="<?php echo base_url()."index.php/user/wall?nickname=" . $_SESSION['nickname']; ?>"><?php echo $_SESSION['nickname'] ?></a></span>
          </div>
          <!-- /.user-block -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <!-- post text -->
          <?php echo form_open('home/createPost') ?>
          <div class="row">
            <div class="col-lg-12">
                  <div class="form-group">
                    <textarea placeholder="Exprimez-vous" class="form-control" rows="4" name="post" required="true" style="resize: none;"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-default">Publier</button>
            </div>
          </div>
          <?php echo form_close(); ?>
          <!-- /.box-footer -->
        </div>
      </div>
      </section>

      <section>
        <?php
          foreach($posts as $post) {
            $auteur = $post['auteur'];
        ?>
        <div class="row">
      <!-- Comments -->
        <div class="col-lg-offset-2 col-lg-6">
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <?php
                if($auteur === $_SESSION['nickname'])
                {
                  ?>
                  <a href="<?php echo base_url()."index.php/user/profile"; ?>"><img src="
                  <?php echo base_url()."assets/dist/img/user1-128x128.jpg";
                }
                else{
                  ?>
                  <a href="<?php echo base_url()."index.php/friend/profile?nickname=" . $auteur; ?>"><img src="
                  <?php
                  echo base_url()."assets/dist/img/user8-128x128.jpg";
                }
                 echo "\""; ?> width="40" height="40" class="img-circle" alt="User Image"></a>
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
              <span class="pull-right text-muted">
              <?php
              $number_comments = $post['number_comments'];
              if($number_comments > 1)
              {
                echo $number_comments . ' commentaires';
              }
              else {
                echo $number_comments . ' commentaire';
              }
              ?>
            </span>
            </div>
            <!-- /.box-body -->

              <?php
              if( isset($post['comments']) && count($post['comments']) !== 0 )
              {
                ?>
                <div class="box-footer box-comments">
                <?php
                $iddoc = $post['iddoc'];
                $comments = $post['comments'];
                $ids = array($iddoc);
                showComment($post, $comments, $ids);
                ?>
                </div>
                <?php
              }
              ?>

            <div class="box-footer">
              <?php echo form_open('home/createComment') ?>
                <img class="img-responsive img-circle img-sm" src="<?php echo base_url()."assets/"; ?>/dist/img/user1-128x128.jpg" alt="Alt Text">
                <!-- .img-push is used to add margin to elements next to floating images -->
                <div class="img-push">
                  <input type="number" class="hide" name="iddoc" value="<?php echo $post['iddoc']; ?>"/>
                  <input class="form-control input-sm" name="comment" placeholder="Votre commentaire..." type="text" required="true">
                  <button type="submit" name="submit" class="hide btn btn-default"></button>
                </div>
                <?php echo form_close(); ?>
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

  <script
  			  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  			  integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
  			  crossorigin="anonymous"></script>
  <script>
    $('.write').hide();
    $('.write-comment').click(function(){
      //if one open... hide all
      $('.write').hide();

      //Recover id of this post
      var $id_post = "";
      for(i = 14; i < this.id.length; i++)
      {
        $id_post += this.id[i];
      }
      $id_post = Number($id_post);

      //According attr visible of the div
      if( $('#write_' + $id_post).is(':visible') )
      {
          $('#write_' + $id_post).hide();
      }
      else {
        $('#write_' + $id_post).show();
      }
    });
  </script>
