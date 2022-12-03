<!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
<div data-role="panel" data-title-caption="Daftar Customer" data-collapsible="true" data-title-icon="<span class='mif-chart-line'></span>" class="scroll">

    <div class="container">
        <table class="table striped cell-border row-hover" data-role="table">
            <a class="button outline success mb-3" href="<?= $base_url; ?>customer/create/">Create data</a>
            <thead class=" bg-warning">
                <th>No</th>
                <th>Nama Customer</th>
                <th>Jenis Kelamin</th>
                <th>Tgl Lahir</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Tools</th>
            </thead>
            <?php
            $no = 1;
            foreach ($data['customer'] as $customer) {
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $customer['nmcust']; ?></td>
                    <td><?= $customer['jenkel']; ?></td>
                    <td><?= $customer['tgllahir']; ?></td>
                    <td><?= $customer['alamat']; ?></td>
                    <td><?= $customer['notelp']; ?></td>
                    <td>
                        <a class="btn btn-info rounded-pill" href="<?= $base_url . 'customer/edit/' . $customer['idcust']; ?>">Ubah</a>
                        <a class="btn btn-danger rounded-pill" href="<?= $base_url . 'customer/delete/' . $customer['idcust']; ?>">Hapus</a>
                    </td>
                </tr>
            <?php
                $no++;
            } ?>
        </table>
    </div>
</div>
<!-- nmcust 	jenkel 	tgllahir 	alamat 	notelp -->