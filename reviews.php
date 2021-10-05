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

    .review-form-div{
        width: 50vw;
        margin: auto;
    }
</style>

<body>
    <div class="container">
        <div class="mt-4 header-div">
            <h2>Send us your reviews!</h2>
            <small>We're always open to hear from our users.</small>
        </div>
        <form action="." method="post" class="form-control my-4 mb-4 review-form-div">
            <div class="row">
                <div class="mb-3 col-md-12">
                    <label for="bauth" class="form-label">Tags</label>
                    <input type="text" class="form-control" id="bauth">
                </div>

                <div class="mb-3 col-md-12">
                    <label for="feedback" class="form-label">Your feedback <span style="color: red;">*</span></label>
                    <textarea id="feedback" class="form-control" cols="30" rows="10" required></textarea>
                </div>

            </div>

            <div class="btn-class mb-2">
                <button class="btn btn-primary">Submit feedback</button>
            </div>

        </form>
    </div>
</body>