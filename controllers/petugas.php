<!-- vpetugas required -->

<?php

if ($aksi == 'index') {
	$data['petugas'] = $db->query($connect, "SELECT * FROM tpetugas");
	$helpers->template('Petugas/listpetugas', $data);
}

if ($aksi == 'create') {
	$helpers->template('Petugas/addpetugas');
}

if ($aksi == 'save') {
	$nmpetugas = $_POST['nmpetugas'];
	$tgllahir = $_POST['tgllahir'];
	$alamat = $_POST['alamat'];
	$notelp = $_POST['notelp'];
	$iduser = $_POST['username'];
	$simpan = $db->qry($connect, "INSERT INTO tpetugas VALUES('', '$nmpetugas', '$tgllahir', '$alamat', '$notelp', '$iduser')");
	if ($simpan)
		header('location:' . $base_url . 'petugas');
	else {
		header('location:' . $base_url . 'petugas/create');
	}
}

if ($aksi == 'edit') {
	$idpetugas = $uri[4];
	$data['petugas'] = $db->query($connect, "SELECT * FROM tpetugas WHERE idpetugas=$idpetugas");
	$helpers->template('Petugas/editpetugas', $data);
}
if ($aksi == 'update') {
	$idpetugas = $uri[4];
	$nmpetugas = $_POST['nmpetugas'];
	$tgllahir = $_POST['tgllahir'];
	$alamat = $_POST['alamat'];
	$notelp = $_POST['notelp'];
	$iduser = $_POST['iduser'];
	$update = $db->qry($connect, "UPDATE tpetugas SET nmpetugas='$nmpetugas', tgllahir='$tgllahir', alamat='$alamat', notelp='$notelp', iduser='$iduser' WHERE idpetugas='$idpetugas'");
	if ($update) {
		# code...
		header('location:' . $base_url . 'petugas');
	} else {
		header('location:' . $base_url . 'petugas/edit/');
	}
}

if ($aksi == 'delete') {
	# code...
	$idpetugas = $uri[4];
	$delete = $db->qry($connect, "DELETE FROM tpetugas WHERE idpetugas='$idpetugas'");
	if ($delete) {
		# code...
		header('location:' . $base_url . 'petugas');
	} else {
		header('location:' . $base_url . 'petugas/delete/');
	}
}
