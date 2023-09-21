<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">XI RPL</h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="row">
        <div class="col-lg">


            <form method="post" class="col-lg mb-3">
                <div class="form-group float-left">
                    <a href="" class="btn btn-dark" data-toggle="modal" data-target="#newAgenda">Tambahkan Agenda Baru</a>
                </div>
                <div class="form-group float-right">
                    <input type="submit" class="btn btn-dark ml-2" id="filter" name="filter" value="filter">
                </div>
                <div class="form-group float-right">
                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                </div>
            </form>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">jam</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Mapel</th>
                        <th scope="col">Guru</th>
                        <th scope="col">Materi</th>
                        <th scope="col">Siswa Absensi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($rpl as $r) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $r['jam'] ?></td>
                            <td><?= $r['kelas_id'] ?></td>
                            <td><?= $r['mapel_id'] ?></td>
                            <td><?= $r['guru_id'] ?></td>
                            <td><?= $r['materi'] ?></td>
                            <td><?= $r['siswa_absensi'] ?></td>
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
                        <small class="form-text text-danger"><?= form_error('kelas_id'); ?></small>
                    </div>
                    <div class="form-group">
                        <select name="mapel_id" id="mapel_id" class="form-control">
                            <option value="">Pilih Mapel</option>
                            <?php foreach ($mapel as $m) : ?>
                                <option value="<?= $m['mapel_id']; ?>"><?= $m['nama_mapel']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <small class="form-text text-danger"><?= form_error('mapel_id'); ?></small>
                    </div>
                    <div class="form-group">
                        <select name="guru_id" id="guru_id" class="form-control">
                            <option value="">Pilih Guru</option>
                            <?php foreach ($guru as $g) : ?>
                                <option value="<?= $g['guru_id']; ?>"><?= $g['nama_guru']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <small class="form-text text-danger"><?= form_error('guru_id'); ?></small>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="materi" name="materi" placeholder="Materi Hari ini">
                        <small class="form-text text-danger"><?= form_error('materi'); ?></small>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="siswa_absensi" name="siswa_absensi">
                            <option value="">Jumlah Siswa Gamasuk</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <small class="form-text text-danger"><?= form_error('siswa_absensi'); ?></small>
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