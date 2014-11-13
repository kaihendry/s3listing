# [xmlstarlet](http://xmlstar.sourceforge.net/) front end to indexing publically listed buckets

<img src="http://s.natalian.org/2014-11-13/s3-public-perms.png" alt="S3 bucket that allows public listing" />

# Example: Find all mp4s in a bucket

	curl -sF "bucket=http://mr2011.s3.amazonaws.com/" http://s3.dabase.com/listbuckets.php | grep mp4$ | head
	http://mr2011.s3.amazonaws.com/2009-01-01/GOPR0014.mp4
	http://mr2011.s3.amazonaws.com/2009-01-01/GOPR0015.mp4
	http://mr2011.s3.amazonaws.com/2009-01-01/GOPR0016.mp4
	http://mr2011.s3.amazonaws.com/2009-01-01/GOPR0017.mp4
	http://mr2011.s3.amazonaws.com/2009-01-01/GOPR0018.mp4
	http://mr2011.s3.amazonaws.com/2009-01-01/GOPR0019.mp4
	http://mr2011.s3.amazonaws.com/2009-01-01/GOPR0020.mp4
	http://mr2011.s3.amazonaws.com/2009-01-01/GOPR0021.mp4
	http://mr2011.s3.amazonaws.com/2009-01-01/GOPR0022.mp4
	http://mr2011.s3.amazonaws.com/2009-01-01/GOPR0023.mp4
