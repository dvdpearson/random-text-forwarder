<?php namespace ThomasRag\Mixsenger;
 use App\Models\Contact;
 use App\Models\Message;
 class Mixsenger {
 
  public static function addMessage($sid, $from, $body){
      $contact = Contact::where('phoneNumber', $from)->first();
      if (!$contact)  {
        $contact = new Contact;
        $contact->phoneNumber = $from;
        $contact->active = true;
        $contact->save();
      }
      $message = new Message;
      $message->twilio_sid = $sid;
      $message->body = $body;
      $message->sender_id = $contact->id;
      $message->status = 'created';
      $message->save();
      return $message;
          
  }
  public function getRandomRecipient($message){
      
    $contacts = Contact::get()->filter(function($contact) use ($message) {
        if ($contact->id != $message->sender_id) {
            return true;
        }
    });      
    $message->recipient_id = $contacts->random()->id;
    $message->save();
    return $message;
  }
}