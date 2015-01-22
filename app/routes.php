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

Route::match(array('GET', 'POST'), '/incoming', function()
{
  //return App\Models\Message::find(5)->sender->phoneNumber;
  //$message =  Mixsenger::getRandomRecipient(App\Models\Message::find(5));
  //return $message->recipient->phoneNumber;
  $sid = Input::get('MessageSid');
  $from = Input::get('From');
  $to = Input::get('To');
  $body = Input::get('Body');
  $message =  Mixsenger::addMessage($sid, $from, $body);
  $message =  Mixsenger::getRandomRecipient($message);
  $client = new Services_Twilio($_ENV['TWILIO_ACCOUNT_SID'], $_ENV['TWILIO_AUTH_TOKEN']);

  // Use the Twilio REST API client to send a text message
  $m = $client->account->messages->sendMessage(
    $_ENV['TWILIO_NUMBER'], // the text will be sent from your Twilio number
    $message->recipient->phoneNumber, // the phone number the text will be sent to
    $message->body // the body of the text message
  );

  // Return the message object to the browser as JSON
  return $m;
});