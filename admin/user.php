<?php

require_once 'koneksi.php';
?>
<style type="text/css">
    .td {
        font-size: 14px;
    }

    .th {
        font-size: 15px;
    }
</style>
<h1 class="m-0 font-weight-bold text-primary" style="text-align: center;">User</h1>
<div class="card shadow mb-4">
    <div class="card-header">
        <div class="row justify-content-end">
            <a href="index.php?page=tambah-user" class="btn btn-primary "><i class="fas fa-user-plus"></i> Admin</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th style="width: 15%; text-align:center;"><i class="fas fa-cog"></i></th>
                    </tr>
                </thead>
                <?php

                $sql = mysqli_query($koneksi, "SELECT * FROM admin");
                while ($data = mysqli_fetch_assoc($sql)) {
                ?>
                    <tbody>
                        <tr>
                            <td><?= $data['username'] ?></td>
                            <td><?= $data['fullname'] ?></td>
                            <td>
                                <a href="index.php?page=ubah-user&id=<?= $data['user_id'] ?>" class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                                <a href="" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a>

                            </td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
</div>