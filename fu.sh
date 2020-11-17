sudo chmod -R 777 var/ pub/static/ generated/;
rm -rf var/generation/* var/cache/* var/report/* pub/static/frontend/* var/page_cache/* generated/*;
php bin/magento setup:upgrade; 
sudo chmod -R 777 var/ pub/static/ generated/;
php bin/magento setup:static-content:deploy -f; 
php bin/magento cache:flush;
sudo chmod -R 777 var/ pub/static/ generated/;