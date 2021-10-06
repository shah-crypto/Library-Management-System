<?php
include('meta.php');
?>

<title>Signup</title>

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

$userExists = false;
$signupSucc = false;

if (isset($_POST['signup'])) {
    $sname = $_POST['sname'];
    $year = $_POST['year'];
    $smail = $_POST['smail'];
    $pass = $_POST['pass'];
    $prof = $_POST['prof'];

    $query = "SELECT * FROM student where semail like '$smail'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_num_rows($result);

    $query2 = "SELECT * FROM admin where aemail like '$smail'";
    $result2 = mysqli_query($conn, $query2);
    $row2 = mysqli_num_rows($result2);

    if ($row > 0 || $row2 > 0) {
        $userExists = true;
    } else {
        if ($prof == "Student") {
            $query3 = "INSERT INTO `student` (`sid`, `sname`, `semail`, `spass`, `year`, `books_issued`) VALUES (NULL, '$sname', '$smail', '$pass', '$year', '0')";
        } else {
            $query3 = "INSERT INTO `admin` (`id`, `aname`, `aemail`, `apass`) VALUES (NULL, '$sname', '$smail', '$pass')";
        }
        $result3 = mysqli_query($conn, $query3);
        if ($result3) {
            $signupSucc = true;
            header("Location: login.php");
        }
    }
}
?>

<body>
    <?php
    // if ($signupSucc) {
    //     echo "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
    //         You have successfully signed up!
    //         <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    //     </div>";
    // }
    ?>

    <div class="container my-5 pt-3 pb-1 card text-center">
        <h2>Signup to BluePen's LMS</h2>
        <form action="signup.php" method="POST">
            <div class="row mt-2">
                <div class="col-md-6">
                    <label for="sname" class="form-label">Full name <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="sname" id="sname" required>
                </div>

                <div class="col-md-6">
                    <label for="year" class="form-label">Year <span style="color: red;">*</span></label>
                    <select name="year" id="year" class="form-control" required>
                        <option value="">Select your year</option>
                        <option value="F.E.">F.E.</option>
                        <option value="S.E.">S.E.</option>
                        <option value="T.E.">T.E.</option>
                        <option value="B.E.">B.E.</option>
                    </select>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6">
                    <label for="smail" class="form-label">Email ID <span style="color: red;">*</span></label>
                    <input type="email" class="form-control" name="smail" id="smail" required>
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
                <input type="submit" class="btn btn-primary" name="signup" value="Signup">
            </div>
            <?php
            if ($userExists) {
                echo "<small style='color: red;'>User with this email already exists!</small>";
            }
            ?>
        </form>

        <small class="mt-2">
            <span>Already a user? <a href="login.php">Login</a></span>
        </small>
    </div>
</body>