<?php
$xml = simplexml_load_file("database/mahasiswa.xml");
$sxe = new SimpleXMLElement($xml->asXML());
?>
<script language="JavaScript">
   function konfirmasi(nim)
   {
       tanya = confirm('Anda yakin ingin menghapus mahasiswa bernim '+ nim + '?');
       if (tanya == true) return true;
       else return false;
   }
</script>
<?php
if(isset($_POST['submit'])){
	
	$nim=$_POST['nim'];	
	$nama=$_POST['nama'];
	$dosenpembimbing=$_POST['dosenpembimbing'];
	$noijazah=$_POST['noijazah'];
	
	//$no_rows = count($sxe);
	$query = $sxe->addChild("mahasiswa");
	$query->addChild("nim", ($nim));
	$query->addChild("nama",($nama));
	$query->addChild("dosenpembimbing",($dosenpembimbing));
	$query->addChild("noijazah",($noijazah));
	$sxe->asXML("database/mahasiswa.xml");
}else{
	unset($_POST['submit']);
}
?>

<?php

if(isset($_GET['op'])){
$op=$_GET['op'];
if ($op == "delete")
{
   $nim = $_GET['nim'];
   $rows = count($sxe);
	for($i=0;$i<$rows;$i++){
		if($sxe->mahasiswa[$i]->nim == $nim){
			unset($sxe->mahasiswa[$i]);
			break;
			}
		}
		$sxe->asXML("database/mahasiswa.xml");	
}
}else{
	unset($_GET['op']);
}

?>
<h2 align="center"><font color="#000066">Data Mahasiswa </font></h2>
<hr />
<form action="?page=mahasiswa" method="post">
	<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td>NIM </td>
            <td><input type="text" class="inp-form" name="nim"/></td>
            <td></td>
        </tr>
        <tr>
             <td>Nama </td>
             <td><input type="text" class="inp-form" name="nama"/></td>
             <td></td>
        </tr>
        <tr>
             <td>Dosen Pembimbing</td>
		     <td><textarea type="text" class="inp-form" name="dosenpembimbing"></textarea></td>
             <td></td>
        </tr>
		<tr>
             <td>No Ijazah</td>
             <td><input type="text" class="inp-form" name="noijazah"/></td>
             <td></td>
        </tr>
        <tr>
             <td>&nbsp;</td>
             <td valign="top"><input type="submit" name="submit" value="Simpan" class="form-submit" />
             <input type="reset" value="Reset" class="form-reset"  />
             </td>
             <td></td>
        </tr>
    </table>
</form>
    <table border="1" width="100%" cellpadding="5" cellspacing="0">
      <tr><th>Nomor</td><th>NIM</td><th>Nama Mahasiswa</td><th>Dosen Pembimbing</td><th>No Ijazah</td><th>Aksi</td></tr>
      <?php
		$rows = count($sxe);
		$no=1;
		for($i=0;$i<$rows;$i++){
		echo " <tr><td align='center'>".$no;echo"&nbsp</td>";
		echo "<td>".($sxe->mahasiswa[$i]->nim);echo"&nbsp</td>";
		echo "<td>".($sxe->mahasiswa[$i]->nama);echo"&nbsp</td>";
		echo "<td>".($sxe->mahasiswa[$i]->dosenpembimbing);echo"&nbsp</td>";
		echo "<td>".($sxe->mahasiswa[$i]->noijazah);echo"&nbsp;</td>";
		echo "<td>";echo "<a href=umahasiswa.php?nim=".($sxe->mahasiswa[$i]->nim).">EDIT</a>";echo " | " ; echo "<a href=mahasiswa.php?op=delete&nim=".($sxe->mahasiswa[$i]->nim)." onclick=\"return konfirmasi('".($sxe->mahasiswa[$i]->nim)."')\">HAPUS</a>" ;echo"</td>";
		echo '</tr>';
	$no++;
	}
?>
</table>
