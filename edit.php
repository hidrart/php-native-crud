<?php
    include_once("config.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['update'])) {    
            $id = $_POST['id'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];

            if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($gender)) {
                $query = "UPDATE mahasiswa SET first_name = '$first_name', last_name = '$last_name', email = '$email', gender = '$gender' WHERE id = $id";
                $result = mysqli_query($mysqli, $query);

                header("Location: index.php");
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Edit | Mahasiswa</title>
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
                        <a class="nav-link" href="index.php">Index</a>
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
                <img src="assets/img/Duplicate-bro.svg" class="col order-lg-1 rounded w-lg-50 float-end" alt="Food Illustration">
                <div class="col order-lg-2 d-flex flex-column align-middle gap-3 mb-3">
                    <div class="row text-center text-lg-start">
                        <h1 class="title fw-bold">Update data mahasiswa</h1>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae labore, debitis impedit distinctio delectus.</p>
                    </div>
                    <?php
                        $id = $_GET['id'];
                        $query = "SELECT * FROM mahasiswa WHERE id = $id";
                        $result = mysqli_query($mysqli, $query);
                    
                        while($mahasiswa = mysqli_fetch_assoc($result))
                        {
                            $first_name = $mahasiswa['first_name'];
                            $last_name = $mahasiswa['last_name'];
                            $email = $mahasiswa['email'];
                            $gender = $mahasiswa['gender'];
                        }
                    ?>
                    <form class="needs-validation" method="POST" auto_complete="off" novalidate>
                        <div class="row flex">
                            <div class="mb-3 col-lg-6">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="first_name" value=<?php echo $first_name;?> required>
                                <div class="invalid-feedback"> First name is required </div>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name" value=<?php echo $last_name;?> required>
                                <div class="invalid-feedback"> Last name is required </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value=<?php echo $email;?>  required>
                            <div class="invalid-feedback"> Email is required </div>
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" aria-label="Default select example" name="gender" required>
                                <option disabled value="">select</option>
                                <option <?php if ($gender == "Male") { echo "selected"; } ?> value="Male">male</option>
                                <option <?php if ($gender == "Female") { echo "selected"; } ?> value="Female">female</option>
                            </select>
                            <div class="invalid-feedback"> Gender is required </div>
                        </div>
                        <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                        <input type="submit" name="update" value= "update" class="btn btn-dark">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script>
        (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')

        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
            })
        })()
    </script>
</body>