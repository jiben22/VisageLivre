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
      <div class="row post">
        <div class="col-lg-offset-2 col-lg-6">
          <?php //echo validations_errors(); ?>
          <?php //echo $post ?>
          <?php echo form_open('home/createPost') ?>
              <div class="form-group">
                <textarea placeholder="Écrivez un commentaire..." class="form-control" rows="5" id="post"></textarea>
                <button type="submit" class="btn btn-default">Publier</button>
            </div> 
          
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->