<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg">
            <div class="card shadow-sm border-bottom-primary">
                <div class="card-header bg-white py-3">
                    <div class="row">
                        <div class="col">
                            <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                                <?= $judul; ?>
                            </h4>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('home_user') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                                <span class="icon">
                                    <i class="fa fa-arrow-left"></i>
                                </span>
                                <span class="text">
                                    Back
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="<?= base_url('user/diagnosa'); ?>" id="form-id" method="POST">
                        <div class="container">
                            <div class="row form-group">
                                <label class="col-md-3 text-md-right" for="nama_pendiagnosa">Nama</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user"></i></span>
                                        </div>
                                        <input value="" name="nama_pendiagnosa" id="nama_pendiagnosa" type="text" class="form-control" placeholder="Nama...">
                                    </div>
                                    <small class="text-danger"><?= form_error('nama_pendiagnosa'); ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row form-group">
                                <label class="col-md-3 text-md-right" for="no_hp">Nomor Hp</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-phone"></i></span>
                                        </div>
                                        <input value="" name="no_hp" id="no_hp" type="number" class="form-control" placeholder="Nomor Hp...">
                                    </div>
                                    <small class="text-danger"><?= form_error('no_hp'); ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row form-group">
                                <label class="col-md-3 text-md-right" for="alamat">Alamat</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-home"></i></span>
                                        </div>
                                        <textarea name="alamat" id="alamat" class="form-control" rows="4" placeholder="Alamat..."></textarea>
                                    </div>
                                    <small class="text-danger"><?= form_error('alamat'); ?></small>
                                </div>
                            </div>
                        </div>
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary mb-3">
                            Pilih Gejala
                        </h4>
                        <small class="text-danger"><?= form_error('rule'); ?></small>
                        <table class="table table-hover">
                            <!-- <?php if (form_error('id_gejala[]')) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <?= form_error('id_gejala[]'); ?>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                            <?php endif; ?> -->

                            <div id="error-message" class="alert alert-danger" style="display: none;"></div>

                            <thead>
                                <tr>
                                    <th style="width: 15%; text-align: center;">Centang</th>
                                    <th style="width: 25%; text-align: center;">Rule</th>
                                    <th style="width: 60%; text-align: center;">Gejala</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($gejala as $g) : ?>
                                    <tr>
                                        <td style="text-align: center;">
                                            <input type="checkbox" id="<?= $g['id_gejala']; ?>" name="id_gejala[]" value="<?= $g['id_gejala']; ?>">
                                        </td>
                                        <td style="text-align: center;"><?= $g['kode_gejala']; ?></td>
                                        <td>Apakah <?= $g['nama_gejala']; ?> ?</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="container">
                            <div class="row form-group">
                                <div class="col-lg offset">
                                    <center>
                                        <button type="submit" class="btn btn-primary">Diagnosa</button>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#form-id').submit(function(e) {
            e.preventDefault();
            var checkboxes = $('input[name="id_gejala[]"]:checked');

            if (checkboxes.length < 1) {

                $('#error-message').text('Silahkan pilih minimal 1 gejala terlebih dahulu!');
                $('#error-message').show();
            } else {
                $('#error-message').hide();
                this.submit();
            }
        });
    });
</script>