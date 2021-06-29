<?php 

    $host = "localhost";
    $username = "root";
    $pass = "";
    $db_name = "rekap_kehadiran2";

    $conn = mysqli_connect($host, $username, $pass, $db_name);

    $sql = "SELECT * FROM siswa";

    $query = mysqli_query($conn, $sql);

    $data_siswa = [];

    while($datas = mysqli_fetch_assoc($query)){
        array_push($data_siswa, $datas);
    }

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>

    <form action="proses.php" method="POST">
        <select class="form-select" aria-label="Default select example" name="siswa">
            <option value="">Open this select menu</option>
            <?php for($i = 0; $i < count($data_siswa); $i++) {?>
                <option value=<?php echo $data_siswa[$i]['id_siswa']?>><?php echo $data_siswa[$i]['nama']?></option>
            <?php }?>
        </select>

        <div class="form-check form-check-inline">
            <input class="form-check-input absensi" type="radio" name="absensi" value="h">
            <label class="form-check-label" for="absensi">Hadir</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input absensi" type="radio" name="absensi" value="s">
            <label class="form-check-label" for="absensi">Sakit</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input absensi" type="radio" name="absensi" value="i">
            <label class="form-check-label" for="absensi">Izin</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input absensi" type="radio" name="absensi" value="a">
            <label class="form-check-label" for="absensi">Alpha</label>
        </div>
        <button type="submit" id="buttonSubmit" class="btn btn-success">Submit Absen</button>
    </form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>