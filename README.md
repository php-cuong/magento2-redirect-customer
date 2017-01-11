# Magento 2 Redirect Customer to the particular page after Logging in successful
This is an awesome module, Admin can set redirect Customer to the particular page after Logging in successful

##Features of this extension:

###Frontend:
- Redirect Customer to the particular page after Logging in successful
- Apply to multi websites

###Backend:
- Update the landing page and redirect Customer to this page after Logging in successful

##Introduction installation:

###1 - Installation Magento 2 Redirect Customer
#### Manual Installation
Install Redirect Customer for Magento2
 * Download the extension
 * Unzip the file
 * Create a folder {Magento root}/app/code/PHPCuong/RedirectCustomer
 * Copy the content from the unzip folder


#####Using Composer

```
composer require phpcuong/magento2-redirect-customer

```

###2 - Enable FAQ extension
 * php bin/magento module:enable PHPCuong_RedirectCustomer
 * php bin/magento setup:upgrade
 * php bin/magento setup:static-content:deploy

###3 - Settings
Log into your Magento Admin Panel, goto Stores -> Configuration -> Customers -> Customer Configuration

Expand the Login Options section. Then, do the following:

#### - To activate redirect Customer, set Redirect Customer to Account Dashboard after Logging in to “No.”
#### - Type URL valid into the field Redirect Customer to the particular page after Logging in successful

When complete, tap Save Config.

###4 - Clear all the cache
* php bin/magento cache:clean
