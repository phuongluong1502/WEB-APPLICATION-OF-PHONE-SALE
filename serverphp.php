<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php /* // dữ liệu được gửi từ client cho server
$x =  $_GET['value'];
echo "Giá trị từ trang test-1 truyền qua là:" .$x;
$handle = fopen('filedata.txt','a'); // Lưu dữ liệu vào một file txt
fwrite($handle,$x);
fwrite($handle,"\r\n");
fclose($handle);*/
?>
<?php
	include 'connectdatabase.php';
	$line = explode('--',$_GET['value']);
	$data = join('\',\'', $line);
	$sql="INSERT INTO `collect_data`(`IP`, `LOCATION`, `USERAGENT`, `DEVICE`,`COOKIES_DAY`,`COOKIES_YEAR`,`REF`,`DATE`,`SESSION`) VALUES ('$data')";
	$kq = $db ->query($sql);
?>
<?php
/*
	include 'connectdatabase.php';	
	$str=file("filedata.txt");
	//dem log
	$cnt=count($str);
	//dem sql
	$sql="SELECT count(1) from collect_data";
	$kq = $db->query($sql);
	$res=$kq->fetch_row();
	$cntSql=$res[0]; // Số dòng trong database
	//so sanh count(filelog) vs table collect_data nếu như trong table < thi chay dong for
	for($i=$cntSql;$i<$cnt;$i++){
		$line=explode('--',$str[$i]);
		$data=join('\',\'', $line);
	//thêm dữ liệu vào trong database table log_file
	$sql="INSERT INTO `collect_data`(`IP`, `TIME`, `LOCATION`, `Browser`, `OS`, `DEVICE`,`COOKIES_DAY`,`COOKIES_YEAR`,`REF`,`DATE`) VALUES ('$data')";
	$kq = $db ->query($sql);
	}
	*/
?>
</body>
</html>