<?php
session_start();
require_once "class/dt.php";
$dt = new dt;

$action=$_GET['action']; // để biết phải làm gì:thêm/xoá/cập nhật
$idDT=$_GET['idDT'];    // để biết sản phẩm nào mà thêm hay bớt
$dt->CapNhatGioHang($action, $idDT);
print_r($_SESSION['daySoLuong']); echo "<br>";
print_r($_SESSION['dayTenDT']); echo "<br>";
print_r($_SESSION['dayDonGia']); echo "<br>";
if ($action=="remove") header("location:gio-hang/");
if ($action=="update") header("location:gio-hang/");
if ($action='add') header("location:gio-hang/");