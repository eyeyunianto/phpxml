<?php
$xml = simplexml_load_file("database/mahasiswa.xml");
$sxe = new SimpleXMLElement($xml->asXML());
?>
<div id="page-heading">
<h2 align="center"><font color="#000066">Data Mahasiswa </font></h2>
</div>
<hr />
<?php
if(isset($_POST['submit'])){
	$nim = $_POST['nim'];
	$nama=$_POST['nama'];
	$dosenpembimbing=$_POST['dosenpembimbing'];
	$noijazah=$_POST['noijazah'];
	$rows = count($sxe);
	for($i=0;$i<$rows;$i++){
		if($sxe->mahasiswa[$i]->nim == $nim){
			$sxe->mahasiswa[$i]->nama=($nama); 
			$sxe->mahasiswa[$i]->dosenpembimbing=($dosenpembimbing);
			$sxe->mahasiswa[$i]->noijazah=($noijazah);
			}
		}
		$sxe->asXML("database/mahasiswa.xml");
		?>Data Berhasil di Update Klik <a href=mahasiswa.php>Kembali</a> untuk melihat hasil
		<?php
}else{
	unset($_POST['submit']);
}
?>

<?php
if(isset($_GET['nim'])){
$nim = $_GET['nim'];
$rows = count($sxe);
for($i=0;$i<$rows;$i++){
	if($sxe->mahasiswa[$i]->nim == $nim){
		?>
<form action="?page=umahasiswa" method="post">
	<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td>NIM </td>
            <td><input type="text" readonly="true" class="inp-form" name="nim" value="<?php echo $sxe->mahasiswa[$i]->nim;?>"/></td>
            <td></td>
        </tr>
        <tr>
             <td>Nama </td>
             <td><input type="text" class="inp-form" name="nama" value="<?php echo $sxe->mahasiswa[$i]->nama;?>"/></td>
             <td></td>
        </tr>
        <tr>
             <td>Dosen Pembimbing</td>
		     <td><textarea type="text" class="inp-form" name="dosenpembimbing" ><?php echo $sxe->mahasiswa[$i]->dosenpembimbing;?></textarea></td>
             <td></td>
        </tr>
		<tr>
             <td>No Ijazah</td>
             <td><input type="text" class="inp-form" name="noijazah" value="<?php echo $sxe->mahasiswa[$i]->noijazah;?>"/></td>
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
<?php }
}
}else{
	unset($_GET['nim']);
}
?>
