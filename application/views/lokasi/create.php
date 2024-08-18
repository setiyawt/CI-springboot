
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Halaman Tambah Data Lokasi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form role="form" id="quickForm" action="<?= base_url('lokasi/tambah_aksi') ?>" method="POST">

                <div class="card-body">
                    <div class="form-group">
                        <label for="text">Kota</label>
                        <input type="text" name="kota" class="form-control" value="<?php echo isset($lks->kota) ? $lks->kota : ''; ?>" >
                        <? echo form_error('kota', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="text">Nama lokasi</label>
                        <input type="text" name="nama_lokasi" class="form-control" value="<?php echo isset($lks->nama_lokasi) ? $lks->nama_lokasi : ''; ?>" >
                        <? echo form_error('nama_lokasi', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="text">Negara</label>
                        <input type="text" name="negara" class="form-control" value="<?php echo isset($lks->negara) ? $lks->negara : ''; ?>" >
                        <? echo form_error('negara', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="text">Provinsi</label>
                        <input type="text" name="provinsi" class="form-control" value="<?php echo isset($lks->provinsi) ? $lks->provinsi : ''; ?>" >
                        <? echo form_error('provinsi', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                    

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="reset" class="btn btn-warning"><i class="fas fa-trash"></i> Reset</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit</button>
                </div>
            </form>


            </div>
            <!-- /.card -->
            </div>