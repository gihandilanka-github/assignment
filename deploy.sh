#!/bin/bash
# ------------------------------------------------------------------
# @authur : Dilanka Somarathne
# Diligma deployment script
# ------------------------------------------------------------------

#grunt

IGNORE=/var/tmp/ignore

echo "
.buildpath
.DS_Store
.project
.settings
nbproject/
.idea
.git*
logs/*
cache/*
Thumbs.db

public/assets/images/temp/*
public/assets/images/user/*
node_modules/

#/vendor/
Gruntfile.js
deploy.sh
storage/*
.env
composer.lock
application/third_party" > $IGNORE

# update
#rsync -avz . root@104.236.246.15:/home/dilanka/projects/diligma --exclude-from=$IGNORE --delete -rvczh
rsync . gihandilanka:/home/ubuntu/projects/assignment --exclude-from=$IGNORE --delete -rvczh


#initial deploy with all files
#rsync . dilanka@104.236.246.15:/home/dilanka/projects/assignment --delete -rvczh


rm $IGNORE

#sudo ssh root@104.236.249.15 chmod 777 -R /home/dilanka/projects/assignment

#ssh uguest@192.168.1.183 chmod 777 -R /home/uguest/roomflip/application/cache/
#ssh uguest@192.168.1.183 chmod 777 -R /home/uguest/roomflip/application/logs/
#php artisan migrate




