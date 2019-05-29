<?php 
	$blog = $dt->Blog(8);
?>
<div class="container">
    <div class="col-md-12">
        <div class="heading text-center">
            <h2>Thông Tin Từ Cửa Hàng</h2>
        </div>

        <p class="lead">Các tin tức công nghệ, hướng dẫn sử dụng, giới thiệu điện thoại, tin tức khuyến mãi từ hệ thống cửa hàng của chúng tôi sẽ được publish thường xuyên vào đây để thông tin và hỗ trợ quý vi
        </p>

        <!-- *** BLOG HOMEPAGE ***
_________________________________________________________ -->

        <div class="row">
        <?php while($row_blog=$blog->fetch_assoc()){ ?>
            <div class="col-md-3 col-sm-6">
                <div class="box-image-text blog">
                    <div class="top">
                        <div class="image">
                            <img src="	" alt="" class="img-responsive" onerror="this.src='<?=BASE_URL?>defaultImg.jpg'">
                        </div>
                        <div class="bg"></div>
                        <div class="text">
                            <p class="buttons">
                                <a href="blog-post.html" class="btn btn-template-transparent-primary"><i class="fa fa-link"></i> Xem Tiếp</a>
                            </p>
                        </div>
                    </div>
                    <div class="content">
                        <h4><a href="blog-post.html"><?php echo $row_blog['TieuDe']; ?></a></h4>
                        <p class="intro"><?php echo $row_blog['TomTat']; ?></p>
                        <p class="read-more"><a href="blog-post.html" class="btn btn-template-main">Continue reading</a>
                        </p>
                    </div>
                </div>
                <!-- /.box-image-text -->

            </div>
		<?php } ?>
        </div>
        <!-- /.row -->

        <!-- *** BLOG HOMEPAGE END *** -->

    </div>

</div>