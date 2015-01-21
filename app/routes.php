<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::match(array('GET', 'POST'), '/textReceive', function()
{
    $AccountSid = "AC59fb1f6071623fde6d59b872247393df";
    $AuthToken = "b3be4502092b2d7b7f1216351612186b";

    $number = $_REQUEST['From'];
    $message = $_REQUEST['Message'];

    $client = new Services_Twilio($AccountSid, $AuthToken);

    $message = $client->account->messages->create(array(
        "From" => "514-500-0476",
        "To" => "418-815-9091",
        "Body" => "ton num : ".$number." et ton txt:".$message,
    ));

    return "";
    //$xml = '<Response><Say>Hello - your app just answered the phone. Neat, eh?</Say></Response>';
    //$response = Response::make($xml, 200);
    //$response->header('Content-Type', 'text/xml');
    //return $response;
});

/*

/receive (text message received from someone)
----> Send text message to a random phone number 

Available doc : https://www.twilio.com/blog/2014/09/getting-started-with-twilio-and-the-laravel-framework-for-php.html
*
