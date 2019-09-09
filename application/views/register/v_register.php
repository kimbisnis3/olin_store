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
            <li class="active">Register</li>
          </ol>
        </div>
      </div>
    </div>
    
    <?php $this->load->view('_partials/foot.php'); ?>
  </body>
  <script>
  function login(kode) {
      $.ajax({
          url: `<?php echo base_url() ?>register/savedata`,
          type: "POST",
          dataType: "JSON",
          data: $('#form-data').serialize(),
          success: function(data) {
              if (data.sukses == 'success') {

                  showNotif('Sukses', 'Register Sukses', 'success')
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              console.log('gagal')
          }
      });
  }
  </script>
</html>