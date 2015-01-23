random-text-forwarder
===================


Application build with Twilio to create a network of SMS senders with random recipients.

----------


Installation and Configuration
-------------


The app should be deploy on a server dedicated to laravel framework, and have a public visibility, to be able to communicate with twilio api. 
works with a twilio trial account, add the path to the route 'incoming' in 'messaging', here :
https://www.twilio.com/user/account/phone-numbers/incoming

app has been build with the help of the tutorial here :
https://www.twilio.com/blog/2014/09/getting-started-with-twilio-and-the-laravel-framework-for-php.html

At the root of your project, the same level as composer.json, create a  file called “.env.php” . This PHP code will return an associative array of configuration variables that will be made available to your application .

composer install has to be run .
run the  command php artisan migrations to create the tables of the database.

-
