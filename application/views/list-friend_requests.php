<div class="content-wrapper">
<div class="box">
              <div class="box-header">
              <h3 class="box-title">Liste des demandes d'amitié</h3>
            </div>

            <div class="info-box" style="margin: 20px 50px 30px 10px;">
              <span class="info-box-icon bg-aqua"><i class="fa fa-user-plus"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Demande d'amitiés</span>
                <span class="info-box-number"><?php echo $_SESSION['number_friendRequests']; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

            <?php
            if ($_SESSION['number_friendRequests'] > 0) {
                ?>
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
                foreach ($friendRequests as $key => $friendRequest) {
                    $nickname = $friendRequest->nickname;
                    if ($count%2 == 0) {
                        ?>
                          <tr role="row" class="odd">
                            <td class="sorting_1 col-lg-1"><a href="<?php echo base_url(). "index.php/friend/profile?nickname=" . $nickname; ?>"><?php echo $nickname; ?></a></td>
                          <?php
                    } else {
                        ?>
                        <tr role="row" class="even">
                          <td class="sorting_1 col-lg-1"><a href="<?php echo base_url(). "index.php/friend/profile?nickname=" . $nickname; ?>"><?php echo $nickname; ?></a></td>
                        <?php
                    } ?>
                      <td class="col-lg-4">
                        <a href="<?php echo base_url(). "index.php/friend/acceptRequest?nickname=" . $nickname; ?>" class="btn btn-primary btn-block col-lg-1" style="width: 240px;"><b>Accepter la demande d'amitié</b></a>
                        <a href="<?php echo base_url(). "index.php/friend/deleteRequest?nickname=" . $nickname; ?>" class="btn btn-primary btn-block col-lg-1" style="width: 240px; margin-left: 10px; bottom: 5px;"><b>Refuser la demande d'amitié</b></a>
                      </td>
                      <?php
                } ?>
                </table>
              </div>
              <?php
            }
            ?>

  </div>
</div>
