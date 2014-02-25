t=$(mktemp)

parselistbucket () {
	xmlstarlet sel -N w="http://s3.amazonaws.com/doc/2006-03-01/" -T -t -m "//w:Key" -v . -n
}

while read url
do
	curl -s "$url" | parselistbucket >> $t

while test $(($(wc -l < $t) % 1000)) -eq 0 # this should testing for IsTruncated="true"
do
	echo Need to go again with $(tail -n1 $t) from $t 1>&2
	curl -s "$url/?marker=$(tail -n1 $t)" | parselistbucket >> $t
done

done < buckets

cat $t
#rm -f $t
