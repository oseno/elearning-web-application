<?php
include 'connectdatabase.php';
$conn = OpenCon();
echo "Connected Successfully";
CloseCon($conn);
?>