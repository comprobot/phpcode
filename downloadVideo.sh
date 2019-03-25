FILENAME=/opt/tomcat/ops/record.csv
cat $FILENAME | while read LINE
do
#echo $LINE
IFS=',' read -ra RECORDS <<< "$LINE"
wget --no-cache ${RECORDS[0]} -O  ./video/${RECORDS[1]}
echo ${RECORDS[2]}
done
