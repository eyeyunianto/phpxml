<?php
$xml = simplexml_load_file("database/dosen.xml");
$sxe = new SimpleXMLElement($xml->asXML());
?>
<script language="JavaScript">
   function konfirmasi(nip)
   {
       tanya = confirm('Anda yakin ingin menghapus dosen berNIP '+ nip + '?');
       if (tanya == true) return true;
       else return false;
   }
</script>
<?php
if(isset($_POST['submit'])){
	
	$nip=$_POST['nip'];	
	$nama=$_POST['nama'];
	$query = $sxe->addChild("dosen");
	$query->addChild("nip", ($nip));
	$query->addChild("nama",($nama));
	$sxe->asXML("database/dosen.xml");
}else{
	unset($_POST['submit']);
}
?>

<?php

if(isset($_GET['op'])){
$op=$_GET['op'];
if ($op == "delete")
{
   $nip = $_GET['nip'];
   $rows = count($sxe);
	for($i=0;$i<$rows;$i++){
		if($sxe->dosen[$i]->nip == $nip){
			unset($sxe->dosen[$i]);
			break;
			}
		}
		$sxe->asXML("database/dosen.xml");	
}
}else{
	unset($_GET['op']);
}

?>
<h2 align="center"><font color="#000066">Data Dosen </font></h2>
<hr />
<form action="?page=dosen" method="post">
	<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td>NIP </td>
            <td><input type="text" class="inp-form" name="nip"/></td>
            <td></td>
        </tr>
        <tr>
             <td>Nama </td>
             <td><input type="text" class="inp-form" name="nama"/></td>
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
      <tr><th>Nomor</td><th>nip</td><th>Nama dosen</td><th>Aksi</td></tr>
      <?php
		$rows = count($sxe);
		$no=1;
		for($i=0;$i<$rows;$i++){
		echo " <tr><td align='center'>".$no;echo"&nbsp</td>";
		echo "<td>".($sxe->dosen[$i]->nip);echo"&nbsp</td>";
		echo "<td>".($sxe->dosen[$i]->nama);echo"&nbsp</td>";
		echo "<td>";echo "<a href=udosen.php?nip=".($sxe->dosen[$i]->nip).">EDIT</a>";echo " | " ; echo "<a href=dosen.php?op=delete&nip=".($sxe->dosen[$i]->nip)." onclick=\"return konfirmasi('".($sxe->dosen[$i]->nip)."')\">HAPUS</a>" ;echo"</td>";
		echo '</tr>';
	$no++;
	}
?>
</table>
