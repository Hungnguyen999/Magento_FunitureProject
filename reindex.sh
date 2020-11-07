#!/bin/bash
sudo bin/magento indexer:reindex;bin/magento c:f;sudo chmod -R 777 var/ pub/ generated/;
