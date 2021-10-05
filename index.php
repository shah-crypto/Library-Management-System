<?php
include('meta.php');
?>

<style>
    .card {
        width: 50vw;
        margin: auto;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
    }
</style>

<body>
    <div class="container my-5 py-3 card text-center">
        <h2>Welcome to BluePen's LMS</h2>
        <span>New user? <a href="signup.php">Signup here</a></span>
        <span>Already a user? <a href="login.php">Login</a></span>
    </div>
</body>