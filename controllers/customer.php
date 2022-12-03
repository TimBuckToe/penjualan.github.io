<?php

if ($aksi == 'index') {
    $data['customer'] = $db->query($connect, "SELECT * FROM tcustomer");
    $helpers->template('Customer/listcustomer', $data);
}

if ($aksi == 'create') {
    $helpers->template('Customer/addcustomer');
}

if ($aksi == 'save') {
    $nmcust = $_POST['nmcust'];
    $jenkel = $_POST['jenkel'];
    $tgllahir = $_POST['tgllahir'];
    $alamat = $_POST['alamat'];
    $notelp = $_POST['notelp'];
    $status = 1;
    $simpan = $db->qry($connect, "INSERT INTO tcustomer VALUES('', '$nmcust', '$jenkel', '$tgllahir', '$alamat', '$notelp', '$status') ");
    if ($simpan) {
        header('location:' . $base_url . 'customer');
    } else {
        header(('location:' . $base_url . 'customer/create'));
    }
}

if ($aksi == 'edit') {
    $idcustomer = $uri[4];
    $data['customer'] = $db->query($connect, "SELECT * FROM tcustomer WHERE idcust=$idcustomer");
    $data['jenkel'] = $db->query($connect, "SELECT * FROM tcustomer");

    $helpers->template('Customer/editcustomer', $data);
}

if ($aksi == 'update') {
    $idcustomer = $uri[4];
    $nmcust = $_POST['nmcust'];
    $jenkel = $_POST['jenkel'];
    $tgllahir = $_POST['tgllahir'];
    $alamat = $_POST['alamat'];
    $notelp = $_POST['notelp'];
    $update = $db->qry($connect, "UPDATE tcustomer SET nmcust='$nmcust', jenkel='$jenkel', tgllahir='$tgllahir', alamat='$alamat', notelp='$notelp' WHERE idcust='$idcustomer' ");
    if ($update) {
        header('location:' . $base_url . 'customer');
    } else {
        header('location:' . $base_url . 'customer/edit');
    }
}

if ($aksi == 'delete') {
    $idcustomer = $uri[4];
    $delete = $db->qry($connect, "DELETE FROM tcustomer WHERE idcust='$idcustomer'");
    if ($delete) {
        # code...
        header('location:' . $base_url . 'customer');
    } else {
        header('location:' . $base_url . 'customer/delete');
    }
}

// nmcust 	jenkel 	tgllahir 	alamat 	notelp