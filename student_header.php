<?php
session_start();
if (!isset($_SESSION['stu-loggedin']) || $_SESSION['stu-loggedin'] != true) {
    header('Location: login.php');
    exit;
}
?>

<style>
    .btn-outline-primary {
        color: black;
        border: black !important;
    }

    .btn-outline-primary:hover {
        color: white !important;
        background-color: #c0e3fe;
    }

    .fa-user-circle {
        color: black;
        font-size: 1.5rem;
    }

    #logout-btn a {
        text-decoration: none;
        color: white;
    }
</style>
</head>

<body>
    <nav class="navbar navbar-expand navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">LMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="student_home.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="requestbooks.php">Request books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="reviews.php">Review us</a>
                    </li>
                </ul>
                <!-- <form class="d-flex">
                    <input class="form-control" type="search" placeholder="Search a book" required>
                    <button class="btn btn-outline-primary ms-1" type="submit"><i class="fas fa-search"></i></button>
                </form> -->
                <div class="d-flex">
                    <button class="btn btn-sm btn-danger me-2" id="logout-btn" name="logout" type="submit"><a href="logoutstudent.php">Logout</a></button>
                    <a href="profile.php"><i class="me-2 fas fa-user-circle"></i></a>
                </div>
                <!-- <div class="ms-2">Welcome, <span>admin</span>!</div> -->
            </div>
        </div>
    </nav>
</body>

</html>