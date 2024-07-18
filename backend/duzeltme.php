<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taylor F</title>

    <link rel="stylesheet" href="../frontend/assets/css/duzeltme.css">
    <link rel="stylesheet" href="../frontend/assets/bootstrap/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../frontend/assets/bootstrap-icons/font/bootstrap-icons.min.css">



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

</head>

<body>

<div class="">

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../frontend/assets/images/logo.svg" alt="taylor francis logo" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">About Us</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Subjects
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Arts</a></li>
                            <li><a class="dropdown-item" href="#">Computer Science</a></li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Browse
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">All eBooks</a></li>
                            <li><a class="dropdown-item" href="#">eBooks Collections</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-disabled="true">Request a trial</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>



    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../frontend/assets/images/tf1.webp" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../frontend/assets/images/tf2.webp" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../frontend/assets/images/tf3.webp" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


</div>


<script src="../frontend/assets/bootstrap/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
