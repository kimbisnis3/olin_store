<!DOCTYPE html>
<html>
<?php $this->load->view('_partials/head.php'); ?>
<style type="text/css">
	.img-option {
        height: 40vh !important;
    }
    .img-slide {
        height: 60vh !important;
    }
</style>
<body class="fadeIn animated"> 
	<?php $this->load->view('_partials/topbar.php'); ?>
	<div class="bnr" id="home">
		<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider4">
            <?php foreach ($slide as $i => $v): ?>
			<li>
				<img class="img-slide" onerror="imgError(this)" src="<?php echo prep_url(api_url()).$v->image ?>" alt=""/>
			</li>
            <?php endforeach; ?>
			    
			</ul>
		</div>
		<div class="clearfix"> </div>
	</div>
	<script src="<?php echo base_url() ?>assets/js/responsiveslides.min.js"></script>
	<script>
	$(function() {
	    $("#slider4").responsiveSlides({
	        auto: true,
	        pager: true,
	        nav: true,
	        speed: 500,
	        namespace: "callbacks",
	        before: function() {
	            $('.events').append("<li>before event fired.</li>");
	        },
	        after: function() {
	            $('.events').append("<li>after event fired.</li>");
	        }
	    });
	});
	</script>
	<div class="about"> 
		<div class="container">
			<div class="about-top grid-1">
				<div class="col-md-2 about-left">
				</div>
				<div class="col-md-4 about-left">
					<a href="<?php echo base_url() ?>product">
						<figure class="effect-bubba">
							<img class="img-responsive img-option" src="<?php echo prep_url(api_url()).$gd1->image ?>" alt=""/>
							<figcaption>
								<h2>Produk</h2>
								<p>Daftar produk-produk terbaik dari kami</p>	
							</figcaption>			
						</figure>
					</a>
				</div>
				<div class="col-md-4 about-left">
					<a href="<?php echo base_url() ?>custom">
						<figure class="effect-bubba">
							<img class="img-responsive img-option" src="<?php echo prep_url(api_url()).$gd2->image ?>" alt=""/>
							<figcaption>
								<h4>Produk Custom</h4>
								<p>Rancang sendiri design produk sesuai keinginan anda</p>	
							</figcaption>			
						</figure>
					</a>
				</div>
				<div class="col-md-2 about-left">
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="product"> 
		<div class="container">
			<div class="product-top">
				<div class="product-one">
					<?php foreach ($produk as $i => $v): ?>
					<div class="col-md-3 product-left p-left" style="margin-bottom : 50px !important;">
                            <div class="product-main simpleCart_shelfItem">
                                <a href="<?php echo base_url() ?>product/detail?q=<?php echo $v->kodebarang ?>" class="mask"><img onerror='imgError(this)' class="img-responsive zoom-img img-item" src="<?php echo prep_url(api_url()).$v->gambardesign ?>" alt="" /></a>
                                <div class="product-bottom">
                                    <h3><?php echo $v->namabarang ?></h3>
                                    <p>Explore Now</p>
								 	<h4 class="pointer"><a href="<?php echo base_url() ?>product/detail?q=<?php echo $v->kodebarang ?>" class="item_add"><i></i></a> <span class=" item_price">Rp. <?php echo number_format($v->harga) ?></span></h4>
                                </div>
                            </div>
                        </div>
					<?php endforeach ?>
					<div class="clearfix"></div>
				</div>	
				<div class="product-one">
					<div class="col-md-3 product-left">
						
					</div>
					<div class="clearfix"></div>
				</div>				
			</div>
		</div>
	</div>
	<?php $this->load->view('_partials/foot.php'); ?>
</body>
</html>