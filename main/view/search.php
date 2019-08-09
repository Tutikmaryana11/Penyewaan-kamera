<?php
require_once '../database/connection.php';

$term = trim(strip_tags($_GET['term']));

$qstring = "SELECT * FROM camera where cm_jumlah_ketersediaan > 0 and cm_nama LIKE '".$term."%'";
//query database untuk mengecek tabel anime 
$result = mysql_query($qstring);
 
while ($row = mysql_fetch_array($result))
{
    $row['value']=htmlentities(stripslashes($row['cm_nama'].' (Jumlah Stok '.$row['cm_jumlah_ketersediaan'].')'));
    $row['id']=(int)$row['cm_id'];
//buat array yang nantinya akan di konversi ke json
    $row_set[] = $row;
}
//data hasil query yang dikirim kembali dalam format json
echo json_encode($row_set);
?>