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
                    <li class="active">Products</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="single contact">
		<div class="container">
			<div class="single-main">
				<div class="col-md-12 single-main-left">
				<div class="sngl-top">
					<div class="col-md-5 single-top-left">	
						<div class="flexslider">
							  <ul class="slides">
								<li data-thumb="<?php echo prep_url(api_url()).$pr->gambardesign ?>">
									<div class="thumb-image"> <img onerror="imgError(this)" src="<?php echo prep_url(api_url()).$pr->gambardesign ?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
								</li>
							  </ul>
						</div>
						<!-- FlexSlider -->

						<script>
						// Can also be used with $(document).ready()
						$(window).load(function() {
						  $('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						  });
						});
						</script>
					</div>	
					<div class="col-md-7 single-top-right">
						<div class="single-para simpleCart_shelfItem">
						<h2><?php echo $pr->namabarang ?></h2>
							<div class="star-on">
								<ul class="star-footer">
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
								</ul>
							<div class="clearfix"> </div>
							</div>
							
							<h5 class="item_price">Rp. <?php echo number_format($pr->harga) ?></h5>
							<p>Keterangan : <?php echo $pr->ketbarang ?></p>
							<p>Warna : <?php echo $pr->warna ?></p>
							
							<!-- <ul class="tag-men">
								<li><span>TAG</span>
								<span class="women1">: Women,</span></li>
								<li><span>SKU</span>
								<span class="women1">: CK09</span></li>
							</ul> -->
							<a type="button" class="add-cart item_add pointer" onclick="add_cart('<?php echo $pr->kodebarang ?>')"><i class="fa fa-shopping-cart"></i> ADD TO CART</a>
							
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="latestproducts">
					<div class="product-one">
					<?php foreach ($pr_latest as $i => $v): ?>
						<div class="col-md-4 product-left p-left"> 
							<div class="product-main simpleCart_shelfItem">
								<a href="<?php echo base_url() ?>product/detail?q=<?php echo $v->kodebarang ?>" class="mask"><img onerror='imgError(this)'  class="img-responsive zoom-img" src="<?php echo prep_url(api_url()).$v->gambardesign ?>" alt="" /></a>
								<div class="product-bottom">
									<h3><?php echo $v->namabarang ?></h3>
									<p>Explore Now</p>
									<h4 class="pointer" onclick="add_cart('<?php echo $v->kodebarang ?>')"><a class="item_add"><i></i></a> <span class=" item_price">Rp. <?php echo number_format($v->harga) ?></span></h4>
								</div>
								<!-- <div class="srch">
									<span>-50%</span>
								</div> -->
							</div>
						</div>
					<?php endforeach; ?>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
    <?php $this->load->view('_partials/foot.php'); ?>
</body>
<script>
    function add_cart(kode) {
        $.ajax({
          url: `<?php echo base_url() ?>cart/add`,
          type: "POST",
          dataType: "JSON",
          data: {
              kode: kode,
          },
          success: function(data) {
            if (data.sukses == 'success') {
              total_items(data.total_items)
              showNotif('Sukses', 'Produk Ditambahkan Ke Keranjang', 'success')
            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
                console.log('gagal')
          }
      });
    }

</script>
</html>