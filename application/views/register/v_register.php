<!DOCTYPE html>
<html>
  <?php $this->load->view('_partials/head.php'); ?>
  <style>
    .box-input {
      max-width: 40%;
      margin: 35px auto;
      border : 2px solid #53e074 !important; 
      padding : 30px;
      border-radius: 16px;
    }
    

    .box-button {
      max-width: 40%;
      margin: 35px auto;
      /* border : 2px solid #53e074 !important;  */
      padding : 30px;
      border-radius: 16px;
    }

    .neon {
      /* background: #f35626; */
      border : 2px solid #53e074 !important; 
      /* background-image: linear-gradient(92deg, #f35626 0%,#feab3a 100%);  */
      /* -webkit-background-clip: text; */
              /* background-clip: text; */
      /* -webkit-text-fill-color: transparent;  */
      animation: hue 20s infinite linear;
    }

    @keyframes neon {
        from {
          filter: hue-rotate(0deg);
        }
        
        to {
          filter: hue-rotate(-360deg);
        }
      }
  </style>
  <body class="fadeIn animated">
    <?php $this->load->view('_partials/topbar.php'); ?>
    <div class="breadcrumbs">
      <div class="container">
        <div class="breadcrumbs-main">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>">Home</a></li>
            <li class="active">Register</li>
          </ol>
        </div>
      </div>
    </div>
    <div class="konten">
      <div class="box-button container">
        <div class="row">
          <div class="col-md-6">
            <button class="btn btn-biru btn-lg btn-block" id="btn-sign-up" onclick="open_cust()"><i class="fa fa-user"></i> Customer</button>
          </div>
          <div class="col-md-6">
            <button class="btn btn-teal btn-lg btn-block" id="btn-sign-up" onclick="open_reseller()"><i class="fa fa-users"></i> Reseller</button>
          </div>
        </div>
      </div>
    </div>
    <div class="x">
      <div class="box-input container neon box-reseller">
      <div class="row">
        <div class="col-md-12">
          <div class="pull-right">
            <h4 class="text-hijau"><i class="fa fa-users"></i> Reseller</h4>
          </div>
        </div>
      </div>
        <form id="form-data">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Telp</label>
                <input type="text" class="form-control" name="telp">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="user">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="pass">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Re-type Password</label>
                <input type="password" class="form-control" name="typepass">
              </div>
            </div>
          </div>
        </form>
        <div class="row">
          <div class="col-md-12">
            <button class="btn btn-hijau btn-md btn-block" id="btn-sign-up" onclick="register_cust()"><i
                class="fa fa-sign-in"></i> Register</button>
          </div>
        </div>
      </div>

      <div class="box-input container neon box-customer">
      <div class="row">
        <div class="col-md-12">
          <div class="pull-right">
            <h4 class="text-hijau"><i class="fa fa-user"></i> Customer</h4>
          </div>
        </div>
      </div>
        <form id="form-data">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Telp</label>
                <input type="text" class="form-control" name="telp">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="user">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="pass">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Re-type Password</label>
                <input type="password" class="form-control" name="typepass">
              </div>
            </div>
          </div>
        </form>
        <div class="row">
          <div class="col-md-12">
            <button class="btn btn-hijau btn-md btn-block" id="btn-sign-up" onclick="register_cust()"><i
                class="fa fa-sign-in"></i> Register</button>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view('_partials/foot.php'); ?>
  </body>
  
  <script>

    $(document).ready(function(){
      $('.box-reseller').hide()
      $('.box-customer').hide()
    })

    function open_reseller() {
      $('.box-reseller').show()
      $('.box-customer').hide()
    }

    function open_cust() {
      $('.box-reseller').hide()
      $('.box-customer').show()
    }


    function register_cust() {
      $('.form-control').prop('disabled', true)
      btnproc('#btn-sign-up', 1)
      $.ajax({
        url: `<?php echo base_url() ?>register/customer`,
        type: "POST",
        dataType: "JSON",
        data: $('#form-register').serialize(),
        success: function (data) {
          if (data.status == 'success') {
            showNotif(data.caption, data.msg, data.class)
            $('.form-control').prop('disabled', false)
            btnproc('#btn-sign-up', 0)
            location.href = "<?php echo base_url() ?>";
          } else {
            showNotif(data.caption, data.msg, data.class)
            $('.form-control').prop('disabled', false)
            btnproc('#btn-sign-up', 0)
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          $('.form-control').prop('disabled', false)
          btnproc('#btn-sign-up', 0)
        }
      });
    }

    function register_reseller() {
      $('.form-control').prop('disabled', true)
      btnproc('#btn-sign-up', 1)
      $.ajax({
        url: `<?php echo base_url() ?>register/reseller`,
        type: "POST",
        dataType: "JSON",
        data: $('#form-register').serialize(),
        success: function (data) {
          if (data.status == 'success') {
            showNotif(data.caption, data.msg, data.class)
            $('.form-control').prop('disabled', false)
            btnproc('#btn-sign-up', 0)
            location.href = "<?php echo base_url() ?>";
          } else {
            showNotif(data.caption, data.msg, data.class)
            $('.form-control').prop('disabled', false)
            btnproc('#btn-sign-up', 0)
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          $('.form-control').prop('disabled', false)
          btnproc('#btn-sign-up', 0)
        }
      });
    }
	</script>
</html>