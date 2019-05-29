<?php
if ( !isset($_SESSION['SPDaXem']) ) $_SESSION['SPDaXem']=array();
$idDT = $_GET['idDT'];
if( isset($_SESSION['SPDaXem'][$idDT])) unset($_SESSION['SPDaXem'][$idDT]);
$ct = $dt-> chiTietSP($idDT);
$rowCT = $ct->fetch_assoc(); 
?>

<div class="container">

    <div class="row">

        <!-- *** LEFT COLUMN ***
_________________________________________________________ -->

        <div class="col-md-12">
			<p class="lead"><b><?=$rowCT['TenDT']?></b>
            </p>
            <p class="lead"><?=$rowCT['MoTa']?>
            </p>
            <p class="goToDescription"><a href="#details" class="scroll-to text-uppercase">Cuộn để xem chi tiết sản phẩm</a>
            </p>

            <div class="row" id="productMain">
                <div class="col-sm-6">
                    <div id="mainImage">
                        <img src="upload/hinhchinh/<?=$rowCT['urlHinh']?>" alt="" class="img-responsive">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="box">

                        <form action="capnhatGH.php" method='GET'>
                        <input type='hidden' name='action' value='add'/>
                        <input type='hidden' name='idDT' value='<?php echo $rowCT['idDT']; ?>'/>
                            <p class="price"><?=number_format($rowCT['Gia'],0, ",",".");?> VND</p>

                            <p class="text-center">
                                <button type="submit" class="btn btn-template-main" ><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</button>
                                <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Add to wishlist"><i class="fa fa-heart-o"></i>
                                </button>
                            </p>

                        </form>
                    </div>

                    <div class="row" id="thumbs">
					   <?php $lispHinh = $dt->layHinhSP($idDT,4);?>
                       <?php if ($lispHinh->num_rows>0) {?>
                       <?php while($rowH = $lispHinh ->fetch_assoc()) {?>
                        <div class="col-xs-3">
                        <a href="upload/hinhphu/<?=$rowH['urlHinh']?>" class="thumb">
                        <img src="upload/hinhphu/<?=$rowH['urlHinh']?>" class="img-responsive">
                         </a>
                         </div>
                    	<?php } }?>
                    </div>

                </div>

            </div>
            <div class="box" id="details">                            
                 <h4>Giới thiệu</h4>
                 <div id="gioithieu"><?=$rowCT['baiviet']?></div>                               
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="box text-uppercase">
                        <h3>Có Thể Bạn Cũng Sẽ Thích</h3>
                    </div>
                </div>
				<?php $SPCungLoai=$dt->SPCungLoai($rowCT['idDT']);
					  while($row_SPCL=$SPCungLoai->fetch_assoc()){
				?>
                <diiv class="col-md-3 col-sm-6">
                    <div class="product">
                        <div class="image">
                            <a href="<?=BASE_URL."dien-thoai/". $row_SPCL['idDT']?>.html">
                                <img src="<?=BASE_URL."upload/hinhchinh/".$row_SPCL['urlHinh']?>" alt="" class="img-responsive image1">
                            </a>
                        </div>
                        <div class="text">
                            <h3><?php echo $row_SPCL['TenDT']; ?></h3>
                            <p class="price"><?php $row_SPCL['Gia']; ?></p>

                        </div>
                    </div>
                    <!-- /.product -->
                </div>
                <?php }?>
            </div>				
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="box text-uppercase">
                        <h3>Sản Phẩm Đã Xem</h3>
                    </div>
                </div>
           <?php end($_SESSION['SPDaXem']);
		   		 count($_SESSION['SPDaXem']);
		   		 $j=count($_SESSION['SPDaXem'])>3?3:count($_SESSION['SPDaXem']);
		   		 for($i=1;$i<=$j;$i++){
				 $keyDX=key( $_SESSION['SPDaXem'] );
				 $DX=$dt->ChiTietSP($keyDX);
				 $row_DX=$DX->fetch_assoc();
		   ?>
                <div class="col-md-3 col-sm-6">
                    <div class="product">
                        <div class="image">
                            <a href='<?=BASE_URL."dien-thoai/". $row_DX["idDT"]?>.html'>
                                <img src="upload/hinhchinh/<?=$row_DX['urlHinh']?>" alt="" class="img-responsive image1">
                            </a>
                        </div>
                        <div class="text">
                            <h3><?= $row_DX['TenDT']; ?></h3>
                            <p class="price"><?= $row_DX['Gia']; ?></p>
                        </div>
                    </div>
                    <!-- /.product -->
                </div>
            <?php 
				prev($_SESSION['SPDaXem']);
			} 
			$_SESSION['SPDaXem'][$idDT] = $idDT;
			?>
            
        </div>
        <!-- /.col-md-9 -->


        <!-- *** LEFT COLUMN END *** -->

        <!-- *** RIGHT COLUMN ***
_________________________________________________________ -->

        
        <!-- /.col-md-3 -->

        <!-- *** RIGHT COLUMN END *** -->

    </div>
    <!-- /.row -->

</div>