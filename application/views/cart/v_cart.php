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
                    <li class="active">Cart</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="ckeckout">
		<div class="container">
			<div class="ckeck-top heading">
				<h2>CHECKOUT</h2>
			</div>
			<div class="ckeckout-top">
			<div class="cart-items">
			 <h3>My Cart (<?php echo $this->cart->total_items() ?>)</h3>

            <table class="table-custom">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Product</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="body-tb">
                <!-- <?php foreach ($this->cart->contents() as $i => $v): ?>
                    <tr class="tr-tb">
                        <td><img style="width: 100px !important;" src="<?php echo prep_url(api_url()).'/uploads/img1.png' ?>" class="img-responsive" alt=""></td>
                        <td><?php echo $v['name'] ?></td>
                        <td align="right">Rp. <?php echo number_format($v['price']) ?></td>
                        <td align="center"><?php echo $v['qty'] ?></td>
                        <td align="right">Rp. <?php echo number_format($v['subtotal'])  ?></td>
                        <td align="center"><button class="btn btn-md "  onclick="remove_cart('<?php echo $v['rowid']  ?>')"><i class="fa fa-times"></i></button></td>
                    </tr>
                <?php endforeach; ?> -->
                </tbody>
                <tbody>
                    <tr class="tr-total">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        <td class="total-cart" align="right"> </td>
                    </tr>
                </tbody>
            </table>
			</div>  
		 </div>
		</div>
	</div>
    
    <?php $this->load->view('_partials/foot.php'); ?>
</body>
<script>
    $(document).ready(function() {
        load_cart()
    })
    
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
                        <td><img style="width: 100px !important;" src="<?php echo prep_url(api_url()).'/uploads/img1.png' ?>" class="img-responsive" alt=""></td>
                        <td>${v.name}</td>
                        <td align="right">Rp. ${numeral(v.price).format('0,0')}</td>
                        <td align="center">${v.qty}</td>
                        <td align="right">Rp. ${numeral(v.subtotal).format('0,0')}</td>
                        <td align="center"><button class="btn btn-md "  onclick="remove_cart('${v.rowid}')"><i class="fa fa-times"></i></button></td>
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

    function remove_cart(rowid) {
        $.ajax({
          url: `<?php echo base_url() ?>cart/remove`,
          type: "POST",
          dataType: "JSON",
          data: {
            rowid: rowid,
          },
          success: function(data) {
              console.log('sukses')
              total_items(data.total_items)
              total_cart(data.total_price)
              load_cart()
          },
          error: function(jqXHR, textStatus, errorThrown) {
                console.log('gagal')
          }
      });
    }
</script>
</html>