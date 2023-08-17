<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm">
            <h1><?php echo $title?></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- left column -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title"><?php echo $title?></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $dafWebinar['id_daftar_webinar']?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="tema">Tema</label>
                            <input type="text" class="form-control" id="tema" name="tema" placeholder="input tema" value="<?php echo $dafWebinar['tema']?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="input name" value="<?php echo $user['name'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="input email" value="<?php echo $user['email'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="bukti">Link Bukti Absensi</label>
                            <input type="text" class="form-control" id="bukti" name="bukti" placeholder="input bukti">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" name="absen" class="btn btn-primary">Absen</button>
                    </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
  </div>
  <!-- /.content-wrapper -->

