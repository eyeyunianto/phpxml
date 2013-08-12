<html >
<head>
<title>Main Page</title>
<style>
table{font-family:arial;font-size:10pt}
a{color:#990000;text-decoration:none}
a:hover{text-decoration:underline}
a.beli{background-color:orange;color:white;text-decoration:none}
a.beli:hover{background-color:#75923C;color:white;text-decoration:none}
.tombollanjut{border:black 1px solid; padding:1}
.ukuran{font-size:10px}
.keranjang{border-bottom:#75923C 1px solid}
</style>
<style type="text/css">
</style>
</head>
<script src="js/jquery-1.3.1.min.js"></script>
<script type="text/javascript">
function slideSwitch() {
    var $active = $('#slideshow DIV.active');
    if ( $active.length == 0 ) $active = $('#slideshow DIV:last');
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow DIV:first');

    $active.addClass('last-active');
    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1100, function() {
            $active.removeClass('active last-active');
        });
}
$(function() {
    setInterval( "slideSwitch()", 6000 );
});
</script>

<!-- Sesuaikan style dengan desain halaman anda -->
<style type="text/css">
#slideshow {
    position:relative;
    height:200px;
	padding:0px;
	margin:10px 0 -30px 0;
}

#slideshow DIV {
    position:absolute;
    top:0;
    left:0;
    z-index:8;
    opacity:0.0;
    height: 200px;
    background-color: #edefef;
	padding:0px;
	margin:0px;
}

#slideshow DIV.active {
    z-index:10;
    opacity:1.0;
}

#slideshow DIV.last-active {
    z-index:9;
}

#slideshow DIV IMG {
    height: 200px;
    display: block;
    border: 0;
    margin-bottom: 0px;
}
</style>
<body bgcolor=#edefef>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="27%" rowspan="21">
<div id="slideshow">
    <!-- Tambahkan gambar2 slide show disini -->
    <div class="active" ><img src="images/gb31.png" /></div>
    <div><img src="images/gb32.png" /></div>
    <div><img src="images/gb33.png" /></div>
    <div><img src="images/gb34.png" /></div>
</div>
</td>
<td height="19">&nbsp;</td>
</tr>
<tr>
  <td width="73%"><h1 align="center"><blink>Sistem Informasi Penjadwalan</blink></h1><br>
  <strong><h2 align="center">PHP, Javascript, CSS, XML</h2></strong></td>
<td class="style4">
</tr>
</table>
</body>
</html> 

