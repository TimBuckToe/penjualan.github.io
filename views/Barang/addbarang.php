<?php

foreach ($data['kdbarang'] as $kdbarang) {
    # code...
    $kodebarang = $kdbarang['kodebarang'];
    $urutan = (int)substr($kodebarang, 4, 4);
    $urutan++;
    $kode = "2022";
    $kodebarang = $kode . sprintf("%04s", $urutan);
}

?>

<div class="container">
    <caption>
        <h3 class="text-center">Tambah Barang</h3>
    </caption>
    <form class="justify-content-center align-items-center" action="<?= $base_url ?>barang/save" method="post">
        <div>
            <label class="form-label" for="">Id Barang</label>
            <input class="metro-input mb-3" type="text" name="idbarang" id="" value="<?= $kodebarang ?>" readonly>
        </div>
        <div>
            <label class="form-label" for="">Nama Barang</label>
            <input class="metro-input mb-3" type="text" name="nmbarang" id="" placeholder="Nama Barang" required>
        </div>
        <div>
            <label class="form-label" for="">Jenis Barang</label>
            <select class="metro-input mb-3" name="idjenis" id="">
                <option value="">Pilih</option>
                <?php
                foreach ($data['jenis'] as $jenis) {
                ?>
                    <option value="<?= $jenis['idjenis'] ?>"><?= $jenis['jenisbarang'] ?></option>
                <?php }  ?>
            </select>
        </div>
        <div>
            <label class="form-label" for="">Stok Barang</label>
            <input class="metro-input mb-3" name="stok" type="text" placeholder="Stok Barang" required>
        </div>
        <div>
            <label class="form-label" for="">Harga Barang</label>
            <input class="metro-input mb-3" type="text" name="harga" id="" placeholder="Harga Barang" value="" required>
        </div>
        <div>
            <label class="form-label" for="">Pengirim</label>
            <select class="metro-input mb-3" name="iddist" id="">
                <option value="">Pilih</option>
                <?php
                foreach ($data['distri'] as $distri) {
                ?>
                    <option value="<?= $distri['iddist'] ?>"><?= $distri['nmdist'] ?></option>
                <?php }  ?>
            </select>
        </div>
        <div>
            <button type="submit" class="button info rounded-pill  mb-1">Simpan</button>
            <button type="reset" class="button alert rounded-pill  mb-1">Batal</button>
        </div>
    </form>
</div>