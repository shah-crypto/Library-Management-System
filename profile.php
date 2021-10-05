<?php
include('meta.php');
include('student_header.php');
?>

<title>Profile</title>

<style>
    .card {
        width: 400px;
        border: none;
        border-radius: 10px;
        background-color: #fff
    }

    .profile-card {
        width: 50vw;
        margin: auto;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
    }
</style>

<body>
    <div class="container my-4 profile-card text-center">
        <h4 class="pt-3">Alex</h4>
        <p>alexgmail.com</p>
        <div class="row">
            <div class="col">
                <h4 class="my-0">Books issued</h4>
                <p>0</p>
            </div>
            <div class="col">
                <h4 class="my-0">Total fine</h4>
                <p>0</p>
            </div>
        </div>
    </div>

    <div class="container my-3 text-center">
        <h2>Books issued</h2>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>Issue Date</th>
                    <th>Return Date</th>
                    <th>Fine</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Larry the Bird</td>
                    <td>Larry the Bird</td>
                    <td>@twitter</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>