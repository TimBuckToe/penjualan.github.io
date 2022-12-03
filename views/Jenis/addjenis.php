<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<div class="container">

    <caption>
        <h1 class="text-center">Data jenis</h1>
    </caption>
    <form class="justify-content-center align-items-center" action="<?= $base_url ?>jenis/save/" method="post">
        <label class="form-label" for="">Jenis Barang</label>
        <input class="metro-input" type="text" name="jenisbarang" id="" placeholder="Jenis Barang" required>
        <label class="form-label" for="">Keterangan</label>
        <input class="metro-input mb-3" type="text" name="ket" id="" placeholder="Keterangan" required>
        <button type="submit" class="button primary rounded-pill">Simpan</button>
        <button type="reset" class="button alert  rounded-pill">Batal</button>
        <!-- <button type="reset" href="<?= $base_url; ?> jenis/create" class="button alert rounded-pill">Back</button> -->

    </form>
</div>