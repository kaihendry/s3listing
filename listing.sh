#!/bin/sh
# Based upon http://stackoverflow.com/a/21960296/4534

s3ns=http://s3.amazonaws.com/doc/2006-03-01/

while read s3url
do

	test "$s3url" || continue
	i=0
	s3get=$s3url

	while :; do
		curl -f -s $s3get > "listing$i.xml"
		if test $? -ne 0
		then
			echo ERROR $? retrieving: $s3get 1>&2
			break
		fi
		xml sel -N w="http://s3.amazonaws.com/doc/2006-03-01/" -T -t -m "//w:Key" -o "$s3url" -v . -n "listing$i.xml"
		nextkey=$(xml sel -T -N "w=$s3ns" -t \
			--if '/w:ListBucketResult/w:IsTruncated="true"' \
			-v 'str:encode-uri(/w:ListBucketResult/w:Contents[last()]/w:Key, true())' \
			-b -n "listing$i.xml")
		# -b -n adds a newline to the result unconditionally,
		# this avoids the "no XPaths matched" message; $() drops newlines.

		rm -f "listing$i.xml"

		if [ -n "$nextkey" ] ; then
			s3get=$s3get"?marker=$nextkey"
			i=$((i+1))
		else
			break
		fi
	done

done
