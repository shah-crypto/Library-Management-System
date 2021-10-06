<?php
include('meta.php');
include('student_header.php');
?>

<title>Request books</title>

<style>
    .btn-class {
        text-align: center;
    }

    .request-book-class {
        width: 70vw;
        margin: auto;
    }

    .header-div {
        text-align: center;
    }
</style>

<?php
include('connect.php');

$reqSucc = false;
$bookExists = false;
if (isset($_POST['request'])) {
    $bname = $_POST['bname'];
    $bauth = $_POST['bauth'];

    $query1 = "SELECT * FROM `book` WHERE `bname` like '$bname' and `bauthor` like '$bauth'";
    $result1 = mysqli_query($conn, $query1);
    $row1 = mysqli_num_rows($result1);

    if ($row1 == 0) {
        $query2 = "INSERT INTO `request` (`req_id`, `book_name`, `book_author`) VALUES (NULL, '$bname', '$bauth')";
        $result2 = mysqli_query($conn, $query2);
        if ($result2) {
            $reqSucc = true;
        }
    } else {
        $bookExists = true;
    }
}
?>

<body>
    <?php
    if ($reqSucc) {
        echo "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
            Request sent successfully!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
    ?>

    <?php
    if ($bookExists) {
        echo "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
            This book already exists!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
    ?>

    <div class="container">
        <div class="mt-4 header-div">
            <h2>Send request for an unavailable book</h2>
        </div>
        <form action="requestbooks.php" method="POST" class="form-control my-4 mb-3 request-book-class">
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="bname" class="form-label">Enter book name <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="bname" name="bname" required>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="bauth" class="form-label">Enter book author <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="bauth" name="bauth" required>
                </div>
            </div>

            <div class="btn-class mb-2">
                <button class="btn btn-primary" name="request">Submit request</button>
            </div>

        </form>
    </div>
</body>