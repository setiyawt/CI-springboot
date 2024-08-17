
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Halaman Tambah Data Proyek</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form role="form" id="quickForm" action="<?= base_url('proyek/tambah_aksi') ?>" method="POST">

                <div class="card-body">
                    <div class="form-group">
                        <label for="text">Client</label>
                        <input type="text" name="client" class="form-control" value="<?php echo isset($pyk->client) ? $pyk->client : ''; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="text">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" value="<?php echo isset($pyk->keterangan) ? $pyk->keterangan : ''; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="text">Nama Proyek</label>
                        <input type="text" name="nama_proyek" class="form-control" value="<?php echo isset($pyk->nama_proyek) ? $pyk->nama_proyek : ''; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="text">Pimpinan Proyek</label>
                        <input type="text" name="pimpinan_proyek" class="form-control" value="<?php echo isset($pyk->pimpinan_proyek) ? $pyk->pimpinan_proyek : ''; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="text">Tanggal Mulai</label>
                        <input type="datetime-local" name="tgl_mulai" class="form-control" value="<?php echo isset($pyk->tgl_mulai) ? $pyk->tgl_mulai : ''; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="text">Tanggal Selesai</label>
                        <input type="datetime-local" name="tgl_selesai" class="form-control" value="<?php echo isset($pyk->tgl_selesai) ? $pyk->tgl_selesai : ''; ?>" >
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