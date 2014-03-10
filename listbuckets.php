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

if (! file_put_contents("bucket-test", $b)) {
	die("No write permission.");
}

passthru("cat bucket-test | uniq | ./listing.sh");

?>
