<?php
include('meta.php');
include('student_header.php');
?>

<title>Send reviews</title>

<style>
    .btn-class {
        text-align: center;
    }

    .header-div {
        text-align: center;
    }

    .review-form-div {
        width: 50vw;
        margin: auto;
    }
</style>

<?php
$conn = mysqli_connect("localhost", "root", "", "bluepen_lms");

$feedbackSucc = false;
if (isset($_POST['send'])) {
    $tags = $_POST['tags'];
    $feedback = $_POST['feedback'];

    $query1 = "INSERT INTO `review` (`rev_id`, `text`, `tags`) VALUES (NULL, '$feedback', '$tags')";
    $result1 = mysqli_query($conn, $query1);
    if ($result1) {
        $feedbackSucc = true;
    }
}
?>

<body>
    <?php
    if ($feedbackSucc) {
        echo "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
            Thank you for providing your valuable feedback!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
    ?>

    <div class="container">
        <div class="mt-4 header-div">
            <h2>Send us your reviews!</h2>
            <small>We're always open to hear from our users.</small>
        </div>
        <form action="reviews.php" method="POST" class="form-control my-4 mb-4 review-form-div">
            <div class="row">
                <div class="mb-3 col-md-12">
                    <label for="tags" class="form-label">Tags <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="tags" id="tags" required>
                </div>

                <div class="mb-3 col-md-12">
                    <label for="feedback" class="form-label">Your feedback <span style="color: red;">*</span></label>
                    <textarea id="feedback" class="form-control" name="feedback" cols="30" rows="10" required></textarea>
                </div>

            </div>

            <div class="btn-class mb-2">
                <button class="btn btn-primary" name="send">Submit feedback</button>
            </div>

        </form>
    </div>
</body>