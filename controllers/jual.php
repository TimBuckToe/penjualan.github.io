<!-- vjual  required -->

<?php

if ($aksi == 'index') {
    $data['brgjual'] = $db->query($connect, "SELECT * FROM vjual");
    $data['barang'] = $db->query($connect, "SELECT * FROM tbarang");
    $helpers->template('Jual/jual', $data);
}
if ($aksi == 'create') {
    $idbarang = $uri[4];
    $data['kdjual'] = $db->query($connect, "SELECT max(right(idjual,4)) AS kodejual FROM tjual");
    $data['barang'] = $db->query($connect, "SELECT * FROM vbarang WHERE idbarang=$idbarang");
    $data['cust'] = $db->query($connect, "SELECT * FROM tcustomer");
    $data['petugas'] = $db->query($connect, "SELECT * FROM tpetugas");
    $helpers->template('Jual/addjual', $data);
}

if ($aksi == 'save') {
    $idjual = $_POST['idjual'];
    $tgljual = $_POST['tgljual'];
    $idbarang = $_POST['idbarang'];
    $harga = $_POST['harga'];
    $jmlbarang = $_POST['jmlbarang'];
    $idcust = $_POST['idcust'];
    $totalharga = $_POST['totalharga'];
    $bayar = $_POST['bayar'];
    $kembali = $_POST['kembali'];
    $idpetugas = $_POST['idpetugas'];
    $simpan = $db->qry($connect, "INSERT INTO tjual VALUES('$idjual','$tgljual','$idbarang','$harga','$jmlbarang','$idcust','$totalharga','$bayar','$kembali', '$idpetugas')");
    if ($simpan)
        header('location:' . $base_url . 'jual');
    else {
        header('location:' . $base_url . 'jual/create');
    }
}

?>

<!-- idjual tgljual idbarang jmlbarang idcust totalharga bayar kembali idpetugas -->