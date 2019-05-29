<?php 
if (!$_POST) die('');
$sosp = count( $_SESSION['daySoLuong'] );
if (isset($_POST['payment'])) 
   $_SESSION['DonHang']['payment'] = $_POST['payment'];
//print_r($_SESSION);
?>

<div class="container">

    <div class="row">

        <div class="col-md-9 clearfix" id="checkout">

            <div class="box">
                <form method="post" action="dat-hang/">
                    <ul class="nav nav-pills nav-justified">
                        <li class="disabled"><a href="#"><i class="fa fa-map-marker"></i> <br>Địa chỉ</a>
                        </li>
                        <li class="disabled"><a href="#"><i class="fa fa-truck"></i> <br>Phương thức giao hàng</a></li>
                        <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Phương thức thanh toán</a></li>
                        <li class="active"><a href="#"><i class="fa fa-eye"></i> <br>Thông tin đơn hàng</a></li>
                    </ul>
                    <div class="content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                	<tr> <th colspan="2">Tên SP</th>  <th>Số lượng</th>
                                     <th>Giá</th>  <th>Giảm</th>  <th>Tiền</th>
                                	</tr>
                                </thead>
                                <tbody>
                                	<?php reset( $_SESSION['daySoLuong'] );  
										  reset( $_SESSION['dayDonGia'] );
										  reset( $_SESSION['dayTenDT'] );    
										  $tongtien = $tongsoluong = 0;			
										for ($i = 0; $i<$sosp ; $i++) {
											$idDT = key( $_SESSION['daySoLuong'] );
											$tendt = current( $_SESSION['dayTenDT'] );
											$soluong = current( $_SESSION['daySoLuong'] );
											$dongia = current( $_SESSION['dayDonGia'] );
											$tien = $dongia*$soluong;  
											$tongtien+= $tien; 
											$tongsoluong+= $soluong;	
									?>
                                    <tr>
                                        <td> <a href="#"><img src="img/detailsquare.jpg" alt=""></a> </td>
                                        <td><a href="#"><?=$tendt?></a></td>
                                        <td><?=$soluong?></td>
                                        <td><?=number_format($dongia,0, ",",".");?> VND</td>
                                        <td>$0.00</td>
                                        <td><?=number_format($tien,0, ",",".");?> VND</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">Total</th>
                                        <th>$446.00</th>
                                    </tr>
                                    <?php 
									next( $_SESSION['daySoLuong'] );  
									next( $_SESSION['dayDonGia'] );
									next( $_SESSION['dayTenDT'] );
									?>
									<?php } //for ?>

                                </tfoot>
                            </table>

                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.content -->

                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="shop-checkout3.html" class="btn btn-default"><i class="fa fa-chevron-left"></i>Trở lại</a>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-template-main">Đặt hàng<i class="fa fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col-md-9 -->

        <div class="col-md-3">

            <div class="box" id="order-summary">
                <div class="box-header">
                    <h3>Order summary</h3>
                </div>
                <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Order subtotal</td>
                                <th>$446.00</th>
                            </tr>
                            <tr>
                                <td>Shipping and handling</td>
                                <th>$10.00</th>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <th>$0.00</th>
                            </tr>
                            <tr class="total">
                                <td>Tổng tiền</td>
                                <th><?=number_format($tongtien,0, ",",".");?> VND</th>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
        <!-- /.col-md-3 -->

    </div>
    <!-- /.row -->

</div>