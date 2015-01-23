<?php 
namespace ThomasRag\Mixsenger\Facades;
 
use Illuminate\Support\Facades\Facade;
 
class Mixsenger extends Facade {
 
  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor() { return 'mixsenger'; }
 
}