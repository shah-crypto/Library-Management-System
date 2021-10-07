<?php
include('meta.php');
?>

<title>Login</title>

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

<?php
include('connect.php');

$wrongCred = false;

if (isset($_POST['login'])) {
    $lemail = mysqli_real_escape_string($conn, $_POST['email']);
    $lpass = mysqli_real_escape_string($conn, $_POST['pass']);
    $lprof = $_POST['prof'];

    if ($lprof == "Student") {
        $query1 = "SELECT * FROM student WHERE `semail` like '$lemail' and `spass` like '$lpass'";
        $result1 = mysqli_query($conn, $query1);
        $row1 = mysqli_num_rows($result1);
        if ($row1 > 0) {
            header("Location: student_home.php");
        } else {
            $wrongCred = true;
        }
    } else {
        $query2 = "SELECT * FROM admin WHERE `aemail` like '$lemail' and `apass` like '$lpass'";
        $result2 = mysqli_query($conn, $query2);
        $row2 = mysqli_num_rows($result2);
        if ($row2 > 0) {
            session_start();
            $_SESSION['loggedin'] = true;
            header("Location: admin_home.php");
        } else {
            $wrongCred = true;
        }
    }
}
?>

<body>
    <div class="container my-5 pt-3 pb-1 card text-center">
        <h2>Login to BluePen's LMS</h2>
        <form action="login.php" method="POST">
            <div class="row mt-2">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email ID <span style="color: red;">*</span></label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>

                <div class="col-md-6">
                    <label for="pass" class="form-label">Password <span style="color: red;">*</span></label>
                    <input type="password" class="form-control" name="pass" id="pass" required>
                </div>
            </div>

            <div class="row mt-3">
                <h5>Select your profession <span style="color: red;">*</span></h5>
                <div class="col">
                    <label for="stu">Student</label>
                    <input type="radio" class="mx-1" name="prof" id="stu" value="Student" required>
                    <label for="lib">Librarian</label>
                    <input type="radio" class="mx-1" name="prof" id="lib" value="Librarian">
                </div>
            </div>

            <div class="btn-class mt-3">
                <input type="submit" class="btn btn-primary" name="login" value="Login">
            </div>
        </form>

        <?php
        if ($wrongCred) {
            echo "<small style='color: red;'>Invalid credentials!</small>";
        }
        ?>

        <small class="mt-2">
            <span>New user? Signup <a href="signup.php">here</a></span>
        </small>
    </div>
</body>