<?php foreach ($data['barang'] as $barang) {
} ?>


<div data-role="panel" data-title-caption="Daftar Jual" data-collapsible="true" data-title-icon="<span class='mif-chart-line'></span>" class="mt-4 scroll">


    <h1></h1>

    <div class="container">
        <table class="table table-border cell-border row-hover" data-role="table">
            <thead>
                <th>Kode Jual</th>
                <th>Tanggal Jual</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Jumlah Barang</th>
                <th>Customer</th>
                <th>Total Harga</th>
                <th>Bayar</th>
                <th>Kembali</th>
                <th>Petugas</th>
            </thead>
            <?php $no = 1;
            foreach ($data['brgjual'] as $bj) {


            ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $bj['tgljual']; ?></td>
                    <td><?= $bj['nmbarang']; ?></td>
                    <td><?= 'Rp. ' . number_format($bj['harga']) ?></td>
                    <td><?= $bj['jmlbarang']; ?></td>
                    <td><?= $bj['nmcust']; ?></td>
                    <td><?= 'Rp. ' . number_format($bj['totalharga']) ?></td>
                    <td><?= 'Rp. ' . number_format($bj['bayar']) ?></td>
                    <td><?= 'Rp. ' . number_format($bj['kembali']) ?></td>
                    <td><?= $bj['nmpetugas']; ?></td>
                <?php
                $no++;
            }
                ?>
                </tr>
        </table>
    </div>

    <!-- idjual tgljual nmbarang jmlbarang nmcust totalharga bayar kembali nmpetugas -->