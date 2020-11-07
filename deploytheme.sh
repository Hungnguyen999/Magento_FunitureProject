#!/bin/bash
sudo chmod -R 777 var/ pub/ generated/;
rm -rf /pub/static/*;rm -rf /var/view_preprocessed/*;
sudo bin/magento set:up;sudo bin/magento setup:static-content:deploy -f;
sudo chmod -R 777 var/ pub/ generated/;
