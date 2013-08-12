<!DOCTYPE html >
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Menu</title>
	<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script>
	$(document).ready(function () {
		$('#accordion a.item').click(function () {
			//slideup or hide all the Submenu
			$('#accordion li').children('ul').slideUp('fast');	
			//remove all the "Over" class, so that the arrow reset to default
			$('#accordion a.item').each(function () {
				if ($(this).attr('rel')!='') {
					$(this).removeClass($(this).attr('rel') + 'Over');	
				}
			});
			//show the selected submenu
			$(this).siblings('ul').slideDown('fast');
			//add "Over" class, so that the arrow pointing down
			$(this).addClass($(this).attr('rel') + 'Over');			
			return false;
		});
	});
	</script>
	<style>
	/* First Level UL List */
	#accordion {
		margin:0;
		padding:0;	
		list-style:none;
	}
		#accordion li {
			width:267px;
		}
		#accordion li a {
			display: block;
			width: 268px;
			height: 43px;	
			text-indent:-999em;
			outline:none;
		}
		/* Using CSS Sprite for menu item */
		#accordion li a.master {
			background:url(menu.png) no-repeat 0 0;	
		}
		#accordion li a.master:hover, .masterOver {
			background:url(menu.png) no-repeat -268px 0 !important;	
		}
		#accordion li a.transaksi {
			background:url(menu.png) no-repeat 0 -43px;	
		}
		#accordion li a.transaksi:hover, .transaksiOver {
			background:url(menu.png) no-repeat -268px -43px !important;	
		}
		#accordion li a.tentang {
			background:url(menu.png) no-repeat 0 -86px;	
		}
		#accordion li a.tentang:hover, .tentangOver {
			background:url(menu.png) no-repeat -268px -86px !important;	
		}
		/* Second Level UL List*/
		#accordion ul {
			background:url(bg.gif) repeat-y 0 0;
			width:268px;
			margin:0;
			padding:0;
			display:none;	
		}
			#accordion ul li {
				height:30px;
			}
			/* styling of submenu item */
			#accordion ul li a {
				width:240px;
				height:25px;
				margin-left:15px;
				padding-top:5px;
				border-bottom: 1px dotted #777;
				text-indent:0;
				color:#ccc;
				text-decoration:none;
			}
			/* remove border bottom of the last item */
			#accordion ul li a.last {
				border-bottom: none;
			}		
	</style>
</head>
<body bgcolor=#edefef>
<br/><br/><br/>
<ul id="accordion">
	<li>
		<a href="#" class="item master" rel="master">Master Data</a>
		<ul>
			<li><a href="mahasiswa.php" target=utama>Data Mahasiswa</a></li>
			<li><a href="dosen.php" target=utama>Data Dosen</a></li>
			<li><a href="matakuliah/index.php" target=utama class="last">Data Matakuliah</a></li>
		</ul>
	</li>
	<li>
		<a href="#" class="item transaksi" rel="transaksi">transaksi</a>
		<ul>
			<li><a href="#">transaksi 1</a></li>
			<li><a href="#">transaksi 2</a></li>
			<li><a href="#" class="last">transaksi 3</a></li>
		</ul>
	</li>
	<li>
		<a href="#" class="item tentang" rel="tentang">Recent tentang</a>
		<ul>
			<li><a href="#">tentang 1</a></li>
			<li><a href="#">tentang 2</a></li>
			<li><a href="#" class="last">tentang 3</a></li>
		</ul>
	</li>
	
</ul>
</body>
</html>
