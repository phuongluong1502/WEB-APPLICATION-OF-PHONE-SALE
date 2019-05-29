<footer id="footer">
    <div class="container">
        <div class="col-md-3 col-sm-6">
            <h4>Về Chúng Tôi</h4>

            <p>Chuyên kinh doanh điện thoại di động, hàng công nghệ, linh kiện – phụ kiện điện thoại di động, sửa chữa điện thoại di động</p>

            <hr>

            <h4>Nhận thông tin từ chúng tôi</h4>

            <form action='emailkhachhang.php' method='post'>
                <div class="input-group">

                    <input type="text" class="form-control" placeholder="Nhập Email Của Bạn" name='sendmail'>

                    <span class="input-group-btn">

                <button class="btn btn-default" type="button"><i class="fa fa-send"></i></button>

            </span>

                </div>
                <!-- /input-group -->
            </form>

            <hr class="hidden-md hidden-lg hidden-sm">

        </div>
        <!-- /.col-md-3 -->
        <div class="col-md-6 col-sm-6">
        <?php $lisyLoaiSP = $dt->ListLoaiSP() ; ?>
        <div class="photostream">
        <?php while ($rowLoai = $lisyLoaiSP->fetch_assoc() ) { ?>
        <div>
        <a href="dien-thoai/<?=trim($rowLoai['TenLoai'])?>/">
        <img src="img/<?=$rowLoai['hinh']?>" class="img-responsive" alt="<?=$rowLoai['TenLoai']?>" title="<?=$rowLoai['TenLoai']?>">
        </a>
        </div>					
        <?php } ?>
        </div>
        </div>
        <!-- /.col-md-3 -->
                <!-- /.col-md-3 -->

        <div class="col-md-3 col-sm-6 text-right">
            <h4>Liên hệ</h4>
            <p><strong>Shốp Điện Thoại Ltd </strong>
			<br>30/4/1/5 Cung Vàng <br>Điện Ngọc River <br>Thành phố Trăng Vàng
			<br>Việt Nam <br> <strong>Mời quý khách</strong>
			</p>
            <a href="<?=BASE_URL?>lien-he/" class="btn btn-small btn-template-main">Liên hệ</a>
            <hr class="hidden-md hidden-lg hidden-sm">

        </div>
        <!-- /.col-md-3 -->
    </div>
    <!-- /.container -->
</footer>