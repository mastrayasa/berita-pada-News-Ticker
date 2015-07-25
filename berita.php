<!DOCTYPE html>
<html>
<head>
	<title>Berita</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="header">
	<h1>Portal Berita Maju Mundur</h1>
	<p>bisa dipercaya dan sangat lugas dalam membahas berita</p>
</div>
<?php 

# MEMBUAT KONEKSI KE DATABASE
mysql_connect('localhost',"root",'');
mysql_select_db('db_news');


# MENGAMBIL DATA DARI DATABASE MYSQL
$berita = mysql_query("SELECT * FROM berita ORDER BY id_berita DESC");

# MENAMPILKAN DATA YG SUDAH DIAMBIL
while( $data = mysql_fetch_array($berita)){
	echo '
		<div class="post">
		<h2>'.$data['judul'].'</h2>
		<p>'.$data['isi'].'</p>
		</div>
		';
}

?>
<hr />
	
<center>
	<p>&copy; <span style="color:#f00">Sibang</span>Studio<small>.com</small> 2015</p>
</center>
	
</body>
</html>