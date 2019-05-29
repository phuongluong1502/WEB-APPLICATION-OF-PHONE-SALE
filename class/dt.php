<?php 
require_once "class/goc.php";
class dt extends goc{
	function BLog($sotin){
		$sql="SELECT idTin, TieuDe, TomTat,urlHinh FROM tin WHERE AnHien=1 ORDER BY RAND() LIMIT 0, $sotin";
		$kq=$this->db->query($sql);
		if(!$kq) die($this->db->error);
		return $kq;
	}
	function SanPhamMoi($sotin=10){
		$sql="SELECT idDT, TenDT, urlHinh, Gia FROM dienthoai WHERE AnHien=1 ORDER BY NgayCapNhat DESC LIMIT 0,$sotin";
		$kq=$this->db->query($sql);
		if(!$kq) die($this->db->error);
		return $kq;
	}
	function ListLoaiSP(){
	   $sql="SELECT idLoai, TenLoai, hinh FROM loaisp  WHERE AnHien = 1
	   ORDER BY ThuTu DESC LIMIT 0,12";	
	   $kq = $this->db->query($sql);	
	   if(!$kq) die( $this-> db->error);
	   return $kq;		
	}
	function SanPhamBanChay($sosp = 10){				
	   $sql="SELECT idDT, TenDT, urlHinh FROM dienthoai WHERE AnHien=1 
	   ORDER BY SoLanMua DESC LIMIT 0,$sosp";	
	   $kq = $this->db->query($sql);
	   if(!$kq) die( $this-> db->error);
	   return $kq;
	}
	function SanPhamHot($sosp = 10){
	   $sql="SELECT idDT,TenDT,urlHinh FROM dienthoai 
	   WHERE AnHien=1 AND Hot=1 ORDER BY NgayCapNhat DESC LIMIT 0,$sosp";	
	   $kq = $this->db->query($sql);
	   if(!$kq) die( $this-> db->error);
	   return $kq;
	}
	function CapNhatGioHang($action, $idDT){	
	   if ( !isset($_SESSION['daySoLuong']) ) $_SESSION['daySoLuong']=array();
	   if ( !isset($_SESSION['dayDonGia']) )  $_SESSION['dayDonGia']=array();
	   if ( !isset($_SESSION['dayTenDT']) )   $_SESSION['dayTenDT']=array();
	
	   if ($action=="add") {
		  settype($idDT,"int"); if ($idDT<=0) return;
		  $sql="SELECT TenDT,Gia,SoLuongTonKho FROM dienthoai WHERE idDT=$idDT";
		  $kq = $this->db->query($sql);	
		  if(!$kq) die( $this-> db->error);	
		  $row = $kq->fetch_assoc();		
	
		  $_SESSION['dayTenDT'][$idDT] = $row['TenDT'];
		  $_SESSION['dayDonGia'][$idDT] = $row['Gia'];
		  $_SESSION['daySoLuong'][$idDT]+=1;
	 
		  if ($_SESSION['daySoLuong'][$idDT]>$row['SoLuongTonKho']) $_SESSION['daySoLuong'][$idDT] = $row['SoLuongTonKho'];
		}//add
	
	   if ($action=="remove") {
		  settype($idDT,"int"); if ($idDT<=0) return;
		  unset($_SESSION['dayTenDT'][$idDT]);
		  unset($_SESSION['dayDonGia'][$idDT]);
		  unset($_SESSION['daySoLuong'][$idDT]);
	   } //remove
	   if ($action=="update"){
		   $iddt_arr = $_POST['iddt_arr']; 
		   $soluong_arr = $_POST['soluong_arr']; 
			for($i=0; $i<count($iddt_arr);$i++){
			  $idDT = $iddt_arr[$i]; settype($idDT,"int"); if ($idDT<=0) continue;
			 $soluong=$soluong_arr[$i];settype($soluong,"int");
			 if ($soluong<=0) continue;
			 $kq = $this->chiTietSP($idDT);
			 $row = $kq->fetch_assoc();
			 $_SESSION['dayTenDT'][$idDT] = $row['TenDT'];
			 $_SESSION['dayDonGia'][$idDT] = $row['Gia'];
			 $_SESSION['daySoLuong'][$idDT] = $soluong;
			 if ($_SESSION['daySoLuong'][$idDT]>$row['SoLuongTonKho']) $_SESSION['daySoLuong'][$idDT] = $row['SoLuongTonKho'];
		   } //for
		} //update
	}// function capnhatgiohang
	function chiTietSP($idDT){
	   $sql="SELECT * FROM dienthoai WHERE AnHien = 1 AND idDT=$idDT";
	   $kq = $this->db->query($sql);
	   if(!$kq) die( $this-> db->error);
	   return $kq;
	}
	function LuuDonHang(&$error){    
		$hoten=$this->db->escape_string( trim(strip_tags($_SESSION['DonHang']['hoten'])) );
		  $dienthoai = $this->db->escape_string(  trim(strip_tags($_SESSION['DonHang']['dienthoai'])) );
		  $diachi = $this->db->escape_string(  trim(strip_tags($_SESSION['DonHang']['diachi'])) );     
		  $email = $this->db->escape_string(  trim(strip_tags($_SESSION['DonHang']['email'])) );
		  $pttt = $this->db->escape_string(  trim(strip_tags($_SESSION['DonHang']['payment'])) );      
		  $ptgh = $this->db->escape_string(  trim(strip_tags($_SESSION['DonHang']['delivery'])) );	
		  
		  //kiểm tra dữ liệu  
		  if (count($_SESSION['daySoLuong'])==0) $error[] = "Bạn chưa chọn sản phẩm nào";
		  if ($hoten == "") $error[] = "Bạn chưa nhập họ tên";
		  if ($diachi == "") $error[] = "Bạn chưa nhập địa chỉ";
		  if ($email == "") $error[] = "Bạn chưa nhập email";
		  if ($dienthoai== "") $error[] = "Bạn ơi! Điện thoại người nhận chưa có";
		  if ($pttt=="") $error[] = "Bạn chưa chọn phương thức thanh toán";
		  if ($ptgh=="") $error[] = "Bạn chưa chọn phương thức giao hàng";
		  if (count($error)>0) return;
		  
		  //lưu dữ liệu vào db    
		  if (isset($_SESSION['DonHang']['idDH'])==false) {
			$sql="INSERT INTO donhang SET tennguoinhan = '$hoten',diachi =
			 '$diachi', dtnguoinhan = '$dienthoai',	idpttt = '$pttt',idptgh=
			 '$ptgh', thoidiemdathang = now() ";
			$kq = $this->db->query($sql);
			if(!$kq) die( $this-> db->error);
			$_SESSION['DonHang']['idDH'] = $this->db->insert_id;
			
		  }else{
			$idDH = $_SESSION['DonHang']['idDH'];
			$sql="UPDATE donhang SET tennguoinhan = '$hoten',diachi= 
			 '$diachi', dtnguoinhan = '$dienthoai', idpttt='$pttt',idptgh=
			 '$ptgh', thoidiemdathang = now() 
			WHERE idDH = $idDH";
			$kq = $this->db->query($sql) ;
			if(!$kq) die( $this-> db->error);
		  }
		  
	} //function LuuDonHang
	function LuuChiTietDonHang(){		
	   $sosp = count($_SESSION['daySoLuong']);
	   if ($sosp<=0) {echo "Không có sản phẩm"; return;}
	   if (isset($_SESSION['DonHang']['idDH'])==false){echo "Không có idDH"; return;}
	   $idDH = $_SESSION['DonHang']['idDH'];
	   $sql = "DELETE FROM donhangchitiet WHERE idDH = $idDH";
	   $this->db->query($sql);
	   reset( $_SESSION['daySoLuong'] ); 
	   reset( $_SESSION['dayDonGia'] );
	   reset( $_SESSION['dayTenDT'] );		
	   for ($i = 0; $i<$sosp ; $i++) {
		   $idDT = key( $_SESSION['daySoLuong'] );
		   $tendt = current( $_SESSION['dayTenDT'] );
		   $soluong = current( $_SESSION['daySoLuong'] );
		   $gia = current( $_SESSION['dayDonGia'] );
		   $sql ="INSERT INTO donhangchitiet (idDH,idDT,TenDT,SoLuong,Gia)
				  VALUES ($idDH, $idDT, '$tendt',$soluong, $gia)";		
		   $this->db->query($sql);
		   next( $_SESSION['daySoLuong'] );  
		 next( $_SESSION['dayDonGia'] );
		   next( $_SESSION['dayTenDT'] );
	   }//for
	}//function LuuChiTietDonHang

	function SanPhamTrongLoai($TenLoai,$pageNum, $pageSize,&$totalRows ){
	   $TenLoai = $this->db->escape_string($TenLoai);
	   $startRow = ($pageNum-1)*$pageSize;
	   $sql="SELECT idDT, TenDT, urlHinh FROM dienthoai  WHERE AnHien = 1
	   AND idLoai in (select idLoai FROM loaisp WHERE TenLoai='$TenLoai') 
	   ORDER BY NgayCapNhat DESC LIMIT $startRow , $pageSize ";	
	   $kq = $this->db-> query($sql);
	   if(!$kq) die( $this-> db->error);	
		
	   $sql="SELECT count(*) FROM dienthoai WHERE AnHien = 1 
	   AND idLoai in (select idLoai FROM loaisp WHERE TenLoai='$TenLoai')";   
	   $rs = $this->db->query($sql) ;	
	   $row_rs = $rs->fetch_row();
	   $totalRows = $row_rs[0];
	   if(!$kq) die( $this-> db->error);	
	
	   return $kq;		
	}
	function pagesList1($baseURL,$totalRows,$pageNum,$pageSize,$offset){
	   if ($totalRows<=0) return "";
	   $totalPages = ceil($totalRows/$pageSize);
	   if ($totalPages<=1) return "";
	   $from = $pageNum - $offset;	
	   $to = $pageNum + $offset;
	   if ($from <=0) { $from = 1;   $to = $offset*2; }
	   if ($to > $totalPages) { $to = $totalPages; }
	   $links = "<ul class='pagination'>";
	   for($j = $from; $j <= $to; $j++) {
	   if ($j==$pageNum) 
	   $links=$links."<li><a href='$baseURL/$j/' class=active>$j</a></li>";
	   else
		  $links= $links."<li><a href = '$baseURL/$j/'>$j</a></li>"; 
	   } //for
	   $links= $links."</ul>";
	   return $links;
	} // function pagesList1
	function layHinhSP($idDT, $sohinh){
	   $sql="SELECT urlHinh FROM hinh  WHERE AnHien = 1 AND
			 idDT=$idDT LIMIT 0, $sohinh";
	   $kq = $this->db->query($sql);
	   if(!$kq) die( $this-> db->error);
	   return $kq;
	}
	function SPCungLoai($idDT){
		$sql="SELECT urlHinh, idDT, TenDT, Gia FROM dienthoai WHERE idLoai IN (SELECT idLoai FROM dienthoai WHERE idDT='$idDT') ORDER BY SoLanXem DESC LIMIT 0,3";
		$kq=$this->db->query($sql);
		if(!$kq) die($this->db->error);
		return $kq;
	}
}//dt
?>
