<div class="register-box">

  <div class="card">
    <div class="card-body register-card-body">
      <h4 class="login-box-msg text-bold">Register Webinar</h4>

      <form action="<?php echo base_url()?>index.php/auth/registration" method="post">
        <div class="mb-3">
          <div class="input-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Full name" value="<?php echo set_value('name')?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <?php echo form_error('name', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="mb-3">
          <div class="input-group">
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo set_value('email')?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="mb-3">
          <div class="input-group">
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" value="<?php echo set_value('alamat')?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <?php echo form_error('alamat', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="mb-3">
          <div class="input-group">
            <input type="text" class="form-control" id="hp" name="hp" placeholder="hp" value="<?php echo set_value('hp')?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <?php echo form_error('hp', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="mb-3">
          <div class="input-group">
            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="pekerjaan" value="<?php echo set_value('pekerjaan')?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <?php echo form_error('pekerjaan', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="mb-3">
          <div class="input-group">
            <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <?php echo form_error('password1', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="mb-3">
          <div class="input-group">
            <input type="password" class="form-control" id="password2" name="password2" placeholder="Retype password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <?php echo form_error('password2', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col">
            <button type="submit" class="btn btn-outline-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="<?php echo base_url()?>index.php/auth" class="btn btn-block btn-primary">
          Already have an account? Login!
        </a>
      </div>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
