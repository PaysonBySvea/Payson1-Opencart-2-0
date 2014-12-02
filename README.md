module-payson-opencart-2
========================

Module for OpenCart 2 implementing Payson

# Payson OpenCart Module

## Description

Module for OpenCart implementing Payson

## Installation

* Make a BACKUP of your web store and database. 
* Copy all files from this repository into yor OpenCart root. 

### Configuration

* Login into your web shop Administration Panel.

* Go to Extensions->Payments and install Payson Direct. 

* Click Edit.

* Enter your Email, Agent ID,  MD5 Key, Payment method and secure word before enabling the module.

* Click Save.

* Go to Extensions->Payments and Payson Invoice.

* Enter your Email, Agent ID,  MD5 Key, secure word and Order totals to ignore  before enabling the module.

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

* Go to Extensions->Payments. Uninstall Payson Direct and Payson Invoice. 

* Go to Opencart folder to the root directory of your store.

* remove the files:

****Admin****

Admin/contoller/payment/paysondirect.php
Admin/contoller/payment/paysoninvoice.php

Admin/contoller/total/paysoninvoice.fee.php (new)

Admin/language/english/payment/paysondirect.php
Admin/language/english/payment/paysoninvoice.php
Admin/language/swedish/payment/paysondirect.php
Admin/language/swedish/payment/paysoninvoice.php

Admin/language/english/total/paysoninvoice.fee.php  (new)
Admin/language/swedish/total/paysoninvoice.fee.php (new)

Admin/model/module/paysondirect.php
Admin/model/module/paysoninvoice.php

Admin/view/image/payment/payson.png
Admin/view/image/payment/paysoninvoice.png

Admin/view/template/payment/paysondirect.tpl
Admin/view/template/payment/paysoninvoice.tpl

Admin/view/template/total/paysoninvoice.fee.tpl (new)

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