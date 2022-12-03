<!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
<div data-role="panel" data-title-caption="Daftar Barang" data-collapsible="true" data-title-icon="<span class='mif-chart-line'></span>" class="mt-4">

    <div class="container">

        <a href="<?= $base_url ?>petugas/create" class="button success rounded-pill">Tambah Petugas</a>
        <table class="table striped cell-border row-hover">
            <thead class="bg-danger">
                <th>No Petugas</th>
                <th>Nama Petugas</th>
                <th>Tgl lahir Petugas</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Username</th>
                <th colspan=2>Tools</th>
            </thead>
            <?php
            $no = 1;
            foreach ($data['petugas'] as $petugas) {
            ?>
                <tbody>
                    <td><?= $no ?></td>
                    <td><?= $petugas['nmpetugas'] ?></td>
                    <td><?= $petugas['tgllahir'] ?></td>
                    <td><?= $petugas['alamat'] ?></td>
                    <td><?= $petugas['notelp'] ?></td>
                    <td><?= $petugas['username'] ?></td>
                    <td><a href="<?= $base_url . 'petugas/edit/' . $petugas['idpetugas'] ?>"> Ubah</a></td>
                    <td><a href="<?= $base_url . 'petugas/delete/' . $petugas['idpetugas'] ?>">Hapus</a></td>
                </tbody>
            <?php
                $no++;
            }
            ?>
        </table>

    </div>
</div>
<!-- 
idpetugas 	nmpetugas 	tgllahir 	alamat 	notelp 	iduser -->