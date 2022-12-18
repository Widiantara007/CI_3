<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <!-- header -->
    <div class="container">
        <div class="my-5">
            <h1 class="text-center">Edit Data Mahasiswa</h1>
        </div>
    </div>
    <!--end header -->
    <div class="container">
        <section class="content">
            <?php foreach ($mahasiswa as $mhs) { ?>
            <form class="mx-5" method="post" action="<?= base_url().'Welcome/aksi_update'; ?>">
                <div class="form-group my-2">
                    <label class="form-label">Nama</label>
                    <input type="hidden" name="id" class="form-control" value="<?= $mhs->id ?>">
                    <input type="text" name="nama" class="form-control" value="<?= $mhs->nama ?>">
                </div>
                <div class="form-group my-2">
                    <label class="form-label">Nim</label>
                    <input type="text" name="nim" class="form-control" value="<?= $mhs->nim ?>">
                </div>
                <div class="form-group my-2">
                    <label class="form-label">Jenis Kelamin</label>
                    <input type="text" name="jenis_kelamin" class="form-control" value="<?= $mhs->jenis_kelamin ?>">
                </div>
                <div class="my-3 text-center">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            <?php } ?>
        </section>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>