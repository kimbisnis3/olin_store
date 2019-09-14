<?php 
	$title = $this->db->get_where('tconfigtext', array('tipe' => 'eltitle'))->row();
 ?>
<div class="top-header">
	<div class="container">
		<div class="top-header-main">
			<div class="col-md-6 top-header-left">
			</div>
			<div class="col-md-6 top-header-left">
				<div class="cart box_1">
					<a href="<?php echo base_url() ?>cart">
						<div class="total">
							<span class="total_items">0</span>
						</div>
						<img src="<?php echo base_url() ?>assets/images/cart-1.png" alt="" />
					</a>
					<!-- <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p> -->
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<div class="logo">
	<a href="<?php echo base_url() ?>">
		<h1 class="hue"><?php echo $title->teks; ?></h1>
	</a>
</div>
<div class="header-bottom">
	<div class="container">
		<div class="header">
			<div class="col-md-10 header-left">
				<div class="top-nav">
					<ul class="memenu skyblue">
						<li class="grid menu-home"><a href="<?php echo base_url()?>">Home</a></li>
						<li class="grid menu-produk"><a href="<?php echo base_url()?>product">Produk</a></li>
						<li class="grid menu-custom"><a href="<?php echo base_url()?>custom">Custom</a></li>
						<li class="grid menu-profil"><a href="<?php echo base_url()?>profil">Profile</a></li>
						<li class="grid menu-kontak"><a href="<?php echo base_url()?>kontak">Contact</a></li>
						
						<?php
							if ($this->session->userdata('in') == TRUE) {
								echo '
								<li class="grid menu-member">
								<a href="#">Member</a>
									<div class="mepanel">
										<div class="row">
											<div class="col1 me-one"><h4>Member</h4>
												<ul>
													<li><a href="'.base_url().'history">Pesanan</a></li>
													<li><a href="'.base_url().'payment">Pembayaran</a></li>
													<li><a href="'.base_url().'login/logout">Sign Out</a></li>
												</ul>
											</div>
										</div>
									</div>
								</li>';
							} else {
								echo '<li class="grid menu-sign pointer"><a onclick="login_modal()">Sign In</a></li>';
							}
						?>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-2 header-right">
				<div class="top-nav">
					<ul class="memenu skyblue">
						<!-- <li class="grid"><a href="<?php echo base_url()?>kontak"><i class="fa fa-shopping-cart"></i> Cart</a></li> -->
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--bottom-header-->