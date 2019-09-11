<!DOCTYPE html>
<html>
  <?php $this->load->view('_partials/head.php'); ?>
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
    <div class="konten">

    </div>
    <?php $this->load->view('_partials/foot.php'); ?>
  </body>
  <script>
    function login(kode) {
      $('[name="user"]').prop('disabled', true)
      $('[name="pass"]').prop('disabled', true)
      $.ajax({
        url: `<?php echo base_url() ?>login/auth_process`,
        type: "POST",
        dataType: "JSON",
        data: $('#form-data').serialize(),
        success: function (data) {
          if (data.sukses == 'success') {
            showNotif('Sukses', 'Login Sukses', 'success')
            $('[name="user"]').prop('disabled', false)
            $('[name="pass"]').prop('disabled', false)
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log('gagal')
          $('[name="user"]').prop('disabled', false)
          $('[name="pass"]').prop('disabled', false)
        }
      });
    }
	</script>
</html>