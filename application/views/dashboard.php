<style>
    .table-container {
        overflow-x: auto; /* Enable horizontal scrolling */
        -webkit-overflow-scrolling: touch; /* Smooth scrolling on iOS */
        margin: 20px 0; /* Optional: Adds some space around the container */
    }

    table {
        width: 100%; /* Ensures the table uses the full width of its container */
        min-width: 1200px; /* Adjust this value to fit all columns */
        border-collapse: collapse; /* Avoids double borders */
    }

    th, td {
        padding: 10px; /* Adds padding inside table cells */
        text-align: left; /* Aligns text to the left */
        border: 1px solid #ddd; /* Light grey border for table cells */
    }

    th {
        background-color: #f4f4f4; /* Light background for header cells */
    }
</style>


<div class="card">
    <div class="card-header">
        <h3 class="card-title">DataTable with minimal features & hover style</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-container">
            <table id="example2" class="table table-bordered table-hover">
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
                        <td><?php echo $pyk->lokasi_id; ?></td>
                        <td><?php echo $pyk->kota; ?></td>
                        <td><?php echo $pyk->nama_lokasi; ?></td>
                        <td><?php echo $pyk->negara; ?></td>
                        <td><?php echo $pyk->provinsi; ?></td>

                            <td>
                                <a href="#"class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>  <!-- Add a delete button here -->
                            </td>
                        </tr>
                    </tbody>
                <?php endforeach ?>
            </table>
        </div>
    </div>
