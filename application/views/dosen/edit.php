<div class="container">
    <header>
        <h1 class="my-5 text-center">Edit Data Dosen</h1>
    </header>
    <?php foreach ($dosen as $d) :?>
    <form action="<?php echo base_url().'Dosen/aksi_update'; ?>" method="POST">
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="hidden" name="id" class="form-control" value="<?php echo $d->id ?>">
            <input type="text" name="nama" class="form-control" value="<?php echo $d->nama ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">NIP</label>
            <input type="text" name="nip" class="form-control" value="<?php echo $d->nip ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?php echo $d->alamat ?>">
        </div>
        <div class="text-center">
            <button class="btn btn-danger" type="button" name="cancel" value="cancel"
                onClick="window.location='<?= base_url(). 'Dosen/index';?>';">Cancel</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <?php endforeach; ?>
</div>