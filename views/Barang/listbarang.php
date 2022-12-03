<div data-role="panel" data-title-caption="Daftar Barang" data-collapsible="true" data-title-icon="<span class='mif-chart-line'></span>" class="mt-4">

    <div class="container">

        <table class="table table-border cell-border row-hover" data-role="table">
            <a class="button outline info mb-2" href="<?= $base_url; ?>barang/create/">Create data</a>

            <thead class="bg-alert">
                <th>Id Barang</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Pengirim</th>
                <th>Status</th>
                <th colspan=2>Tools</th>
            </thead>
            <?php
            $no = 1;
            foreach ($data['barang'] as $barang) {
            ?>
                <tr>
                    <td><?= $barang['idbarang'] ?></td>
                    <td><?= $barang['nmbarang'] ?></td>
                    <td><?= $barang['jenisbarang'] ?></td>
                    <td><?= $barang['stok'] ?></td>
                    <td><?= 'Rp ' . number_format($barang['harga'], 0, '.', '.') ?></td>
                    <td><?= $barang['nmdist'] ?></td>
                    <?php
                    if ($barang['status'] == 1) {
                        if ($barang['stok'] >= 1) {
                            $status = 'Ready';
                        } else {
                            $status = 'Sold Out';
                        }
                    } ?>
                    <td><?= $status; ?></td>
                    <td>

                        <a href="<?= $base_url . 'jual/create/' . $barang['idbarang'] ?>" class="button info"> Beli</a>
                        <a href="<?= $base_url . 'barang/edit/' . $barang['idbarang'] ?>" class="button warning"> Ubah</a>
                        <a href="<?= $base_url . 'barang/delete/' . $barang['idbarang'] ?>" class="button alert">Hapus</a>
                    </td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </table>

    </div>
</div>