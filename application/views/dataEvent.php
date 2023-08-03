<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <div class="d-flex justify-content-end mt-3 mb-3">
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahData">Tambah Data <i class="bi bi-person-fill-add"></i>
    </button>
  </div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahData" tabindex="-1">
                <div class="modal-dialog modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Tambah Data Event</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="<?php echo base_url('Admin/AksiInsertEvent') ?>" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Event</label>
                                <input type="text" class="form-control" name="nama_event" required>
                            </div>
                            <div class="form-group mt-2">
                                <label>Deskripsi Event</label>
                                <textarea type="text" class="form-control" name="deskripsi_event" required></textarea>
                            </div>
                            <div class="form-group mt-2">
                                  <label>Gambar Iklan</label>
                                  <input type="file" class="form-control" name="gambar_iklan" required>
                                  <span class="warning-text">(foto yang sudah diupload tidak dapat diubah kecuali dihapus)</span>
                           </div>
                           <div class="form-group mt-2">
                                  <label>Gambar Deskripsi</label>
                                  <input type="file" class="form-control" name="gambar_deskripsi">
                                  <span class="warning-text">(foto yang sudah diupload tidak dapat diubah kecuali dihapus)</span>
                           </div>
                           
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>


    <table class="table table-striped">
  <thead>
    <tr>
    <th>Nama Event</th>
    <th>Deskripsi Event</th>
    <th>Gambar Event</th>
    <th>Gambar Deskripsi</th>
    <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($dataEvent as $row) { ?>
                  <tr>
                  <td><?php echo $row['nama_event']; ?></td>
                    <td><?php echo $row['deskripsi_event']; ?></td>
                    <td><img src="<?php echo base_url('uploads/' . $row['gambar_iklan']); ?>" alt="Tidak Ada Foto" width="100"></td>
                    <td><img src="<?php echo base_url('uploads/' . $row['gambar_deskripsi']); ?>" alt="Tidak Ada Foto" width="100"></td>
                    <td><button type="button" class="btn btn-primary btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id_event']; ?>">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row['id_event']; ?>">Hapus</button>
                                </td>
                  </tr>

                  <?php } ?>
  </tbody>
</table>


</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>