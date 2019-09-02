<!DOCTYPE html>
<html>
<?php $this->load->view('_partials/head.php'); ?>
<body> 
	<?php $this->load->view('_partials/topbar.php'); ?>
	<div class="konten"> 
		<div class="container">
			<div class="row">
                <div class="col-md-3">
                    <label for="">Provinsi</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="">Kota</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="">Ongkir</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="">Ongkir</label>
                    <input type="text" class="form-control">
                </div>
            </div>
		</div>
	</div>
	<?php $this->load->view('_partials/foot.php'); ?>
</body>
</html>