#!/bin/sh

aws s3 sync . s3://challecara-web/ --region ap-northeast-1 --exclude "*.DS_Store" --exclude ".htaccess" --exclude ".idea/*" --exclude "deploy.sh" --exclude "*.git/*" --exclude "*.gitignore" --exclude "docker-compose.yml" --exclude "themes/*"

