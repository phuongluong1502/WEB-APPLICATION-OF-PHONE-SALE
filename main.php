<?php session_start();
      require_once "class/dt.php";
      $dt = new dt;
	  $p = $_GET['p'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Universal - All In 1 Template</title>
    <base href="<?=BASE_URL?>"/>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>

    <!-- Bootstrap and Font Awesome css -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Css animations  -->
    <link href="css/animate.css" rel="stylesheet">

    <!-- Theme stylesheet, if possible do not edit this stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- Responsivity for older IE -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="img/apple-touch-icon-152x152.png" />
     <style>
	.box-image-text.blog .intro {height: 115px ; overflow:hidden; line-height:180%; font-size:16px; text-align:justify;  }
	.box-image-text .content h4 {height:48px ; overflow:hidden; font-size:17px;}
	.box-image-text .image img {height:160px; width:100%}
	.product  {height:400px}
	.product .image .img-responsive {margin:auto;margin-top:20px;height:180px}
	.product .text h3 {height:32px; overflow:hidden; margin:15px;}
	.product .buttons {display:block; padding:0; position:static}
	#footer .photostream div {width:16.5%;}
	h1.lead {color: #38a7bb; font-weight:900; text-transform:uppercase; font-size:26px}
	p.goToDescription { margin-top:30px; text-align:left;}
	#mainImage {margin-top:50px}
	#mainImage img {height:250px; }
	#productMain #thumbs img {height:80px}
	#productMain #thumbs div {text-align:center}
	#productMain #thumbs a {border:none;}

	</style>
</head>

<body>

    <div id="all">

        <?php include_once 'header.php'; ?>

        <!-- *** LOGIN MODAL ***
_________________________________________________________ -->

        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="customer-orders.html" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email_modal" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password_modal" placeholder="password">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-template-main"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="customer-register.html"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                    </div>
                </div>
            </div>
        </div>

        <!-- *** LOGIN MODAL END *** -->

        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>DANH MỤC SẢN PHẨM</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Trang chủ </a>
                            </li>
                            <li>Sản phẩm</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div id="content">
            <div class="container">
            <?php 
            if ($p=="giohang") {
				$action = $_GET['action']; // để biết phải làm gì:thêm/xoá/cập nhật
			   $idDT=$_GET['idDT'];       // để biết sản phẩm nào mà thêm hay bớt
			   $soluong=$_GET['soluong'];  // để biết số lượng bao nhiêu
			   $dt->CapNhatGioHang($action, $idDT,$soluong);	
			   include_once "giohang.php";
			}
			elseif ($p=="lienhe") include_once "lienhe.php";
			elseif ($p=="chitiet") include_once "chitiet.php";
			elseif ($p=="sptrongloai") include_once "sptrongloai.php";
			elseif ($p=="dathang") include_once "dathang.php";
			elseif ($p=="thanhtoan1") include_once "thanhtoan1.php";
			elseif ($p=="thanhtoan2") include_once "thanhtoan2.php";
			elseif ($p=="thanhtoan3") include_once "thanhtoan3.php";
			elseif ($p=="thanhtoan4") include_once "thanhtoan4.php";
            else { ?>
                <div class="heading"> <h2>SẢN PHẨM MỚI</h2> </div>
                <?php $listsp = $dt-> SanPhamMoi(18); include "listsp.php"; ?>
            
                <div class="heading"> <h2>SẢN PHẨM BÁN CHẠY</h2> </div>
                <?php $listsp = $dt-> SanPhamBanChay(18); include "listsp.php"?>
            
                <div class="heading"> <h2>SẢN PHẨM HOT</h2> </div>
                <?php $listsp = $dt-> SanPhamHot(18); include "listsp.php"?>
            <?php } //if?>
            </div>
         </div>

        <!-- /#content -->


        <!-- *** GET IT ***
_________________________________________________________ -->

        <div id="get-it">
            <div class="container">
                <div class="col-md-8 col-sm-12">
                    <h3>Do you want cool website like this one?</h3>
                </div>
                <div class="col-md-4 col-sm-12">
                    <a href="#" class="btn btn-template-transparent-primary">Buy this template now</a>
                </div>
            </div>
        </div>


        <!-- *** GET IT END *** -->


        <!-- *** FOOTER ***
_________________________________________________________ -->

        <?php include_once 'footer.php' ?>
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

        <div id="copyright">
            <div class="container">
                <div class="col-md-12">
                    <p class="pull-left">&copy; 2015. Your company / name goes here</p>
                    <p class="pull-right">Template by <a href="https://bootstrapious.com">Bootstrapious</a> & <a href="https://fity.cz">Fity.cz</a>
                         <!-- Not removing these links is part of the license conditions of the template. Thanks for understanding :) If you want to use the template without the attribution links, you can do so after supporting further themes development at https://bootstrapious.com/donate  -->
                    </p>

                </div>
            </div>
        </div>
        <!-- /#copyright -->

        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->


    <!-- #### JAVASCRIPT FILES ### -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')
    </script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.parallax-1.1.3.js"></script>
    <script src="js/front.js"></script>

    



</body>

</html>