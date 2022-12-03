<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<div data-role="panel" data-title-caption="Daftar Distributor" data-collapsible="true" data-title-icon="<span class='mif-chart-line'></span>" class="mt-6"> 
<div class="container">

    <table class="table table-striped cell-border row-hover">
        <h1 class="text-center">Daftar Distributor</h1>
        <a class="button outline success mb-3" href="<?= $base_url; ?>distributor/create/"> + Create data</a>
        <thead class="bg-info">
            <th>Nomor</th>
            <th>Nama Distributor</th>
            <th>Alamat</th>
            <th>No telepon</th>
            <th colspan=4>Tools</th>
        </thead>
        <?php
        $no = 1;
        foreach ($data['distri'] as $distri) {
        ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $distri['nmdist'] ?></td>
                <td><?= $distri['alamat'] ?></td>
                <td><?= $distri['notelp'] ?></td>
                <td><a class="button primary" href="<?= $base_url . 'distributor/edit/' . $distri['iddist'] ?>"> Edit</a></td>
                <td><a class="button alert" href="<?= $base_url . 'distributor/delete/' . $distri['iddist'] ?>">Delete</a></td>
            </tr>
        <?php
            $no++;
        }
        ?>
    </table>

</div>