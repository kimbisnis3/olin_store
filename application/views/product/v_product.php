<!DOCTYPE html>
<html>
<?php $this->load->view('_partials/head.php'); ?>

<body class="fadeIn animated">
    <?php $this->load->view('_partials/topbar.php'); ?>
    <!--start-breadcrumbs-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url() ?>">Home</a></li>
                    <li class="active">Products</li>
                </ol>
            </div>
        </div>
    </div>
    <!--end-breadcrumbs-->
    <!--prdt-starts-->
    <div class="prdt">
        <div class="container">
            <div class="ckeck-top heading">
                <h2>PRODUCTS</h2>
            </div>
            <div class="prdt-top">
                <div class="col-md-12 prdt-left">
                    <div class="product-one">
                    <?php foreach ($product as $i => $v): ?>
                        <div class="col-md-3 product-left p-left" style="margin-bottom : 50px !important;">
                            <div class="product-main simpleCart_shelfItem">
                                <a href="<?php echo base_url() ?>product/<?php echo $v->kodebarang ?>" class="mask"><img class="img-responsive zoom-img" src="<?php echo prep_url(api_url()).'/uploads/img1.png' ?>" alt="" /></a>
                                <div class="product-bottom">
                                    <h3><?php echo $v->namabarang ?></h3>
                                    <p>Explore Now</p>
                                    <h4 class="pointer" onclick="add_cart('<?php echo $v->kodebarang ?>')"><a class="item_add"><i></i></a> <span class=" item_price">Rp. <?php echo number_format($v->harga) ?></span></h4>
                                </div>
                                <!-- <div class="srch srch1">
                                    <span>-50%</span>
                                </div> -->
                            </div>
                        </div>
                    <?php endforeach; ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--product-end-->
    <?php $this->load->view('_partials/foot.php'); ?>
</body>
<script>
    function add_cart(kode) {
        // console.log(kode)
        $.ajax({
          url: `<?php echo base_url() ?>cart/add`,
          type: "POST",
          dataType: "JSON",
          data: {
              kode: kode,
          },
          success: function(data) {
              console.log('sukses')
              total_items(data.total_items)
          },
          error: function(jqXHR, textStatus, errorThrown) {
                console.log('gagal')
          }
      });
    }
</script>
</html>