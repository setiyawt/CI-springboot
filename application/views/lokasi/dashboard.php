<?= $this->session->flashdata('message');?>

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
        <a href="<?= base_url('lokasi/create') ?>" class= "btn btn-primary"><i class= "fas fa=plus"></i>Tambah Data</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-container">
            <table>
                <thead>
                <tr>
                    <th>ID Lokasi</th>
                    <th>Kota</th>
                    <th>Nama Lokasi</th>
                    <th>Negara</th>
                    <th>Provinsi</th>
                    
                    <th>Aksi</th>
                </tr>
                </thead>
                <?php
                foreach ($lokasi as $lks) : ?>
                    <tbody>
                        <tr>
                        <td><?php echo $lks->id; ?></td>
                        <td><?php echo $lks->kota; ?></td>
                        <td><?php echo $lks->nama_lokasi; ?></td>
                        <td><?php echo $lks->negara; ?></td>
                        <td><?php echo $lks->provinsi; ?></td>
                        

                        <td>
                            <a href="<?= base_url('lokasi/edit/' . $lks->id) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url('lokasi/delete/' . $lks->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fas fa-trash"></i></a> 
                        </td>
                        </tr>
                    </tbody>
                <?php endforeach ?>
            </table>
        </div>
    </div>
