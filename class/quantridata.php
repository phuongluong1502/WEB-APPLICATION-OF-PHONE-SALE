<?php 
require "../class/gocserver.php";
class quantridata extends goc {
	function thongtinuser($u, $p){
	$u = $this->db->escape_string($u);
	$p = $this->db->escape_string($p);
	$p = md5($p);
	echo $sql="SELECT * FROM users WHERE username='$u' AND password='$p'";
	$kq = $this->db->query($sql);
	if ($kq->num_rows==0) return FALSE;
	else return $kq->fetch_assoc();
}
	function checkLogin() {
    session_start();
    if (isset($_SESSION['login_id'])== false){
          $_SESSION['error'] = 'Bạn chưa đăng nhập';
          $_SESSION['back'] = $_SERVER['REQUEST_URI'];
           header('location:login.php'); 
           exit();
     }elseif ($_SESSION['login_level']!=1){
          $_SESSION['error'] = 'Bạn không có quyền xem trang này';
          $_SESSION['back'] = $_SERVER['REQUEST_URI'];
          header('location:login.php');
          exit();
     }
}//function
}

?>