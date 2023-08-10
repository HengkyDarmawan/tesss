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
                    <input type="hidden" name="id" value="<?= $webinar['id']; ?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Pembicara</label>
                            <select class="form-control" name="pembicara_id">
                                <option value="">Select Pembicara</option>
                                <?php foreach ($pembicara as $pembicara) : ?>
                                    <!-- <option value="<?= $pembicara['id']; ?>"><?= $pembicara['nama_pembicara']; ?></option> -->
                                    <option value="<?= $pembicara['id']; ?>" <?= $pembicara['id'] == $webinar['pembicara_id'] ? "selected" : null ?>><?= $pembicara['nama_pembicara']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tema">Tema</label>
                            <input type="text" class="form-control" id="tema" tema="tema" placeholder="input nama" value="<?php echo $webinar['tema'];?>">
                            <?= form_error('tema', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="tipe">Tipe</label>
                            <input type="text" class="form-control" id="tipe" name="tipe" placeholder="input tipe" value="<?php echo $webinar['tipe'];?>">
                            <?= form_error('tipe', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="3"><?php echo $webinar['alamat'];?></textarea>
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="hp">Hp</label>
                            <input type="text" class="form-control" id="hp" name="hp" placeholder="input hp" value="<?php echo $webinar['hp'];?>">
                            <?= form_error('hp', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="input pekerjaan" value="<?php echo $webinar['pekerjaan'];?>">
                            <?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
  </div>
  <!-- /.content-wrapper -->

