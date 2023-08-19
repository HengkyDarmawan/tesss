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
                    <?= form_open_multipart('index.php/profile/update');?>
                        <input type="hidden" name="id" value="<?php echo $user['id'];?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="input email" value="<?php echo $user['email'];?>" readonly>
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="input nama" value="<?php echo $user['name'];?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="3"><?php echo $user['alamat'];?></textarea>
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="hp">Nomor Telepon</label>
                                <input type="text" class="form-control" id="hp" name="hp" placeholder="input hp" value="<?php echo $user['hp'];?>">
                                <?= form_error('hp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan">Profesi</label>
                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="input pekerjaan" value="<?php echo $user['pekerjaan'];?>">
                                <?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="image">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                                <br>
                                <img src="<?php echo base_url('assets/img/') . $user['image']?>" alt="image" class="img-thumbnail" width="200">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" name="update" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
  </div>
  <!-- /.content-wrapper -->

