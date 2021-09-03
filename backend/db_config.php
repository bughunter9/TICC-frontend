<?php

$mysqli = new mysqli("localhost", "root", "", "ticc");
//$mysqli = new mysqli("localhost", "oandldev_pp_scraper", "yZ3oJW^FvUF&", "oandldev_pp_scraper");

// Check Connection
if ($mysqli -> connect_errno) {
    echo "Failed to Connect to MySQL: " . $mysqli -> connect_error;
    exit();
}
?>