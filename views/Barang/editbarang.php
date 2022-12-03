<?php


foreach ($data['barang'] as $edit) {
}

?>

<link rel="stylesheet" href="<?= $base_url ?>/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= $base_url ?>/assets/css/style.css">
<div class="container">
    <caption>
        <h1 class="h1 text-center">Edit Barang</h1>
    </caption>
    <form class="justify-content-center align-items-center" action="<?= $base_url . 'barang/update/' . $edit['idbarang'] ?>" method="post">
        <div>
            <label class="form-label" for="">Id Barang</label>
            <input class="form-control mb-3" type="text" name="idbarang" id="" value="<?= $edit['idbarang'] ?>" readonly>
        </div>
        <div>
            <label class="form-label" for="">Nama Barang</label>
            <input class="form-control mb-3" type="text" name="nmbarang" id="" placeholder="Nama Barang" value="<?= $edit['nmbarang'] ?>">
        </div>
        <div>
            <label class="form-label" for="">Jenis Barang</label>
            <input type="text" class="metro-input" name="idjenis" value="<?= $edit['jenisbarang'] ?>" placeholder="" readonly>
        </div>
        <div>
            <label class="form-label" for="">Stok Barang</label>
            <input class="form-control" name="stok" type="number" placeholder="Stok Barang" value="<?= $edit['stok'] ?>">
        </div>
        <div>
            <label class="form-label" for="">Harga Barang</label>
            <input class="form-control" type="text" name="harga" id="" placeholder="Harga Barang" value="<?= $edit['harga'] ?>">
        </div>
        <div>
            <label class="form-label" for="">Pengirim</label>
            <input type="text" class="metro-input" name="iddist" value="<?= $edit['nmdist'] ?>" readonly>


        </div>
        <div>
            <button type="submit" class="btn btn-success rounded-pill  mb-1">Simpan</button>
            <button type="reset" class="btn btn-danger rounded-pill  mb-1">Batal</button>
        </div>
    </form>
</div>