
<style>
    
    .table-container {
        overflow-x: auto; /* Enable horizontal scrolling */
        -webkit-overflow-scrolling: touch; /* Smooth scrolling on iOS */
        margin: 20px 0; /* Optional: Adds some space around the container */
         /* Optional: Adjusts the width of the container to fit the viewport */
        
    }

    table {
        width: 100%; /* Ensures the table uses the full width of its container */
        min-width: 100px; /* Adjust this value to fit all columns */
        border-collapse: collapse; /* Avoids double borders */
    }

    th, td {
        padding: 12px 15px; /* Sedikit memperbesar padding */
        text-align: left;
        border: 1px solid #ddd;
        white-space: nowrap; /* Mencegah pemecahan teks */
    }

    th {
        background-color: #f4f4f4; /* Light background for header cells */
    }
</style>


<div class="card">
    <div class="card-header">
        <a href="<?= base_url('proyek/create') ?>" class= "btn btn-primary"><i class= "fas fa=plus"></i>Tambah Data</a>
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
                    
                    <th>Aksi</th>
                </tr>
                </thead>
                <?php $no =1;
                foreach ($proyek as $pyk) : ?>
                    <tbody>
                        <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $pyk->client; ?></td>
                        <td><?php echo $pyk->keterangan; ?></td>
                        <td><?php echo $pyk->nama_proyek; ?></td>
                        <td><?php echo $pyk->pimpinan_proyek; ?></td>
                        <td><?php echo $pyk->tgl_mulai; ?></td>
                        <td><?php echo $pyk->tgl_selesai; ?></td>

                        <td>
                            <a href="<?= base_url('proyek/edit/' . $pyk->id) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url('proyek/delete/' . $pyk->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fas fa-trash"></i></a> 
                        </td>
                        </tr>
                    </tbody>
                <?php endforeach ?>
            </table>
        </div>
    </div>
