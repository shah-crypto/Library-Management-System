<?php
include('meta.php');
?>

<title>LMS</title>

<style>
    .card {
        width: 50vw;
        height: 50vh;
        margin: auto;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
    }
</style>

<body>
    <div class="container my-5 py-3 text-center">
        <h2>Welcome to BluePen's LMS</h2>
        <div class="card pt-5">
            <h3>New user? <a href="signup.php">Signup here</a></h3>
            <h3>Already a user? <a href="login.php">Login</a></h3>
        </div>
    </div>
</body>