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
    <?php
    $student_id = $_SESSION['student_id'];
    include('connect.php');
    $query1 = "SELECT * FROM student WHERE sid = $student_id";
    $result1 = mysqli_query($conn, $query1);
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $stu_name = $row1['sname'];
        $stu_email = $row1['semail'];
        $stu_books_issued = $row1['books_issued'];
    ?>

        <div class="container my-4 profile-card text-center">
            <h3 class="pt-3"><?php echo $stu_name; ?></h3>
            <p><?php echo $stu_email; ?></p>
            <div class="row">
                <div class="col">
                    <h5 class="my-0">Books issued</h5>
                    <p><?php echo $stu_books_issued; ?></p>
                </div>
            </div>
        </div>

    <?php
    }
    ?>

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
            <?php
            $query2 = "SELECT * FROM snb WHERE sid = $student_id";
            $result2 = mysqli_query($conn, $query2);
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $bid = $row2['bid'];
                $issue_date = $row2['issue_date'];
                $return_date = $row2['return_date'];
                $fine = $row2['fine'];
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
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>
    </div>
</body>