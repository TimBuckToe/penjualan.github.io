<div data-role="panel" data-title-caption="Daftar Jenis" data-collapsible="true" data-title-icon="<span class='mif-chart-line'></span>" class="scroll">
    <div class="container">
        <h3 class="text-center">Daftar Jenis</h3>
        <a class="button outline success mb-3" href="<?= $base_url; ?>jenis/create/">Create data</a>
        <table class="table striped cell-border row-hover" data-role="table">
            <thead class="bg warning">
                <th>Nomor</th>
                <th>Jenis Barang</th>
                <th>Keterangan</th>
                <th colspan=2>Tools</th>
            </thead>
            <?php
            $no = 1;
            foreach ($data['jenis'] as $jenis) {
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $jenis['jenisbarang'] ?></td>
                    <td><?= $jenis['ket'] ?></td>
                    <td><a href="<?= $base_url . 'jenis/edit/' . $jenis['idjenis'] ?>" class="button info"> Ubah </a>
                        <a href="<?= $base_url . 'jenis/delete/' . $jenis['idjenis'] ?>" onclick="return confirm('yakin?')" class="button alert"> Hapus </a>
                    </td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </table>
    </div>
</div>