<?php foreach ($subMenu as $sm) : ?>
    <div class="modal fade ubahSubmenu<?= $sm['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="forModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit SubMenu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('menu/ubahSubmenu'); ?>
                <input type="hidden" name="id" value="<?= $sm['id']; ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $sm['judul']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="menu_id">Menu</label>
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="<?= $sm['menu_id']; ?>"><?= $sm['menu']; ?></option>
                            <?php foreach ($menu as $m) : ?>
                                <?php if ($m == $sm['menu_id']) : ?>
                                    <option value="<?= $m['id']; ?>" selected><?= $m['menu']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" class="form-control" id="url" name="url" value="<?= $sm['url']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="text" class="form-control" id="icon" name="icon" value="<?= $sm['icon']; ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-round btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>