<?php
include('meta.php');
include('admin_header.php');
?>

<title>Admin Home</title>

<style>
    table {
        text-align: center;
    }

    .issued-books-div h2,
    .books-div h2 {
        text-align: center;
    }

    td a {
        text-decoration: none;
    }
</style>

<?php
include('connect.php');

if (isset($_GET['returned'])) {
    $del_id = $_GET['returned'];
    $query5 = "SELECT `bid` FROM `snb` WHERE id = $del_id";
    $result5 = mysqli_query($conn, $query5);
    while ($row5 = mysqli_fetch_assoc($result5)) {
        $bid = $row5['bid'];
        // echo $bid;
        $query6 = "UPDATE `book` SET total_copies = total_copies + 1 WHERE `book`.`bid` = $bid";
        $result6 = mysqli_query($conn, $query6);
    }

    $query4 = "DELETE FROM `snb` WHERE `snb`.`id` = $del_id";
    $result4 = mysqli_query($conn, $query4);
    header("Location: admin_home.php");
}
?>

<body>
    <div class="container my-4 issued-books-div">
        <h2>List of issued books</h2>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Student Name</th>
                        <th>Year</th>
                        <th>Book Name</th>
                        <th>Author</th>
                        <th>Issuing Date</th>
                        <th>Returning Date</th>
                        <th>Fine</th>
                        <th>Mark as returned</th>
                    </tr>
                </thead>

                <?php

                $query1 = "SELECT * FROM snb";
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
                                $query2 = "SELECT * FROM student WHERE sid = $sid";
                                $result2 = mysqli_query($conn, $query2);
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    $sname = $row2['sname'];
                                    $year = $row2['year'];
                                ?>
                                    <td><a href="student_info.php?id=<?php echo $sid; ?>"><?php echo $sname; ?></a></td>
                                    <td><?php echo $year; ?></td>
                                <?php
                                }
                                ?>

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
        <!-- <a href="requestbooks.php" class="btn btn-primary">Request new books</a> -->
    </div>

    <div class="container my-4 books-div">
        <h2>List of available books</h2>
        <div class="text-center mb-3">
            <input type="text" name="search" id="search" class="form-control" placeholder="Start typing to search">
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="book-table">
                <thead class="table-dark">
                    <tr>
                        <th>Book Name</th>
                        <th>Author</th>
                        <th>Total Pages</th>
                        <th>Year</th>
                        <th>Copies Remaining</th>
                    </tr>
                </thead>

                <?php

                $query1 = "SELECT * FROM book ORDER BY bname";
                $result1 = mysqli_query($conn, $query1);
                if ($result1) {
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        $bid = $row1['bid'];
                        $bname = $row1['bname'];
                        $bauthor = $row1['bauthor'];
                        $total_pages = $row1['total_pages'];
                        $year = $row1['year'];
                        $total_copies = $row1['total_copies'];
                ?>

                        <tbody>
                            <tr>
                                <td><?php echo $bname; ?></td>
                                <td><?php echo $bauthor; ?></td>
                                <td><?php echo $total_pages; ?></td>
                                <td><?php echo $year; ?></td>
                                <td><?php echo $total_copies; ?></td>
                            </tr>
                    <?php
                    }
                }
                    ?>
                        </tbody>
            </table>
        </div>
        <!-- <a href="requestbooks.php" class="btn btn-primary">Request new books</a> -->
    </div>

    <script>
        $(document).ready(function() {
            $('#search').keyup(function() {
                search_table($(this).val());
            });

            function search_table(value) {
                $('#book-table tr').each(function() {
                    var found = 'false';
                    $(this).each(function() {
                        if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
                            found = 'true';
                        }
                    });
                    if (found === 'true') {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }
        });
    </script>
</body>

</html>