<div class="row products">
<?php while ($rowSP = $listsp->fetch_assoc() ) {?>
<div class="col-md-2 col-sm-3">
    <div class="product">
        <div class="image">
         <a href="<?=BASE_URL."dien-thoai/". $rowSP['idDT']?>.html">
          <img src="<?=BASE_URL."upload/hinhchinh/".$rowSP['urlHinh']?>" alt="" class="img-responsive image1">
         </a>
        </div>
        <div class="text">
       <h3><a href="<?=BASE_URL."dien-thoai/". $rowSP['idDT']?>.html"><?=$rowSP['TenDT']?></a></h3>
       <p class="price"><?=number_format($rowSP['Gia'],0, ",",".");?> VND</p>
       <p class="buttons">
       <a href="<?=BASE_URL."dien-thoai/". $rowSP['idDT']?>.html" class="btn btn-default">Xem</a>
       </p>
      </div>
    </div>
</div>                    
<?php } ?>
</div>
