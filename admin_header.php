<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
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
                        <a class="nav-link" aria-current="page" href="admin_home.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="issue_book.php">Issue book</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <button class="btn btn-sm btn-danger ms-1" id="logout-btn" name="logout" type="submit"><a href="logout.php">Logout</a></button>
                </div>
                <!-- <div class="ms-2">Welcome, <span>admin</span>!</div> -->
            </div>
        </div>
    </nav>
</body>