<div class="container">
    <header>
        <h1 class="my-5 text-center">Edit Data Dosen</h1>
    </header>
    <?php foreach ($dosen as $d) :?>
    <?php echo form_open_multipart('Dosen/aksi_update'); ?>

    <div class="mb-3">
        <label class="form-label" style="font-weight: 500;">Nama</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $d->nama ?>">
    </div>
    <div class="mb-3">
        <label class="form-label" style="font-weight: 500;">NIP</label>
        <input type="text" name="nip" class="form-control" value="<?php echo $d->nip ?>">
    </div>
    <div class="mb-3">
        <label class="form-label" style="font-weight: 500;">Alamat</label>
        <input type="text" name="alamat" class="form-control" value="<?php echo $d->alamat ?>">
    </div>
    <div class="mb-3">
        <label class="form-label" style="font-weight: 500;">Gambar</label>
        <input type="hidden" name="id" class="form-control" value="<?php echo $d->id ?>">
        <input type="file" name="gambar" class="form-control">
    </div>
    <div class="text-center">
        <button class="btn btn-danger" type="button" name="cancel" value="cancel"
            onClick="window.location='<?= base_url(). 'Dosen/index';?>';">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

    <?php echo form_close(); ?>
    <div class="container items-center">
        <img class="img-carousel mt-3" src="<?php echo base_url() ?>assets/gambar/<?= $d->gambar; ?>" alt=""
            width="150">
        <p>Gambar Sebelumnya</p>
    </div>
    <?php endforeach; ?>
</div>