<!--information-starts-->
<?php 
	$desc  	= $this->db->get_where('tconfigtext', array('tipe' => 'elfoot_ket'))->row();
	$hp  	= $this->db->get_where('tconfigtext', array('tipe' => 'elfoot_hp'))->row();
	$email  = $this->db->get_where('tconfigtext', array('tipe' => 'elfoot_email'))->row();
	$fb  	= $this->db->get_where('tconfigtext', array('tipe' => 'socmed_fb'))->row();
	$tw  	= $this->db->get_where('tconfigtext', array('tipe' => 'socmed_tw'))->row();
	$go  	= $this->db->get_where('tconfigtext', array('tipe' => 'socmed_go'))->row();
 ?>
 <style type="text/css">
 	.link-foot {
 		color: #999 !important;
 	}
 </style>
<div class="information">
		<div class="container">
			<div class="infor-top">
				<div class="col-md-3 infor-left">
					<h3>Follow Us</h3>
					<ul>
						<li><a href="<?php echo prep_url($fb->link) ?>"><span class="fb"></span><h6>Facebook</h6></a></li>
						<li><a href="<?php echo prep_url($tw->link) ?>"><span class="twit"></span><h6>Twitter</h6></a></li>
						<li><a href="<?php echo prep_url($go->link) ?>"><span class="google"></span><h6>Google+</h6></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>Information</h3>
					<ul class="link-foot">
						<li><a class="link-foot" href="<?php echo base_url()?>">Home</a></li>
						<li><a class="link-foot" href="<?php echo base_url()?>product">Produk</a></li>
						<li><a class="link-foot" href="<?php echo base_url()?>custom">Custom</a></li>
						<li><a class="link-foot" href="<?php echo base_url()?>aboutus">About Us</a></li>
						<li><a class="link-foot" href="<?php echo base_url()?>contactus">Contact</a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>My Account</h3>
					<ul>
						<?php if ($this->session->userdata('in') == TRUE): ?>
							<li><a class="link-foot" href="<?php echo base_url() ?>order">Pesanan</a></li>
							<li><a class="link-foot" href="<?php echo base_url() ?>payment">Pembayaran</a></li>
							<li><a class="link-foot" href="<?php echo base_url() ?>login/logout">Sign Out</a></li>
						<?php else: ?>
							<li><a class="link-foot pointer" onclick="login_modal()">Login</a></li>
							<li><a class="link-foot" href="<?php echo base_url() ?>register">Register</a></li>
						<?php endif ?>
						
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>Store Information</h3>
					<h4><?php echo $desc->teks; ?></h4>
					<h5><?php echo $hp->teks; ?></h5>	
					<p><a href="mailto:example@email.com"><?php echo $email->teks; ?></a></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<input type="hidden" id="sess_in" value="<?php echo $this->session->userdata('in')?>">
	<div class="modal fade" id="modal-data" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header no-border">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-hijau label-login">Masuk</h4>
        </div>
        <div class="modal-body">
          <div class="box-body pad">
            <form id="form-login">
              <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="user">
                </div>
                <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="pass">
              </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <div class="row" style="margin-bottom : 10px ;!important">
            <div class="col-md-12">
              <button class="btn btn-hijau btn-md btn-block" id="btn-sign-in"><i class="fa fa-sign-in"></i> Sign In</button>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12" style="text-align: center !important">
              Belum punya akun ? <span class="text-hijau"><a href="<?php echo base_url() ?>register">Daftar</a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>	
<script>
	total_items(<?php echo $this->cart->total_items() ?>)
	menuaktif('<?php echo $menuaktif ?>')
	
	function total_items(x) {
		$('.total_items').html(x);
	}

	function menuaktif(menu) {
		$(`.menu-${menu}`).addClass('active');
	}

    function total_cart(x)
    {
        $('.total-cart').html(`Rp.${numeral(x).format('0,0')}`)
    }

    function total_biaya(x)
    {
        $('.total-biaya').html(`Rp.${numeral(x).format('0,0')}`)
    }

	function select2() {
	    $('.select2').select2({
	        placeholder: 'Select an option',
	        allowClear: true
	    });
	}

	function showNotif(title, msg, jenis) {
	    $.notify({
	        title: '<strong>' + title + '</strong>',
	        message: msg
	    }, {
	        type: jenis,
	        z_index: 2000,
	        allow_dismiss: true,
	        delay: 10,
	        animate: {
	            enter: 'animated bounceIn',
				exit: 'animated zoomOut'
	        },
	    }, );
	}

	function showimage(url) {
	    return `<img class="img-responsive" onerror="this.onerror=null; this.src='assets/noimage.png'" style="max-width : 60px;" src="<?php echo prep_url(api_url()) ?>${url}" >`
	}

	function imgError(image) {
	    image.onerror = "";
	    image.src = `<?php echo base_url() ?>assets/noimage.png`;
	    return true;
	}

	function login() {
		// if ($('[name="user"]').val() == '' || $('[name="user"]').val() == null) {
		// 	$('[name="user"]').focus()
		// 	showNotif('Perhatian', 'Lengkapi Data', 'warning')
		// 	return false
		// }
		// if ($('[name="pass"]').val() == '' || $('[name="pass"]').val() == null) {
		// 	$('[name="pass"]').focus()
		// 	showNotif('Perhatian', 'Lengkapi Data', 'warning')
		// 	return false
		// }
		$('[name="user"]').prop('readonly', true)
		$('[name="pass"]').prop('readonly', true)
		btnproc('#btn-sign-in', 1)
		$.ajax({
			url: `<?php echo base_url() ?>login/auth_process`,
			type: "POST",
			dataType: "JSON",
			data: $('#form-login').serialize(),
			success: function (data) {
				if (data.status == 'success') {
					showNotif(data.caption, data.msg, data.class)
					$('[name="user"]').prop('readonly', false)
					$('[name="pass"]').prop('readonly', false)
					location.reload();
					btnproc('#btn-sign-in', 0)
					location.href = "<?php echo base_url() ?>";
				} else {
					showNotif(data.caption, data.msg, data.class)
					$('[name="user"]').prop('readonly', false)
					$('[name="pass"]').prop('readonly', false)
					btnproc('#btn-sign-in', 0)
				}
			},
			error: function (jqXHR, textStatus, errorThrown) {
				$('[name="user"]').prop('readonly', false)
				$('[name="pass"]').prop('readonly', false)
				btnproc('#btn-sign-in', 0)
			}
		});
	}

	function login_cart(tipe) {
		// if ($('[name="user"]').val() == '' || $('[name="user"]').val() == null) {
		// 	$('[name="user"]').focus()
		// 	showNotif('Perhatian', 'Lengkapi Data', 'warning')
		// 	return false
		// }
		// if ($('[name="pass"]').val() == '' || $('[name="pass"]').val() == null) {
		// 	$('[name="pass"]').focus()
		// 	showNotif('Perhatian', 'Lengkapi Data', 'warning')
		// 	return false
		// }
		$('[name="user"]').prop('readonly', true)
		$('[name="pass"]').prop('readonly', true)
		btnproc('#btn-sign-in', 1)
		$.ajax({
			url: `<?php echo base_url() ?>login/auth_process`,
			type: "POST",
			dataType: "JSON",
			data: $('#form-login').serialize(),
			success: function (data) {
				if (data.status == 'success') {
					showNotif(data.caption, data.msg, data.class)
					$('[name="user"]').prop('readonly', false)
					$('[name="pass"]').prop('readonly', false)
					location.reload();
					btnproc('#btn-sign-in', 0)
					if (tipe == 'cart') {
						location.href = "<?php echo base_url() ?>billing";
					} else {
						location.href = "<?php echo base_url() ?>";
					}
				} else {
					showNotif(data.caption, data.msg, data.class)
					$('[name="user"]').prop('readonly', false)
					$('[name="pass"]').prop('readonly', false)
					btnproc('#btn-sign-in', 0)
				}
			},
			error: function (jqXHR, textStatus, errorThrown) {
				$('[name="user"]').prop('readonly', false)
				$('[name="pass"]').prop('readonly', false)
				btnproc('#btn-sign-in', 0)
			}
		});
	}

    function login_modal() {
    	$('.label-login').html('Masuk');
		$('#modal-data').modal('show');
		$('#btn-sign-in').attr('onclick','login_cart("all")');
	}
	
	function login_modal_cart() {
		$('.label-login').html('Masuk Untuk Checkout');
		$('#modal-data').modal('show');
		$('#btn-sign-in').attr('onclick','login_cart("cart")');
    }

	function btnproc(prop, tipe, label = 'Processing') {
      if (tipe == 1) {
          label_old_btn = ($(prop).html());
          $(prop).prop('disabled', true);
          $(prop).html(`<i class="fa fa-spinner fa-spin"></i> ${label}`);
      } else if (tipe == 0) {
          $(prop).prop('disabled', false);
          $(prop).html(`${label_old_btn}`);
      }
	}

	function ceknull(x) {
	    if ($('[name="' + x + '"]').val() == '' || $('[name="' + x + '"]').val() == null) {
			showNotif('', 'Kolom '+ x +' Wajib Diisi', 'danger');
	        $('[name="' + x + '"]').focus()
	        return true
			$('.btn-save').prop('disabled',false);
	    } else {
	        return false
	    }
	}

	function cekzero(x) {
	    if ($('[name="' + x + '"]').val() <= '0' || $('[name="' + x + '"]').val() <= 0 || $('[name="' + x + '"]').val() == null) {
			showNotif('', 'Kolom '+ x +' Wajib Diisi', 'danger');
	        $('[name="' + x + '"]').focus()
	        return true
			$('.btn-save').prop('disabled',false);
	    } else {
	        return false
	    }
	}
	  

</script>