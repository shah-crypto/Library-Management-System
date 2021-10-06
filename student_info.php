<?php
include('meta.php');
include('admin_header.php');
?>

<title>Student Profile</title>

<?php
$conn = mysqli_connect("localhost", "root", "", "bluepen_lms");

if (isset($_GET['id'])) {
    $profile_id = $_GET['id'];

    $query1 = "SELECT * FROM student WHERE sid = $profile_id";
    $result1 = mysqli_query($conn, $query1);

    // echo $id;
}
?>

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
    <?php
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $sname = $row1['sname'];
        $semail = $row1['semail'];
        $books_issued = $row1['books_issued'];
    ?>

        <div class="container my-4 profile-card text-center">
            <h4 class="pt-3"><?php echo $sname; ?></h4>
            <p><?php echo $semail; ?></p>
            <div class="row">
                <div class="col">
                    <h4 class="my-0">Books issued</h4>
                    <p><?php echo $books_issued; ?></p>
                </div>
                <div class="col">
                    <h4 class="my-0">Total fine</h4>
                    <p>0</p>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <?php
    if ($books_issued > 0) {
    ?>
        <div class="container my-3 text-center">
            <h2 style="color: white;">Books issued</h2>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Book Name</th>
                            <th>Author</th>
                            <th>Issuing Date</th>
                            <th>Returning Date</th>
                            <th>Fine</th>
                            <th>Mark as returned</th>
                        </tr>
                    </thead>

                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "bluepen_lms");

                    $query1 = "SELECT * FROM snb WHERE sid = $profile_id";
                    $result1 = mysqli_query($conn, $query1);
                    if ($result1) {
                        while ($row1 = mysqli_fetch_assoc($result1)) {
                            $id = $row1['id'];
                            $sid = $row1['sid'];
                            $bid = $row1['bid'];
                            $issue_date = $row1['issue_date'];
                            $return_date = $row1['return_date'];
                            $fine = $row1['fine'];
                    ?>

                            <tbody>
                                <tr>
                                    <?php
                                    $query3 = "SELECT * FROM book WHERE bid = $bid";
                                    $result3 = mysqli_query($conn, $query3);
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        $bname = $row3['bname'];
                                        $bauthor = $row3['bauthor'];
                                    ?>
                                        <td><?php echo $bname; ?></td>
                                        <td><?php echo $bauthor; ?></td>
                                    <?php
                                    }
                                    ?>

                                    <td><?php echo $issue_date; ?></td>
                                    <td><?php echo $return_date; ?></td>
                                    <td><?php echo $fine; ?></td>
                                    <td><a href="admin_home.php?returned=<?php echo $id; ?>"><i class="fas fa-check-circle"></i></a></td>
                                </tr>
                            </tbody>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    <?php
    }
    ?>
</body>