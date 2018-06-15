<?php
include_once 'conn.php';

$quary = "Select * from activities where date < curdate()";
$result = mysqli_query($conn, $quary);

while ($row=mysqli_fetch_assoc($result)) {
    if ($row['repetition']=='Once') {
        $id=$row['id'];
        $quary = "Delete from engage where activity_id='$id'";
        mysqli_query($conn, $quary);
        $quary = "Delete from activities where id='$id'";
        mysqli_query($conn, $quary);
    } elseif ($row['repetition']=='Daily') {
        $quary = 'Update activities Set date=DATE_ADD(date, INTERVAL 1 DAY)';
        mysqli_query($conn, $quary);
    } elseif ($row['repetition']=='Weekly') {
        $quary = 'Update activities Set date=DATE_ADD(date, INTERVAL 7 DAY)';
        mysqli_query($conn, $quary);
    } elseif ($row['repetition']=='Monthly') {
        $quary = 'Update activities Set date=DATE_ADD(date, INTERVAL 1 MONTH)';
        mysqli_query($conn, $quary);
    }
}
