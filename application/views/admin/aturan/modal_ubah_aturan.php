<!-- Modal Edit -->
<?php foreach ($aturan as $A) : ?>
    <div class="modal fade ubahAturan<?= $A['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="forModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="apasih">Ubah Aturan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?= form_open_multipart('aturan/ubah'); ?>
                <input type="hidden" name="id" value="<?= $A['id']; ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kerusakan">Pilih Kerusakan</label>
                        <select name="kerusakan" id="kerusakan" class="form-control">
                            <?php foreach ($kerusakan as $k) : ?>
                                <option value="<?= $k['id_kerusakan']; ?>" <?= ($k['kode_kerusakan'] == $A['kode_kerusakan'] ? 'selected' : '') ?>><?= $k['kode_kerusakan']; ?>-<?= $k['nama_kerusakan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="gejala">Pilih Gejala</label>
                        <select name="gejala" id="gejala" class="form-control">
                            <?php foreach ($gejala as $g) : ?>
                                <option value="<?= $g['id_gejala']; ?>" <?= ($g['kode_gejala'] == $A['kode_gejala'] ? 'selected' : '') ?>><?= $g['kode_gejala']; ?> - <?= $g['nama_gejala']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="probabilitas">Nilai Probabilitas</label>
                            <input type="text" class="form-control" id="probabilitas" name="probabilitas" value="<?= $A['probabilitas']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-round btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>