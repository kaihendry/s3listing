<?php
header("Content-Type: text/plain");

if (empty($_POST["bucket"])) {
	die("No buckets given.");
}

$b = implode("\n", $_POST["bucket"]);

// print_r($b);

if (! file_put_contents("bucket-test", $b)) {
	die("No write permission.");
}

passthru("cat bucket-test | uniq | ./listing.sh");

?>
