<div class="content-wrapper">
<div class="box">
  <div class="info-box" style="margin: 20px 50px 30px 10px; padding-bottom: 52px;">
    <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Nombre d'amis</span>
      <span class="info-box-number"><?php echo $_SESSION['number_friends']; ?></span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->
  <?php
  if ($_SESSION['number_friends'] > 0) {
      ?>
              <div class="box-header">
              <h3 class="box-title">Liste des amis</h3>
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
                  foreach ($friends as $key => $friend) {
                      $nickname = $friends[$key]['nickname'];
                      if ($count%2 == 0) {
                          ?>
                        <tr role="row" class="odd">
                          <td class="sorting_1 col-lg-1"><a href="<?php echo base_url(). "index.php/friend/profile?nickname=" . $nickname; ?>"><?php echo $nickname; ?></a></td>
                        <?php
                      } else {
                          ?>
                      <tr role="row" class="even">
                        <td class="sorting_1 col-lg-1"><?php echo $nickname; ?></td>
                      <?php
                      } ?>
                    <td class="col-lg-4">
                        <a href="<?php echo base_url(). "index.php/friend/deleteFriendship?nickname=" . $nickname; ?>" class="btn btn-danger btn-block" style="width: 240px;"><b>Supprimer la relation d'amitié</b></a>
                    <?php
                  }
                   ?>
              </table>
            </div>
            <?php
          }
          ?>
          </div>
</div>
