<?php 
namespace App/Models;
use Eloquent;

class Contact extends Eloquent {

 public function sender() {
        return $this->belongsTo('App\Models\Contact', 'sender_id');
  }
  
  public function recipient()
  {
        return $this->belongsTo('App\Models\Contact', 'recipient_id');
  }
}
