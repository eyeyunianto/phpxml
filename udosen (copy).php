<?php
$xml = simplexml_load_file("database/dosen.xml");
$sxe = new SimpleXMLElement($xml->asXML());
?>

<h2 align="center"><font color="#000066">Data Dosen </font></h2>
<hr />
<?php
if(isset($_POST['submit'])){
	$nip = $_POST['nip'];
	$nama=$_POST['nama'];
	$rows = count($sxe);
	for($i=0;$i<$rows;$i++){
		if($sxe->dosen[$i]->nip == $nip){
			$sxe->dosen[$i]->nama=($nama); 
			}
		}
		$sxe->asXML("database/dosen.xml");
		?>Data Berhasil di Update Klik <a href=dosen.php>Kembali</a> untuk melihat hasil
		<?php
}else{
	unset($_POST['submit']);
}
?>

<?php
if(isset($_GET['nip'])){
$nip = $_GET['nip'];
$rows = count($sxe);
for($i=0;$i<$rows;$i++){
	if($sxe->dosen[$i]->nip == $nip){
		?>
<form action="?page=udosen" method="post">
	<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td>NIP </td>
            <td><input readonly="true" type="text" class="inp-form" name="nip" value="<?php echo $sxe->dosen[$i]->nip;?>"/></td>
            <td></td>
        </tr>
        <tr>
             <td>Nama </td>
             <td><input type="text" class="inp-form" name="nama" value="<?php echo $sxe->dosen[$i]->nama;?>"/></td>
             <td></td>
        </tr>
        <tr>
             <td>&nbsp;</td>
             <td valign="top"><input type="submit" name="submit" value="Simpan" class="form-submit" />
             </td>
             <td></td>
        </tr>
    </table>
</form>
<?php }
}
}else{
	unset($_GET['nip']);
}
?>
