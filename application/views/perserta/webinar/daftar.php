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
                <div class="card card-success">
                    <div class="card-header">
                    <h3 class="card-title"><?php echo $title?></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $webinar['id_webinar']?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="tema">Tema</label>
                            <input type="text" class="form-control" id="tema" name="tema" placeholder="input tema" value="<?php echo $webinar['tema']?>" readonly>
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
                            <label for="bukti">Link Bukti Pembayaran (jika gratis tulis gratis)</label>
                            <input type="text" class="form-control" id="bukti" name="link_pembayaran" placeholder="input Bukti pembayaran">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" name="daftar" class="btn btn-success">Daftar</button>
                    </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
  </div>
  <!-- /.content-wrapper -->

