<?php namespace App;
  
use Illuminate\Database\Eloquent\Model;
  
class EventModel extends Model
{
     
     protected $fillable = ['person', 'location', 'startDate', 'endDate', 'activity'];
     
     protected $table = 'events';
}