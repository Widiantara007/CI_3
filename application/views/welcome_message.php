<!-- TABEL -->
<section class="my-5">
    <header class="text-center mb-5">
        <h1>Mahasiswa</h1>
    </header>
    <div class="container">
        <?php echo $this->session->flashdata('success'); ?>
        <?php echo $this->session->flashdata('delete'); ?>
        <?php echo $this->session->flashdata('update'); ?>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            + Tambah Data
        </button>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nim</th>
                    <th>Jenis Kelamin</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <?php 
				$no=1;
				foreach ($mahasiswa as $mhs) :
				?>
            <tbody>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $mhs->nama ?></td>
                    <td><?php echo $mhs->nim ?></td>
                    <td><?php echo $mhs->jenis_kelamin ?></td>
                    <td>
                        <?php echo anchor('Welcome/edit/'.$mhs->id, '<button type="button" class="btn btn-success mb-3" data-bs-target="#exampleModalEdit" >Edit
                            </button>') ?>
                    </td>
                    <td onclick="javascript: return confirm('Apakah anda yakin untuk menghapus data ini?')">
                        <?php echo anchor('Welcome/aksi_hapus/'.$mhs->id,'<button class="btn btn-danger">Hapus</button>' ) ?>
                    </td>
                </tr>
            </tbody>
            <?php endforeach; ?>
        </table>
    </div>
</section>
<!--END TABEL -->

<!-- FORM -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Mahasiswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(). 'Welcome/aksi_tambah'; ?>" method="post">
                    <div class="form-group my-3">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group my-3">
                        <label>Nim</label>
                        <input type="text" name="nim" class="form-control">
                    </div>
                    <div class="form-group my-3">
                        <label>Jenis Kelamin</label>
                        <input type="text" name="jenis_kelamin" class="form-control">
                    </div>
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END FORM -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
</body>

</html>