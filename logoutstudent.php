<?php
include('student_header.php');
include('meta.php');
?>

<?php
session_unset();
session_destroy();
header("Location: index.php");
exit;
?>