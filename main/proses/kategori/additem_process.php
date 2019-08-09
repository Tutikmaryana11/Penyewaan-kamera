<?php

$nama = addslashes(strip_tags ($_POST['kategori_nama']));

$qry = "INSERT INTO kategori (kategori_nama) VALUES ('$nama')";
$qry2 = mysql_query($qry);


if ($qry2) {
    echo "<script>document.location.href='index.php?view=kategori&status=success';</script>";
}
else {
    echo "<script>document.location.href='index.php?view=kategori&status=failInsert';</script>";
}

?>