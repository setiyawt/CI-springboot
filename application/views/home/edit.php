<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Halaman Edit Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <?php if (isset($pyk) && $pyk): ?>
        <form role="form" id="quickForm" action="<?= base_url('dashboard/edit_aksi/' . $pyk->id) ?>" method="POST">
            <div class="card-body">
                <input type="hidden" name="id" value="<?= $pyk->id ?>">
                <input type="hidden" name="lokasi_id" value="<?= $pyk->lokasi_id ?>">
            
                
                <div class="form-group">
                    <label for="text">Client</label>
                    <input type="text" name="client" class="form-control" value="<?= $pyk->client ?? '' ?>">
                    <? echo form_error('client', '<div class="text-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="text">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" value="<?= $pyk->keterangan ?? '' ?>">
                    <? echo form_error('keterangan', '<div class="text-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="text">Nama Proyek</label>
                    <input type="text" name="nama_proyek" class="form-control" value="<?= $pyk->nama_proyek ?? '' ?>">
                    <? echo form_error('nama_proyek', '<div class="text-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="text">Pimpinan Proyek</label>
                    <input type="text" name="pimpinan_proyek" class="form-control" value="<?= $pyk->pimpinan_proyek ?? '' ?>">
                    <? echo form_error('pimpinan_proyek', '<div class="text-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="text">Tanggal Mulai</label>
                    <input type="datetime-local" name="tgl_mulai" class="form-control" value="<?= date('Y-m-d\TH:i', strtotime($pyk->tgl_mulai)) ?>">
                    <? echo form_error('tgl_mulai', '<div class="text-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="text">Tanggal Selesai</label>
                    <input type="datetime-local" name="tgl_selesai" class="form-control" value="<?= date('Y-m-d\TH:i', strtotime($pyk->tgl_selesai)) ?>">
                    <? echo form_error('tgl_selesai', '<div class="text-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="text">Kota</label>
                    <input type="text" name="kota" class="form-control" value="<?= $pyk->kota ?? '' ?>">
                    <? echo form_error('kota', '<div class="text-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="text">Nama Lokasi</label>
                    <input type="text" name="nama_lokasi" class="form-control" value="<?= $pyk->nama_lokasi ?? '' ?>">
                    <? echo form_error('nama_lokasi', '<div class="text-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="text">Negara</label>
                    <input type="text" name="negara" class="form-control" value="<?= $pyk->negara ?? '' ?>">
                    <? echo form_error('negara', '<div class="text-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="text">Provinsi</label>
                    <input type="text" name="provinsi" class="form-control" value="<?= $pyk->provinsi ?? '' ?>">
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