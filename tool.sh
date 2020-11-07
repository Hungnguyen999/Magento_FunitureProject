#!/bin/bash
sudo chmod -R 777 var/ pub/ generated/;rm -rf /pub/static/*;rm -rf /var/view_preprocessed/*;bin/magento c:f;
