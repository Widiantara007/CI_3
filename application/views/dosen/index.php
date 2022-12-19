<header>
    <h1 class="text-center my-5">Tabel Dosen</h1>
</header>
<div class="container">
    <?php echo $this->session->flashdata('input'); ?>
    <?php echo $this->session->flashdata('delete'); ?>
    <?php echo $this->session->flashdata('update'); ?>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data</button>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th>Gambar</th>
                <th scope="col">Nama</th>
                <th scope="col">Nip</th>
                <th scope="col">Alamat</th>
                <th scope="col">Edit</th>
                <th scope="col">Hapus</th>
            </tr>
        </thead>

        <?php 
            $no = 1;
            foreach($dosen as $d):
            ?>
        <tbody>
            <tr>
                <th><?php echo $no++ ?></th>
                <td><img class="img-carousel" src="<?php echo base_url() ?>assets/gambar/<?= $d->gambar; ?>" alt=""
                        width="70"></td>
                <td><?php echo $d->nama ?></th>
                <td><?php echo $d->nip ?></th>
                <td><?php echo $d->alamat ?></th>
                <td>
                    <?php echo anchor('Dosen/edit/'.$d->id,' <button class="btn btn-success">Edit</button>') ?>
                </td>
                <td onclick="javascript: return confirm ('Kamu Yakin? Kamu Teryakin-yakin untuk menghapus data ini?')">
                    <?php echo anchor('Dosen/aksi_delete/'.$d->id,' <button class="btn btn-danger">Hapus</button>') ?>
                </td>
            </tr>
        </tbody>
        <?php endforeach; ?>
    </table>


    <!-- FORM INPUT -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Dosen</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('Dosen/aksi_tambah'); ?>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NIP</label>
                        <input type="text" name="nip" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar</label>
                        <input type="file" name="gambar" class="form-control">
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END FORM INPUT -->