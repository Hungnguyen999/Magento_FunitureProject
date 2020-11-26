sudo chmod -R 777 var/ pub/static/ generated/;
# bin/magento se:di:co
rm -rf var/generation/* var/cache/* var/report/* pub/static/frontend/* var/page_cache/* generated/*;
bin/magento setup:upgrade; 
sudo chmod -R 777 var/ pub/static/ generated/;
bin/magento setup:static-content:deploy --theme Team2/LumaTheme -f; 
bin/magento cache:flush;
sudo chmod -R 777 var/ pub/static/ generated/;