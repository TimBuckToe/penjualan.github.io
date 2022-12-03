<?php
if ($aksi == 'index') {
    $data['jenis'] = $db->query($connect, "SELECT * FROM tjenis");
    $helpers->template('jenis/listjenis', $data);
}
if ($aksi == 'create') {
    $helpers->template('jenis/addjenis');
}
if ($aksi == 'save') {
    $jenisbarang = $_POST['jenisbarang'];
    $ket = $_POST['ket'];
    $simpan = $db->qry($connect, "INSERT INTO tjenis VALUES('', '$jenisbarang', '$ket')");
    if ($simpan)
        header('location:' . $base_url . 'jenis');
    else {
        header('location:' . $base_url . 'jenis/create');
    }
}
if ($aksi == 'edit') {
    $idjenis = $uri[4];
    $data['jenis'] = $db->query($connect, "SELECT * FROM tjenis WHERE idjenis=$idjenis");
    $helpers->template('Jenis/editjenis', $data);
}
if ($aksi == 'update') {
    # code...
    $idjenis = $uri[4];
    $jenisbarang = $_POST['jenisbarang'];
    $ket = $_POST['ket'];
    $update = $db->qry($connect, "UPDATE tjenis SET jenisbarang='$jenisbarang', ket='$ket' WHERE idjenis='$idjenis' ");
    if ($update) {
        # code...
        header('location:' . $base_url . 'jenis');
    } else {
        header('location:' . $base_url . 'jenis/edit/');
    }
}
if ($aksi == 'delete') {
    # code...
    $idjenis = $uri[4];
    $delete = $db->qry($connect, "DELETE FROM tjenis WHERE idjenis='$idjenis'");
    if ($delete) {
        # code...
        header('location:' . $base_url . 'jenis');
    } else {
        header('location:' . $base_url . 'jenis/delete');
    }
}
