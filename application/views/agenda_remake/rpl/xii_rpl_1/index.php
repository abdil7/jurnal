<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?php if(validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>

    <?= $this->session->flashdata('message'); ?>

    <div class="row">
        <div class="col-lg">

            <a href="" class="btn btn-dark mb-3" data-toggle="modal" data-target="#newAgenda">Tambahkan Agenda Baru</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Mapel</th>
                        <th scope="col">Guru</th>
                        <th scope="col">Materi</th>
                        <th scope="col">Siswa Absensi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($rpl as $r) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $r['nama_kelas'] ?></td>
                            <td><?= $r['nama_mapel'] ?></td>
                            <td><?= $r['nama_guru'] ?></td>
                            <td><?= $r['materi'] ?></td>
                            <td><?= $r['siswa_absensi'] ?></td>
                            <td>
                                <a href="" class="badge badge-success">edit</a>
                                <a href="" class="badge badge-danger">delete</a>
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

<!-- Modal -->
<div class="modal fade" id="newAgenda" tabindex="-1" aria-labelledby="newAgendaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newAgendaLabel">Tambahkan Agenda Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('agenda/rpl'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <select name="kelas_id" id="kelas_id" class="form-control">
                            <option value="">Pilih Kelas</option>
                            <?php foreach ($kelas as $k) : ?>
                                <option value="<?= $k['kelas_id']; ?>"><?= $k['nama_kelas']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="mapel_id" id="mapel_id" class="form-control">
                            <option value="">Pilih Mapel</option>
                            <?php foreach ($mapel as $m) : ?>
                                <option value="<?= $m['mapel_id']; ?>"><?= $m['nama_mapel']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="guru_id" id="guru_id" class="form-control">
                            <option value="">Pilih Guru</option>
                            <?php foreach ($guru as $g) : ?>
                                <option value="<?= $g['guru_id']; ?>"><?= $g['nama_guru']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="materi" name="materi" placeholder="Materi Hari ini">
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control" id="siswa_absensi" name="siswa_absensi" placeholder="Siswa Absensi Hari ini">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>