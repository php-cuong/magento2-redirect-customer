# Magento 2 Redirect the customer to a custom page after logging in
By default, Magento 2 provides us with a feature, that allows redirecting the customer to account dashboard after logging in, you can enable this feature by going to Stores → Settings → Configuration → Customers → Customer Configuration → Login Options

Set the field named "Redirect Customer to Account Dashboard after Logging in" to Yes

This feature is working perfectly, however, Magento 2 doesn't support to redirect the customer to a particular page after logging in, if your project requires to use this feature, today I show you the best codes to complete your task.

So what will we do in this practice?

1. We will create a new module called PHPCuong_CustomerRedirecting
2. We will create an additional field saves the custom page in the configuration
3. We will use the event named customer_login to redirect the customer to that custom page after logging in successfully

Before doing this practice, you need to understand, How to use events and observers in Magento 2, if you don't watch the video about this lesson yet, you can watch it here http://bit.ly/2QwDfpL

## Step 1: Declaring the new module called PHPCuong_CustomerRedirecting
- Create the namespace PHPCuong in the path app\code
- Create the module named CustomerRedirecting in the path app\code\PHPCuong
- Create the file named registration.php in the path app\code\PHPCuong\CustomerRedirecting
- Create the file named module.xml in the path app\code\PHPCuong\CustomerRedirecting\etc

## Step 2: Create an additional field saves the custom page in the configuration
- Create the new file named system.xml in the path app\code\PHPCuong\CustomerRedirecting\etc\adminhtml

## Step 3: Subscribing to the event named customer_login
- Create the new file named events.xml in the path app\code\PHPCuong\CustomerRedirecting\etc\frontend
- Create the new file named CustomerLogin.php in the path app\code\PHPCuong\CustomerRedirecting\Observer

## Step 4: Test and see the results
1. Run the following command lines:
php bin/magento setup:upgrade --keep-generated

2. Test the results
Go to the Magento Admin Panel → Stores → Settings → Configuration → Customers → Customer Configuration → Login Options
Set the custom page.

## See the video about this tutorial
1. Youtube:
2. Facebook:
