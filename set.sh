#!/bin/bash
sudo bin/magento set:up;rm -rf /pub/static/*;rm -rf /var/view_preprocessed/*;sudo bin/magento c:f;sudo chmod -R 777 var/ pub/ generated/;
