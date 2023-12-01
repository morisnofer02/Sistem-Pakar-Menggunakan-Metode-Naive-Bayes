    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>


        <div class="row">
            <div class="col-lg-8">

                <?= form_open_multipart('user/edit'); ?>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>" readonly>
                    </div>

                </div>

                <div class="form-group row">
                    <label for="nama_user" class="col-sm-2 col-form-label">Full name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_user" name="nama_user" value="<?= $user['nama_user']; ?>">
                        <?= form_error('nama_user', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2">Picture</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets3/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-outline-primary">Edit</button>
                    </div>
                </div>
                </form>

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    </div>