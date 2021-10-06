<?php
include('meta.php');
include('admin_header.php');
?>

<title>Issue new book</title>

<style>
    .issue-table {
        width: 60vw;
    }

    .btn-class {
        text-align: center;
    }
</style>

<?php
include('connect.php');

$issueSucc = false;
if (isset($_POST['issue'])) {
    $sname = $_POST['stu-name'];
    $bname = $_POST['book-name'];
    $idate = $_POST['idate'];
    $tempdate1 = str_replace('/', '-', $idate);
    $newidate = date('Y-m-d', strtotime($tempdate1));

    $rdate = $_POST['rdate'];
    $tempdate2 = str_replace('/', '-', $rdate);
    $newrdate = date('Y-m-d', strtotime($tempdate2));

    $query6 = "UPDATE `book` SET total_copies = total_copies - 1 WHERE `book`.`bid` = $bname";
    $result6 = mysqli_query($conn, $query6);

    $query7 = "UPDATE `student` SET books_issued = books_issued + 1 WHERE `student`.`sid` = $sname";
    $result7 = mysqli_query($conn, $query7);

    // echo $sname." ".$bname." ".$newidate." ".$newrdate;

    $query1 = "INSERT INTO `snb` (`id`, `sid`, `bid`, `issue_date`, `return_date`, `fine`) VALUES (NULL, '$sname', '$bname', '$newidate', '$newrdate', '0')";
    $result1 = mysqli_query($conn, $query1);
    if ($result1) {
        $issueSucc = true;
    }
}
?>

<body>
    <?php
    if ($issueSucc) {
        echo "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
            Book issued successfully! <a href='admin_home.php'>Return home</a>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
    ?>

    <div class="container my-4 issue-table text-center">
        <div class="mt-4 header-div">
            <h2>Issue a new book</h2>
        </div>
        <form action="issue_book.php" method="POST" class="form-control my-4 py-3">
            <div class="row">
                <div class="col-sm-6">
                    <label for="stu-name" class="form-label">Student name <span style="color: red;">*</span></label>
                    <select name="stu-name" class="form-control" id="stu-name" required>
                        <option value="">Select name</option>
                        <?php
                        $query2 = "SELECT * FROM `student`";
                        $result2 = mysqli_query($conn, $query2);
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                            $sid = $row2['sid'];
                            $sname = $row2['sname'];
                        ?>
                            <option value=<?php echo $sid; ?>><?php echo $sname; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <!-- <input type="text" class="form-control" name="sname" id="sname" required> -->
                </div>

                <div class="col-sm-6">
                    <label for="book-name" class="form-label">Book name <span style="color: red;">*</span></label>
                    <select name="book-name" class="form-control" id="book-name" required>
                        <option value="">Select book</option>
                        <?php
                        $query3 = "SELECT * FROM `book`";
                        $result3 = mysqli_query($conn, $query3);
                        while ($row3 = mysqli_fetch_assoc($result3)) {
                            $bid = $row3['bid'];
                            $bname = $row3['bname'];
                        ?>
                            <option value=<?php echo $bid; ?>><?php echo $bname; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <!-- <input type="text" class="form-control" name="bname" id="bname" required> -->
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-sm-6">
                    <label for="idate" class="form-label">Issue date <span style="color: red;">*</span></label>
                    <input type="date" class="form-control" name="idate" id="idate" required>
                </div>
                <div class="col-sm-6">
                    <label for="rdate" class="form-label">Return date <span style="color: red;">*</span></label>
                    <input type="date" class="form-control" name="rdate" id="rdate" required>
                </div>
            </div>

            <div class="btn-class mt-3">
                <input type="submit" class="btn btn-primary" name="issue" value="Issue book">
            </div>

        </form>

    </div>
</body>

<!-- INSERT INTO `snb` (`id`, `sid`, `bid`, `issue_date`, `return_date`, `fine`) VALUES (NULL, '1', '8', '2021-09-21', '2021-10-13', '0') -->