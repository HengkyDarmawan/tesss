<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      <?= $this->session->flashdata('message'); ?>
        <div class="row mb-2">
          <div class="col-sm">
            <h1>Profile</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-8">
                    <h3 class="card-title">My Profile</h3>
                  </div>
                  <div class="col-4 text-right">
                    <a href="<?php echo base_url()?>index.php/admin/update" class="btn btn-outline-primary btn-sm">Update</a>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="card mb-3" style="max-width: 1080px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?php echo base_url('assets/img/') . $user['image'];?>" alt="User Image" width="200">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title text-bold mb-3">Nama : <?php echo $user['name']?></h5>
                                <p class="card-text">Email : <?php echo $user['email']?></p>
                                <p class="card-text">Alamat : <?php echo $user['alamat']?></p>
                                <p class="card-text">Nomor Telpon : <?php echo $user['hp']?></p>
                                <p class="card-text">Profesi: <?php echo $user['pekerjaan']?></p>
                                <p class="card-text"><small class="text-muted">Member Since <?php echo date ('d F Y', $user['date_created']); ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
