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
		<div class="container step step-1">
            <div class="row">
                <!-- <div class="col-md-2"></div> -->
                <div class="col-md-12">
                    <div class="row" style="margin-bottom: 20px !important;">
                        <div class="col-md-3">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="col-md-3">
                            <label for="">Alamat</label>
                            <input type="text" class="form-control" name="alamat">
                        </div>
                        <div class="col-md-3">
                            <label for="">Telp</label>
                            <input type="text" class="form-control" name="telp">
                        </div>
                        <div class="col-md-3">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-2"></div> -->
            </div>
        </div>
        <div class="container step step-2">
            <div class="row">
                <!-- <div class="col-md-2"></div> -->
                <div class="col-md-12">
                    <div class="row" style="margin-bottom: 20px !important;">
                        <div class="col-md-3">
                            <label for="">Nama Penerima</label>
                            <input type="text" class="form-control" name="nama_penerima">
                        </div>
                        <div class="col-md-3">
                            <label for="">Telp Penerima</label>
                            <input type="text" class="form-control" name="telp_penerima">
                        </div>
                        <div class="col-md-3">
                            <label for="">Email Penerima</label>
                            <input type="text" class="form-control" name="email_penerima">
                        </div>
                        <div class="col-md-3">
                            <label for="">Alamat Lengkap Penerima</label>
                            <input type="text" class="form-control" name="alamat_penerima">
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-2"></div> -->
            </div>
            <div class="row">
                <!-- <div class="col-md-2"></div> -->
                <div class="col-md-12">
                    <div class="row" style="margin-bottom: 20px !important;">
                        <div class="col-md-3">
                            <label for="">Provinsi</label>
                            <select class="form-control" name="provinsi" id="provinsi" onchange="getcity()">
                                <option value="">-</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="">Kota</label>
                            <select class="form-control" name="kota" id="kota">
                                <option value="">-</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="">Kurir</label>
                            <select class="form-control" name="kurir" id="kurir" onchange="getservice()">
                                <option value="">-</option>
                                <option value="jne">JNE</option>
                                <option value="tiki">TIKI</option>
                                <option value="pos">POS</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="">Service</label>
                            <select class="form-control" name="service" id="service">
                                <option value="">-</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-2"></div> -->
            </div>
        </div>
        <div class="container step step-3">
			<div class="row">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Product</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody class="body-tb">
                </tbody>
                <tbody>
                    <tr class="tr-total">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td align="center">Total</td>
                        <td class="total-cart" align="right"> </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
        <div class="containter btn-step" style="margin-top: 25px !important;">
            <div class="ckeck-top heading">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-md btn-success btn-flat btn-prev" onclick="prev_page()"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
                        <button type="button" class="btn btn-md btn-success btn-flat btn-next" onclick="next_page()">Selanjutnya <i class="fa fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
        
	</div>
	<?php $this->load->view('_partials/foot.php'); ?>
</body>
<script src="<?php echo base_url()?>assets/pace/pace.js"></script>
<script>
    var page = 1;
    var maxpage = 3;
    var minpage = 1;
    $(document).ready(function() {
        initstep()
        load_cart()
        Pace.stop();
        btn_direct()
        getprov()
    })

    function next_page() {
        Pace.stop();
      	Pace.bar.render();
        if(page != maxpage) {
            page = page + 1
            $(`.step`).hide()
        }
        //validation form here
        // if(page == 1 && $('[name="nama"]').val() == '') {
        //     return false
        // }
        // if(page == 1 && $('[name="alamat"]').val() == '') {
        //     return false
        // }
        // if(page == 1 && $('[name="telp"]').val() == '') {
        //     return false
        // }
        // if(page == 1 && $('[name="email"]').val() == '') {
        //     return false
        // }
        $(`.step-${page}`).show()
        Pace.start();
        btn_direct()
    }

    function prev_page() {
        Pace.stop();
      	Pace.bar.render();
        if(page != minpage) {
            page = page - 1
            $(`.step`).hide()
        }
        $(`.step-${page}`).show()
        Pace.start();
        btn_direct()
    }

    function initstep() {
        $(`.step-2`).hide()
        $(`.step-3`).hide()
        $(`.step-4`).hide()
    }

    function load_cart() {
        $('.tr-tb').remove();
        $.ajax({
          url: `<?php echo base_url() ?>cart/content_cart`,
          type: "GET",
          dataType: "JSON",
          data: {},
          success: function(data) {
            //   console.log(data[0]['price'])
            $.each(data.content, function( i, v ) {
                $('.body-tb').append(`
                    <tr class="tr-tb fadeIn animated">
                        <td align="center">${showimage(v.image)}</td>
                        <td>${v.name}</td>
                        <td align="right">Rp. ${numeral(v.price).format('0,0')}</td>
                        <td align="center">${v.qty}</td>
                        <td align="right">Rp. ${numeral(v.subtotal).format('0,0')}</td>
                    </tr>
                `)

            });
            total_cart(data.total_price)
          },
          error: function(jqXHR, textStatus, errorThrown) {
                console.log('gagal')
          }
      });
    }

    function btn_direct(){
        if(page == maxpage){
            $('.btn-next').addClass('invisible')
        } else {
            $('.btn-next').removeClass('invisible')
        }
        if(page == minpage){
            $('.btn-prev').addClass('invisible')
        } else {
            $('.btn-prev').removeClass('invisible')
        }
        
    }

    function getprov() {
	    $(`#provinsi`).attr('readonly', true);
        $.ajax({
	        url: `<?php echo base_url() ?>billing/getprov`,
	        type: "GET",
	        dataType: "JSON",
	        success: function(data) {
                let arr = data.rajaongkir.results;
                getselect('#provinsi', 'kelasprov', 'province_id', 'province',arr)
                $(`#provinsi`).attr('readonly', false);
	        },
	        error: function(jqXHR, textStatus, errorThrown) {
                console.log('Error on process');
                $(`#provinsi`).attr('readonly', false);
	        }
	    });
    }

    function getcity() {
        let kodeprovinsi = $(`#provinsi`).val()
        $(`#kota`).attr('readonly', true);
        $.ajax({
	        url: `<?php echo base_url() ?>billing/getcity?provincecode=${kodeprovinsi}`,
	        type: "GET",
	        dataType: "JSON",
	        success: function(data) {
                let arr = data.rajaongkir.results;
                getselect('#kota', 'kelaskota', 'city_id', 'city_name', arr)
	            $(`#kota`).attr('readonly', false);
	        },
	        error: function(jqXHR, textStatus, errorThrown) {
                console.log('Error on process');
                $(`#kota`).attr('readonly', false);
	        }
	    });
    }

    function getservice() {
        let kodekurir       = $(`#kurir`).val()
        let kodekota        = $(`#kota`).val()
        $(`#service`).attr('readonly', true);
        $.ajax({
	        url: `<?php echo base_url() ?>billing/getongkir?destination=${kodekota}&kurir=${kodekurir}`,
	        type: "GET",
	        dataType: "JSON",
	        success: function(data) {
                let arr = data.rajaongkir.results[0].costs;
                getselect('#service', 'kelasservice', 'service', 'description', arr)
                console.log(arr)
	            $(`#service`).attr('readonly', false);
	        },
	        error: function(jqXHR, textStatus, errorThrown) {
                console.log('Error on process');
                $(`#service`).attr('readonly', false);
	        }
	    });
    }

    function getselect(prop, classoption, val, caption, arr) {
	    $(`${prop}`).after(function() { $(`.${classoption}`).remove() });
		$(`${prop}`).val('');
        $(`${prop}`).trigger('change');
        
        // $(`${prop}`).append(`<option class="${classoption}" value="">-</option>`);
        $.each(arr, function (i, v) {
            $(`${prop}`).append(`<option class="${classoption}" value="${v[val]}">${v[caption]}</option>`);
        })
	}

</script>

</html>