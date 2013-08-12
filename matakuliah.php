<?php
$xml = simplexml_load_file("database/mahasiswa.xml");
$sxe = new SimpleXMLElement($xml->asXML());
?>
<html>
<head>
<title>Data Mahasiswa</title>
</head>
<body bgcolor=#edefef>
	<h2 align="center"><font color="#000066">Data Mahasiswa</font></h2>
	<hr />
	<a href=imahasiswa.php>Kilik</a>
	<br />
<div id="Menu">
<table border="1" align="center" id="table1" cellspacing="1" cellpadding="1" width="100%">
        <thead>
            <tr>
                <th width="25">No</th>
                <th width="100">NIM</th>
                <th width="150">Nama</th>
                <th width="150">Dosen Pembimbing</th>
                <th width="100">No Ijazah</th>
            </tr>
        </thead>
<?php
$rows = count($sxe);
$no=1;
for($i=0;$i<$rows;$i++){
	echo " <tr><td align='center'>".$no;echo"&nbsp</td>";
	echo "<td>".($sxe->mahasiswa[$i]->nim);echo"&nbsp</td>";
	echo "<td>".($sxe->mahasiswa[$i]->nama);echo"&nbsp</td>";
	echo "<td>".($sxe->mahasiswa[$i]->dosenpembimbing);echo"&nbsp</td>";
	echo "<td>".($sxe->mahasiswa[$i]->noijazah);echo"&nbsp;</td>";
	echo '</tr>';
	$no++;
	}
	?>            
</table>
</div>
</body>
</html>
