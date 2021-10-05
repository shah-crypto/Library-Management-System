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

<body>
    <div class="container">
        <div class="mt-4 header-div">
            <h2>Send request for an unavailable book</h2>
        </div>
        <form action="." method="post" class="form-control my-4 mb-3 request-book-class">
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="bname" class="form-label">Enter book name <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="bname" required>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="bauth" class="form-label">Enter book author <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="bauth" required>
                </div>
            </div>

            <div class="btn-class mb-2">
                <button class="btn btn-primary">Submit request</button>
            </div>

        </form>
    </div>
</body>