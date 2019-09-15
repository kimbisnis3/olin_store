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
                    <li class="active">Custom</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="konten">
        <div class="container">
            <iframe src="<?php echo prep_url('http://demo.gongsoft.com/plugin/customdesign/editor.php?product=10') ?>" height="600px" width="100%" style="margin-top : 25px !important;"></iframe>
        </div>
    </div>
    <?php $this->load->view('_partials/foot.php'); ?>
</body>
<script>
    
</script>
</html>