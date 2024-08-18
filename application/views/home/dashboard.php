<?= $this->session->flashdata('message');?>
<style>
    
    .table-container {
        overflow-x: auto; 
        -webkit-overflow-scrolling: touch; 
        margin: 20px 0; 
        
    }

    table {
        width: 100%;
        min-width: 100px; 
        border-collapse: collapse; 
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
        border: 1px solid #ddd;
        white-space: nowrap; 
    }

    th {
        background-color: #f4f4f4;
    }
</style>


<div class="card">
    <div class="card-header">
        <a href="<?= base_url('dashboard/create') ?>" class= "btn btn-primary"><i class= "fas fa=plus"></i>Tambah Data</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-container">
            <table>
                <thead>
                <tr>
                    <th>ID Proyek</th>
                    <th>Client</th>
                    <th>Keterangan</th>
                    <th>Nama Proyek</th>
                    <th>Pimpinan Proyek</th>
                    <th>Tgl Mulai</th>
                    <th>Tgl Selesai</th>
                    <th>ID Lokasi</th>
                    <th>Kota</th>
                    <th>Nama Lokasi</th>
                    <th>Negara</th>
                    <th>Provinsi</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <?php
                foreach ($proyek as $pyk) : ?>
                    <tbody>
                        <tr>
                        <td><?php echo $pyk->id; ?></td>
                        <td><?php echo $pyk->client; ?></td>
                        <td><?php echo $pyk->keterangan; ?></td>
                        <td><?php echo $pyk->nama_proyek; ?></td>
                        <td><?php echo $pyk->pimpinan_proyek; ?></td>
                        <td><?php echo $pyk->tgl_mulai; ?></td>
                        <td><?php echo $pyk->tgl_selesai; ?></td>
                        <td><?php echo $pyk->lokasi_id; ?></td>
                        <td><?php echo $pyk->kota; ?></td>
                        <td><?php echo $pyk->nama_lokasi; ?></td>
                        <td><?php echo $pyk->negara; ?></td>
                        <td><?php echo $pyk->provinsi; ?></td>

                        <td>
                            <a href="<?= base_url('dashboard/edit/' . $pyk->id) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url('dashboard/delete/' . $pyk->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fas fa-trash"></i></a> 
                        </td>
                        </tr>
                    </tbody>
                <?php endforeach ?>
            </table>
        </div>
    </div>
