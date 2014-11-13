# [xmlstarlet](http://xmlstar.sourceforge.net/) front end to indexing publically listed buckets

<img src="http://s.natalian.org/2014-11-13/s3-public-perms.png" alt="S3 bucket that allows public listing" />

# Example: List all files in a bucket that allows a public list

	$ curl -F "bucket=http://listme.s3.amazonaws.com/" http://s3.dabase.com/listbuckets.php
	http://listme.s3-ap-southeast-1.amazonaws.com/bbc.png
	http://listme.s3-ap-southeast-1.amazonaws.com/gu.png
	http://listme.s3-ap-southeast-1.amazonaws.com/nyt.png
