<?php

foreach ($data['kdjual'] as $kdjual) {
    if ($kdjual > 0) {
        $no = ((int)$kdjual['kodejual'] + 1);
        $kd = sprintf("%04s", $no);
    } else {
        $kd = 0001;
    }

    date_default_timezone_set('asia/jakarta');
    $kdjual = date('dmy') . $kd;
}



?>


<div data-role="panel" data-title-caption="Tambah Jual" data-collapsible="true" data-title-icon="<span class='mif-chart-line'></span>" class=" scroll">

    <!-- <link rel="stylesheet" href="../assets/css/bootstrap.min.css"> -->

    <div class="container col-md-5  align-content-end">

        <script type="text/javascript">
            function startCalc() {
                interval = setInterval("calc()", 1);
            }

            function calc() {
                harga = document.jual.harga.value;
                qty = document.jual.jmlbarang.value;
                bayar = document.jual.bayar.value;
                total = document.jual.totalharga;
                kembali = document.jual.kembali;
                total.value = (harga * 1) * (qty * 1);
                kembali.value = (bayar * 1) - (total.value * 1);
            }

            function stopCalc() {
                clearInterval(interval);
            }

            var rupiah = document.getElementById("rupiah");
            rupiah.addEventListener("keyup", function(e) {
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                rupiah.value = formatRupiah(this.value, "Rp. ");
            });

            // /* Fungsi formatRupiah */
            // function formatRupiah(angka, prefix) {
            //     var number_string = angka.replace(/[^,\d]/g, "").toString(),
            //         split = number_string.split(","),
            //         sisa = split[0].length % 3,
            //         rupiah = split[0].substr(0, sisa),
            //         ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            //     // tambahkan titik jika yang di input sudah menjadi angka ribuan
            //     if (ribuan) {
            //         separator = sisa ? "." : ""; 
            //         rupiah += separator + ribuan.join(".");
            //     }

            //     rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            //     return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
            // }
        </script>
        <h3 class="text-center">Data Jual</h3>
        <form action="<?= $base_url ?>jual/save" method="post" name="jual">
            <div>
                <label for="" class="form-label">Kode Jual</label>
                <input class="metro-input mb-1" type="number" name="idjual" id="" value="<?= $kdjual ?>" readonly>
            </div>
            <div>
                <label for="" class="form-label">Tanggal Transaksi</label>
                <input class="metro-input mb-1" type="date" name="tgljual" id="">
            </div>
            <div>
                <label for="" class="form-label">Nama Barang</label>
                <?php foreach ($data['barang'] as $barang) {
                } ?>
                <select name="idbarang" id="" class="metro-input">
                    <option value="<?= $barang['idbarang'] ?>"><?= $barang['nmbarang'] ?></option>
                </select>
            </div>
            <div>
                <label for="" class="form-label">Harga Barang</label>
                <input type="text" name="harga" value="<?= $barang['harga'] ?>" readonly class="metro-input">
            </div>
            <div>
                <label for="" class=" form-label">Qty</label>
                <input class="metro-input mb-1" name="jmlbarang" id="" value="" onfocus="startCalc()" onblur="stopCalc()" placeholder="" data-role="spinner" data-min-value="0">
            </div>
            <div>
                <label for="" class="form-label">Customer</label>
                <select class="metro-input" name="idcust" id="">
                    <?php
                    foreach ($data['cust'] as $cust) {

                    ?>
                        <option value="<?= $cust['idcust'] ?>" required><?= $cust['nmcust'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <label for="" class="form-label">Total Harga</label>
                <input class="metro-input mb-1" type="number" name="totalharga" id="rupiah" value="" onfocus="startCalc()" onblur="stopCalc()" placeholder="Rp.xxxxxxx" readonly>
            </div>
            <div>
                <label for="" class="form-label">Bayar</label>
                <input class="metro-input mb-1" type="number" name="bayar" id="" value="" onfocus="startCalc()" onblur="stopCalc()" placeholder="Rp.xxxxxxx" required>
            </div>
            <div>
                <label for="" class="form-label">Kembalian</label>
                <input class="metro-input mb-3" type="number" name="kembali" id="" value="" onfocus="startCalc()" onblur="stopCalc()" placeholder="Rp.xxxxxxx" readonly>
            </div>
            <div>
                <label for="" class="form-label">Petugas</label>
                <select class="metro-input" name="idpetugas" id="">
                    <?php
                    foreach ($data['petugas'] as $petugas) {

                    ?>
                        <option value="<?= $petugas['idpetugas'] ?>" required><?= $petugas['nmpetugas'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="d-flex justify-content-end">
                <button class="button otline primary text-light me-2" type="submit">Bayar</button>
                <button class="button otline info text-light" type="reset">Batal</button>
            </div>
        </form>
    </div>
</div>