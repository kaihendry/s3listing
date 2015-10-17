<?php
header("Content-Type: text/plain");

if (empty($_REQUEST["bucket"])) {
	die("No buckets given.");
}

if (is_array($_REQUEST["bucket"])) {
	$b = implode("\n", $_REQUEST["bucket"]);
} else {
	$b = $_REQUEST["bucket"];
}

$b = explode(" ", $b);
$b = implode("\n", $b);

$temp = tempnam("/tmp", $_SERVER['REMOTE_ADDR']);

if (! file_put_contents($temp, $b)) {
	die("No write permission.");
}

passthru("cat $temp | uniq | ./listing.sh");

?>
