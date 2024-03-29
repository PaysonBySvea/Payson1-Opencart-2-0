# Payson 1.0

## Information

We unfortunately do not provide technical support for this version of the module. In order for Payson to guarantee optimal performance and support, we recommend always having the latest module version installed.

(We support OpenCart 2.3.X - 3.X. Older versions can be found here)

## Description

Module for OpenCart 2.X implementing Payson 1.0

## Backup

* You should always backup your files and database before installing or upgdating modules

## Installation

* Copy all files from this repository into yor OpenCart root. 

### Configuration

* Login into your web shop Administration Panel.

* Go to Extensions->Payments and install Payson All in One. 

* Click Edit.

* Enter your Email, Agent ID,  MD5 Key, Payment method and secure word before enabling the module.

* Click Save.

#### Invoice fee

* Login into your web shop Administration Panel.

* Go to Extensions->Order totals and install Payson invoice fee. 

* Click Edit.

* Enter the price, tax and enable the module.

  Retail price with tax must be in the range 0 to 40 SEK.
  Tax must be 25 %.
  The module is only for payments over 30 SEK.  

## Upgrade

* You should have a BACKUP of your web store and database.

* Login into your web shop Administration Panel.

* Go to Extensions->Payments. Uninstall Payson All in One. 

* Go to Opencart folder to the root directory of your store.

* remove the files:

****Admin****

Admin/contoller/payment/paysondirect.php
Admin/contoller/payment/paysoninvoice.php

Admin/contoller/total/paysoninvoice.fee.php 

Admin/language/english/payment/paysondirect.php
Admin/language/english/payment/paysoninvoice.php
Admin/language/swedish/payment/paysondirect.php
Admin/language/swedish/payment/paysoninvoice.php

Admin/language/english/total/paysoninvoice.fee.php 
Admin/language/swedish/total/paysoninvoice.fee.php 
Admin/model/module/paysondirect.php
Admin/model/module/paysoninvoice.php

Admin/view/image/payment/payson.png
Admin/view/image/payment/paysoninvoice.png

Admin/view/template/payment/paysondirect.tpl
Admin/view/template/payment/paysoninvoice.tpl

Admin/view/template/total/paysoninvoice.fee.tpl 

****Catalog****

catalog/contoller/payment/payson (folder)
catalog/contoller/payment/paysondirect.php
catalog/contoller/payment/paysoninvoice.php

catalog/language/english/payment/paysondirect.php
catalog/language/english/payment/paysoninvoice.php
catalog/language/english/total/paysoninvoice_fee.php

catalog/language/swedish/payment/paysondirect.php
catalog/language/swedish/payment/paysoninvoice.php
catalog/language/swedish/total/paysoninvoice_fee.php

catalog/model/payment/paysondirect.php
catalog/model/payment/paysoninvoice.php
catalog/model/total/paysoninvoice_fee.php

catalog/view/theme/default/image/payment/payson.png
catalog/view/theme/default/image/payment/paysoninvoice.png

catalog/view/theme/default/template/payment/paysondirect.tpl
catalog/view/theme/default/template/payment/paysoninvoice.tpl

* Go to INSTALLATION in this document. 

## Usage

If you only are interested to use this module in your store, please download it from [here](http://www.opencart.com/index.php?route=extension/extension/info&extension_id=10923)

## Contributing

Issue pull requests or send feature requests.
