# [xmlstarlet](http://xmlstar.sourceforge.net/) front end to indexing publically listed buckets

<img src="http://s.natalian.org/2014-11-13/s3-public-perms.png" alt="S3 bucket that allows public listing" />

or using the [aws cli](https://aws.amazon.com/cli/):

	aws s3api put-bucket-acl --bucket BUCKET_NAME --acl public-read
