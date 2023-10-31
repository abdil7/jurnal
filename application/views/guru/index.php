<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Guru</h1>

    <?= $this->session->flashdata('message'); ?>


    <div class="row">
        <div class="col-md">

            <a class="btn btn-dark mb-3 ml-2" href="<?= base_url('auth/registration'); ?>">Bikin Akun Baru!!</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Guru</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($guru as $g) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $g['name'] ?></td>
                            <td><?= $g['username'] ?></td>
                            <td><?= $g['password'] ?></td>
                            <td>
                                <a href="<?= base_url('guru/hapusGuru/'); ?><?= $g['id']; ?>" class="badge badge-danger" onclick="return confirm('yakin hapus niee?');">delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->