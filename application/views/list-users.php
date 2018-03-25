<div class="content-wrapper">
<div class="box">
  <div class="info-box" style="margin: 20px 50px 30px 10px; padding-bottom: 52px;">
    <span class="info-box-icon bg-blue"><i class="fa fa-users"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Nombre d'utilisateurs</span>
      <span class="info-box-number"><?php echo $number_users; ?></span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->
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
                      if (isset($user['isEligibleForRequest']) && $user['isEligibleForRequest'] === true) {
                          ?>
                        <a href="<?php echo base_url(). "index.php/friend/request?nickname=" . $user['nickname']?>" class="btn btn-primary btn-block" style="width: 240px;"><b>Envoyer une demande d'amitié</b></a>
                        <?php
                      } elseif (isset($user['isEligibleForDeleteFriendship']) && ($user['isEligibleForDeleteFriendship'] === true)) {
                          ?>
                        <a href="<?php echo base_url(). "index.php/friend/deleteFriendship?nickname=" . $user['nickname']?>" class="btn btn-danger btn-block" style="width: 240px;"><b>Supprimer la relation d'amitié</b></a>
                        <?php
                      } else {
                          ?>
                        <span class="btn btn-primary btn-block disabled" style="width: 240px;"><b>Demande d'amitié en attente</b></span>
                        <?php
                      } ?>
                    </td>
                    <?php
                  }
                   ?>
              </table>
            </div>
</div>
</div>
