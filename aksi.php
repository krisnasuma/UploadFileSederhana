<!DOCTYPE html> 
<html> 
<head> 
<title>Upload</title> 
</head> 
<body> 
<h1>Silakan Upload File<br/>Uji Coba</h1> 

<?php  
include 'koneksi.php'; 
if($_POST['upload']){ 
$ekstensi_diperbolehkan = array('pdf'); 
$nama = $_FILES['file']['name']; 
$x = explode('.', $nama); 
$ekstensi = strtolower(end($x)); 
$ukuran = $_FILES['file']['size']; 
$file_tmp = $_FILES['file']['tmp_name'];  
  
if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){ 
if($ukuran < 1044070){  
move_uploaded_file($file_tmp, 'file'.$nama); 
$query = mysqli_query($connection,"INSERT INTO upload VALUES(NULL, '$nama')"); 
if($query){ 
echo 'FILE BERHASIL DI UPLOAD'; 
}else{ 
echo 'GAGAL MENGUPLOAD File'; 
} 
}else{ 
echo 'UKURAN FILE TERLALU BESAR'; 
} 
}else{ 
echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN'; 
} 
} 
?> 
  
<br/> 
<br/> 
<a href="index.php">Upload Lagi</a> 
<br/> 
<br/> 
  
<table> 
<?php  
$data = mysqli_query($connection,"select * from upload"); 
while($d = mysqli_fetch_array($data)){ 
?> 
<tr> 
<td> 
<img src="<?php echo "file".$d['nama_file']; ?>"> 
</td>  
</tr> 
<?php } ?> 
</table> 

</body> 
</html> 