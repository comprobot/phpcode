FILENAME=/var/www/html/batch/record.csv
cat $FILENAME | while read LINE
do
#echo $LINE
IFS=',' read -ra RECORDS <<< "$LINE"
wget --no-cache ${RECORDS[0]} -O  ./video/${RECORDS[1]}
echo ${RECORDS[2]}
convert -size 1024x602 xc:white canvas.jpg
convert canvas.jpg -pointsize 34 -fill black -annotate +266+235 "Scan below QR code " canvas.jpg
qrencode -o ops.png -s 6 -l H www.ops.com.hk
convert canvas.jpg ops.png -append output.png
export qrfilename=qr-$(date +%Y-%m-%d-%H-%M-%S).mp4
ffmpeg -loop 1 -i output.png -c:v libx264 -t 30 -pix_fmt yuv420p -y $qrfilename
export pathname=/var/www/html/batch/video 
echo 'file ' $pathname${RECORDS[1]} $'\n' >> files.txt
echo 'file ' $pathname$qrfilename $'\n' >> files.txt
done
