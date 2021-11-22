<?php
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM mahasiswa ORDER BY id DESC");
?>

 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Index | Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <style><?php include "assets/css/style.css" ?></style>
</head>

<body>
    <!-- navbar -->
    <nav class=" navbar navbar-expand-sm navbar-light">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">College</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon fw-bold"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="index.php">Index</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add.php">Add Data</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- hero -->
    <section class="p-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 align-items-center">
                <img src="assets/img/Classroom-bro.svg" class="col order-lg-2 rounded w-lg-50 float-end" alt="Food Illustration">
                <div class="col order-lg-1 d-flex flex-column text-center text-lg-start align-middle gap-3 mb-3">
                    <h1 class="title fw-bold">Sistem Informasi Mahasiswa</h1>
                    <p class="lh-lg" style="text-align: justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora aspernatur fugiat nobis odio, maxime inventore doloribus, optio provident nihil aliquam deserunt asperiores. Dolore blanditiis quas dolor fugit, similique cum repudiandae? Fugiat sint accusantium unde dolor repellendus fugit temporibus quo magni at doloremque iure sit quibusdam ratione quos perferendis labore.</p>
                    <form method="get" action="add.php">
                        <button type="submit" class="btn btn-dark">Add data mahasiswa</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <table class="table table-hover table-borderless" id="mahasiswaTable">
            <thead>
                <tr class="table-dark">
                    <th scope="col-3">First Name</th>
                    <th scope="col-3">Last Name</th>
                    <th scope="col-3">Email</th>
                    <th scope="col-1">gender</th>
                    <th scope="col-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = "SELECT * FROM mahasiswa ORDER BY id DESC";
                    $result = mysqli_query($mysqli, $query);
                    while($mahasiswa = mysqli_fetch_array($result)) {         
                        echo "<tr>";
                        echo "<td>".$mahasiswa['first_name']."</td>";
                        echo "<td>".$mahasiswa['last_name']."</td>";
                        echo "<td>".$mahasiswa['email']."</td>";
                        echo "<td>".$mahasiswa['gender']."</td>";  
                        echo "<td>";
                        echo "<a class=\"btn btn-sm btn-outline-warning me-2\" href='edit.php?id=$mahasiswa[id]'>Edit</a>";
                        echo "<a class=\"btn btn-sm btn-outline-danger\" href='delete.php?id=$mahasiswa[id]'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    };
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>