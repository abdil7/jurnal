<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Apa yang mau diubah niee?
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="jam" value="<?= $idrpl['jam']; ?>">
                        <div class="form-group">
                            <select name="kelas_id" id="kelas_id" class="form-control">
                                <?php foreach ($kelas as $k) : ?>
                                    <?php if ($k['kelas_id'] == $idrpl['kelas_id']) : ?>
                                        <option value="<?= $k['kelas_id']; ?>" selected><?= $k['nama_kelas']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $k['kelas_id']; ?>"><?= $k['nama_kelas']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('kelas_id'); ?></small>
                        </div>
                        <div class="form-group">
                            <select name="mapel_id" id="mapel_id" class="form-control">
                                <?php foreach ($mapel as $m) : ?>
                                    <?php if ($m['mapel_id'] == $idrpl['mapel_id']) : ?>
                                        <option value="<?= $m['mapel_id']; ?>" selected><?= $m['nama_mapel']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $m['mapel_id']; ?>"><?= $m['nama_mapel']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('mapel_id'); ?></small>
                        </div>
                        <div class="form-group">
                            <select name="guru_id" id="guru_id" class="form-control">
                                <?php foreach ($guru as $g) : ?>
                                    <?php if ($g['guru_id'] == $idrpl['guru_id']) : ?>
                                        <option value="<?= $g['guru_id']; ?>" selected><?= $g['nama_guru']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $g['guru_id']; ?>"><?= $g['nama_guru']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('guru_id'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="materi" name="materi" placeholder="Materi Hari ini" value="<?= $idrpl['materi']; ?>">
                            <small class="form-text text-danger"><?= form_error('materi'); ?></small>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="siswa_absensi" name="siswa_absensi">
                                <option value=""><?= $idrpl['siswa_absensi']; ?></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <small class="form-text text-danger"><?= form_error('siswa_absensi'); ?></small>
                        </div>

                        <button type="submit" class="btn btn-primary float-right" name="tambah">Ganti Data</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>