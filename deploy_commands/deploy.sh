#!/bin/bash

cd project
touch ftp_script.sh
echo "ftp -inv \$FTP_SERVER <<EOF" >> ftp_script.sh
echo "user \$FTP_USER \$FTP_PASS" >> ftp_script.sh
echo "passive" >> ftp_script.sh
ignore="./.git/*"
find . -mindepth 1 -type d ! -path "$ignore" -exec echo "mkdir {}" \; >> ftp_script.sh
find . -type f ! -path "$ignore" -exec echo mput {} >> ftp_script.sh +
echo "delete ftp_script.sh" >> ftp_script.sh
echo "bye" >> ftp_script.sh
echo "EOF" >> ftp_script.sh
chmod +x ftp_script.sh
bash ftp_script.sh


