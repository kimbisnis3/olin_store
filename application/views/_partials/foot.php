<!--information-starts-->
<div class="information">
		<div class="container">
			<div class="infor-top">
				<div class="col-md-3 infor-left">
					<h3>Follow Us</h3>
					<ul>
						<li><a href="#"><span class="fb"></span><h6>Facebook</h6></a></li>
						<li><a href="#"><span class="twit"></span><h6>Twitter</h6></a></li>
						<li><a href="#"><span class="google"></span><h6>Google+</h6></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>Information</h3>
					<ul>
						<li><a href="#"><p>Specials</p></a></li>
						<li><a href="#"><p>New Products</p></a></li>
						<li><a href="#"><p>Our Stores</p></a></li>
						<li><a href="contact.html"><p>Contact Us</p></a></li>
						<li><a href="#"><p>Top Sellers</p></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>My Account</h3>
					<ul>
						<li><a href="account.html"><p>My Account</p></a></li>
						<li><a href="#"><p>My Credit slips</p></a></li>
						<li><a href="#"><p>My Merchandise returns</p></a></li>
						<li><a href="#"><p>My Personal info</p></a></li>
						<li><a href="#"><p>My Addresses</p></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>Store Information</h3>
					<h4>The company name,
						<span>Lorem ipsum dolor,</span>
						Glasglow Dr 40 Fe 72.</h4>
					<h5>+955 123 4567</h5>	
					<p><a href="mailto:example@email.com">contact@example.com</a></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-data" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header no-border">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-hijau">Masuk</h4>
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
              <button class="btn btn-hijau btn-md btn-block" id="btn-sign-in" onclick="login()"><i class="fa fa-sign-in"></i> Sign In</button>
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
      $('[name="user"]').prop('disabled', true)
      $('[name="pass"]').prop('disabled', true)
    //   $('#btn-sign-in').prop('disabled', true)
	  btnproc('#btn-sign-in', 1)
      $.ajax({
        url: `<?php echo base_url() ?>login/auth_process`,
        type: "POST",
        dataType: "JSON",
        data: $('#form-login').serialize(),
        success: function (data) {
          if (data.status == 'success') {
            showNotif(data.caption, data.msg, data.class)
            $('[name="user"]').prop('disabled', false)
            $('[name="pass"]').prop('disabled', false)
            // $('#btn-sign-in').prop('disabled', false)
	  btnproc('#btn-sign-in', 0)
            location.href = "<?php echo base_url() ?>";
          } else {
            showNotif(data.caption, data.msg, data.class)
            $('[name="user"]').prop('disabled', false)
            $('[name="pass"]').prop('disabled', false)
            // $('#btn-sign-in').prop('disabled', false)
			btnproc('#btn-sign-in', 0)
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          $('[name="user"]').prop('disabled', false)
          $('[name="pass"]').prop('disabled', false)
        //   $('#btn-sign-in').prop('disabled', false)
		btnproc('#btn-sign-in', 0)
        }
      });
    }

    function login_modal() {
      $('#modal-data').modal('show');
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

</script>