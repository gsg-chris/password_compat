<?php
/**
 * This code will benchmark your server to determine how high of a cost you can
 * afford. You want to set the highest cost that you can without slowing down
 * you server too much. 8-10 is a good baseline, and more is good if your servers
 * are fast enough. The code below aims for ≤ 50 milliseconds stretching time,
 * which is a good baseline for systems handling interactive logins.
 */

 require "lib/password.php";

$timeTarget = 0.06; // 50 milliseconds

$cost = 8;
$password = "thisisatest";

echo "Started<br>";

do {
    $cost++;
    $start = microtime(true);
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $end = microtime(true);
} while (($end - $start) < $timeTarget);

echo "Appropriate Cost Found: " . $cost . "<br>";
echo "Stamp: " . time() . "<br>";
?>
