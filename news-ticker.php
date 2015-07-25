<?php 

# MEMBUAT KONEKSI KE DATABASE
mysql_connect('localhost',"root",'');
mysql_select_db('db_news');

?>
<!DOCTYPE html>
<html>
<head>
	<title>News Ticker</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link href="jquery_news_ticker/styles/ticker-style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="jquery-1.6.2.min.js"></script> 
	<script type="text/javascript" src="jquery_news_ticker/includes/jquery.ticker.js"></script>
	<script type="text/javascript">
		$(function () {
		// start the ticker 
		
		/* $('#js-news').ticker(); */
		
		$('#js-news').ticker({
			speed: 0.10,           // The speed of the reveal
			ajaxFeed: false,       // Populate jQuery News Ticker via a feed
			feedUrl: false,        // The URL of the feed
							   // MUST BE ON THE SAME DOMAIN AS THE TICKER
			feedType: 'xml',       // Currently only XML
			htmlFeed: true,        // Populate jQuery News Ticker via HTML
			debugMode: true,       // Show some helpful errors in the console or as alerts
							   // SHOULD BE SET TO FALSE FOR PRODUCTION SITES!
			controls: true,        // Whether or not to show the jQuery News Ticker controls
			titleText: 'Berita Terbaru',   // To remove the title set this to an empty String
			displayType: 'reveal', // Animation type - current options are 'reveal' or 'fade'
			direction: 'ltr',       // Ticker direction - current options are 'ltr' or 'rtl'
			pauseOnItems: 2000,    // The pause on a news item before being replaced
			fadeInSpeed: 600,      // Speed of fade in animation
			fadeOutSpeed: 300      // Speed of fade out animation
		});
		
	});
	</script>
</head>

<body>

	<div class="header">
		<h1>Portal Berita Maju Mundur</h1>
		<p>bisa dipercaya dan sangat lugas dalam membahas berita</p>
	</div>
	
	<ul id="js-news" class="js-hidden">
	<?php 
		
		# MENGAMBIL DATA DARI DATABASE MYSQL
		$berita = mysql_query("SELECT * FROM berita ORDER BY id_berita DESC");
		
		# MENAMPILKAN DATA YG SUDAH DIAMBIL
		while( $data = mysql_fetch_array($berita)){
			echo '<li class="news-item">'.$data['judul'].'</li>';
		}
	
	?>
	</ul>
	
	<hr />
	
	<center>
		<p>&copy; <span style="color:#f00">Sibang</span>Studio<small>.com</small> 2015</p>
	</center>
	
</body>
</html>