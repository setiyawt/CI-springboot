<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Halaman Edit Data Lokasi</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <?php if (isset($lks) && $lks): ?>
        <form role="form" id="quickForm" action="<?= base_url('lokasi/edit_aksi/' . $lks->id) ?>" method="POST">
            <div class="card-body">
                <input type="hidden" name="id" value="<?= $lks->id ?>">
                
                <div class="form-group">
                    <label for="text">Kota</label>
                    <input type="text" name="kota" class="form-control" value="<?= $lks->kota ?? '' ?>">
                    <? echo form_error('kota', '<div class="text-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="text">Nama Lokasi</label>
                    <input type="text" name="nama_lokasi" class="form-control" value="<?= $lks->nama_lokasi ?? '' ?>">
                    <? echo form_error('nama_lokasi', '<div class="text-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="text">Negara</label>
                    <input type="text" name="negara" class="form-control" value="<?= $lks->negara ?? '' ?>">
                    <? echo form_error('negara', '<div class="text-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="text">Provinsi</label>
                    <input type="text" name="provinsi" class="form-control" value="<?= $lks->provinsi ?? '' ?>">
                    <? echo form_error('provinsi', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="reset" class="btn btn-warning"><i class="fas fa-trash"></i> Reset</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
            </div>
        </form>
    <?php endif; ?>
</div>
<!-- /.card -->