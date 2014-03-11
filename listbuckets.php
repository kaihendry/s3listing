<?php
header("Content-Type: text/plain");

if (empty($_POST["bucket"])) {
	die("No buckets given.");
}

if (is_array($_POST["bucket"])) {
	$b = implode("\n", $_POST["bucket"]);
} else {
	$b = $_POST["bucket"];
}

$b = explode(" ", $b);
$b = implode("\n", $b);

$temp = tempnam("/tmp", $_SERVER['REMOTE_ADDR']);

if (! file_put_contents($temp, $b)) {
	die("No write permission.");
}

passthru("cat $temp | uniq | ./listing.sh");

?>
