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
        <div class="col-md-12">
            <h3>Selected Event: <?php echo $event['nama_event']; ?></h3>
            <p>Selected Date: <?php echo date('Y-m-d', strtotime($selectedDate)); ?></p>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <h5>Available Seats:</h5>
            <p>Put your seat selection UI here, for example, seat map or seat options...</p>

            <!-- Form for seat selection and quantity -->
            <form action="<?php echo base_url('admin/personalInfo'); ?>" method="post">
                <input type="hidden" id="event_id" name="event_id" value="<?php echo $event['id_event']; ?>">
                <?php foreach ($schedules as $schedule) { ?>
                    <input type="hidden" id="id_schedule" name="id_schedule" value="<?php echo $schedule['id_schedule']; ?>">
                <?php } ?>
                <label for="seat">Select Seat:</label>
                <select class="form-control" name="id_seat" id="seat">
                    <option disabled selected value="">Pilih salah satu</option>
                    <?php foreach ($dataseat as $tampilseat) { ?>
                        <option value="<?php echo $tampilseat['id_seat']; ?>" data-price="<?php echo $tampilseat['price']; ?>">
                            <?php echo $tampilseat['seatZone']; ?>
                        </option>
                    <?php } ?>
                </select>
                <br>
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" min="1" value="1">
                <br>
                <label for="totalPrice">Total Price:</label>
                <span id="totalPrice">0</span>
                <br>
                <button type="submit" class="btn btn-primary">Next</button>
            </form>
        </div>
    </div>
</div>














    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
      document.getElementById('seat').addEventListener('change', function() {
    const selectedSeat = this.options[this.selectedIndex];
    const seatPrice = selectedSeat.dataset.price;
    const quantity = document.getElementById('quantity').value;
    const totalPrice = seatPrice * quantity;
    document.getElementById('totalPrice').innerText = totalPrice;
  });

  document.getElementById('quantity').addEventListener('input', function() {
    const selectedSeat = document.getElementById('seat').options[document.getElementById('seat').selectedIndex];
    const seatPrice = selectedSeat.dataset.price;
    const quantity = this.value;
    const totalPrice = seatPrice * quantity;
    document.getElementById('totalPrice').innerText = totalPrice;
  });
</script>



    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>