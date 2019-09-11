<!DOCTYPE html>
<html>
  <?php $this->load->view('_partials/head.php'); ?>
  <style>
    .center-pos {
      max-width: 25%;
      margin: 35px auto;
    }
    .kotak {
      background-color: magenta !important;
    }
  </style>
  <body class="fadeIn animated">
    <?php $this->load->view('_partials/topbar.php'); ?>
    <div class="breadcrumbs">
      <div class="container">
        <div class="breadcrumbs-main">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>">Home</a></li>
            <li class="active">Login</li>
          </ol>
        </div>
      </div>
    </div>
    <!-- <div class="konten">
    <div class="center-pos container">
          <form id="form-data">
            <div class="row">
              
            </div>
            <div class="row">
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="pass">
              </div>
            </div>
          </form>
        <div class="row">
          <button class="btn btn-hijau btn-lg btn-flat btn-block" id="btn-sign-in" onclick="login()"><i class="fa fa-sign-in"></i> Sign In</button>
        </div>
        <div class="row">
          <p>Belum Punya Akun ? <span onclick="open_modal()">Daftar</span></p>
        </div>
      </div>
    </div> -->
    <?php $this->load->view('_partials/foot.php'); ?>
  </body>
  
  <script>
    
	</script>
</html>