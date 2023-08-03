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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Transaction</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url('DataEvent') ?>">Create Event</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Profile</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
    <div class="row mt-5">
        <div class="col-md-6">
            <img src="<?php echo base_url('uploads/' . $event['gambar_deskripsi']); ?>" alt="Tidak Ada Foto" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h3><?php echo $event['nama_event']; ?></h3>
            <p><?php echo $event['deskripsi_event']; ?></p>
            <h5>Lokasi:</h5>
            <p><?php echo $schedules[0]['lokasi']; ?></p>
            <h5>Pilih Jadwal:</h5>
            <?php $dayCounter = 1; ?>
            <?php foreach ($schedules as $schedule) { ?>
                <?php foreach ($schedules as $schedule) { ?>
    <p>
        <a href="<?php echo base_url('admin/bookingSeat') . '?event_id=' . $event['id_event'] . '&id_schedule=' . $schedule['id_schedule']; ?>" class="btn btn-primary">
            Day <?php echo $dayCounter++; ?> - <?php echo date('Y-m-d', strtotime($schedule['tanggal_event'])); ?>
        </a>
    </p>
<?php } ?>

<?php } ?>


        </div>
    </div>
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