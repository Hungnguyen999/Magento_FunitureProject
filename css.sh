#!/bin/bash
sudo chmod -R 777 var/ pub/ generated/;
rm -rf /pub/static/*;rm -rf /var/view_preprocessed/*; rm -rf var/cache/*; rm -rf generated/*;
bin/magento c:f;
bin/magento setup:static-content:deploy --theme Team2/LumaTheme -f;
sudo chmod -R 777 var/ pub/ generated/
