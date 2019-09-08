<!DOCTYPE html>
<html>
<?php $this->load->view('_partials/head.php'); ?>
<body class="fadeIn animated"> 
    <?php $this->load->view('_partials/topbar.php'); ?>
    <!-- <div class="breadcrumbs" style="margin-bottom: 25px !important;">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url() ?>">Home</a></li>
                    <li class="active">Billing</li>
                </ol>
            </div>
        </div>
    </div> -->
    <div class="container" style="margin-top: 25px !important">
        <div class="ckeck-top heading">
            <h2>Billing</h2>
        </div>
    </div>
	<div class="konten"> 
		<div class="container step-1">
			<div class="row" style="margin-bottom: 20px !important;">
                <div class="col-md-3">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="col-md-3">
                    <label for="">Layanan</label>
                    <select name="ref_layanan" class="form-control">
                        <option value=""></option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="">Alamat</label>
                    <input type="text" class="form-control" name="alamat">
                </div>
                <div class="col-md-3">
                    <label for="">Telp</label>
                    <input type="text" class="form-control" name="telp">
                </div>
            </div>
        </div>
        <div class="container step-2">
			<div class="row">
                <div class="col-md-3">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="col-md-3">
                    <label for="">Layanan</label>
                    <input type="text" class="form-control" name="ref_layanan">
                </div>
                <div class="col-md-3">
                    <label for="">Alamat</label>
                    <input type="text" class="form-control" name="alamat">
                </div>
                <div class="col-md-3">
                    <label for="">Telp</label>
                    <input type="text" class="form-control" name="telp">
                </div>
            </div>
        </div>
        <div class="containter btn-step">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-md btn-success btn-flat" onclick="tostep()">Lanjut</button>
                </div>
            </div>
        </div>
        
	</div>
	<?php $this->load->view('_partials/foot.php'); ?>
</body>

<script>
    $(document).ready(function() {
        select2()
    })

    function fromstep(step){
        $(`.step-${step}`).hide()
    }
</script>

</html>