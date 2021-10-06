<?php
include('meta.php');
include('student_header.php');
?>

<title>Home</title>

<style>
    table {
        text-align: center;
    }

    .books-div h2 {
        text-align: center;
    }
</style>

<body>
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
                    </tr>
                </thead>

                <?php
                include('connect.php');

                $query1 = "SELECT * FROM book ORDER BY bname";
                $result1 = mysqli_query($conn, $query1);
                if ($result1) {
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        $bid = $row1['bid'];
                        $bname = $row1['bname'];
                        $bauthor = $row1['bauthor'];
                        $total_pages = $row1['total_pages'];
                        $year = $row1['year'];
                ?>

                        <tbody>
                            <tr>
                                <td><?php echo $bname; ?></td>
                                <td><?php echo $bauthor; ?></td>
                                <td><?php echo $total_pages; ?></td>
                                <td><?php echo $year; ?></td>
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