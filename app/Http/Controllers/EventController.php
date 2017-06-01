<?php
  
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\EventModel;
use League\Csv\Reader;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
  
  
class EventController extends Controller {
	public function loadCsv() 
	{
		//Delete all rows before loading the csv file
		EventModel::truncate();

		$reader = Reader::createFromPath(base_path() . '/public/data.csv');
		
		$reader->setOffset(1)->fetchAll(function ($row)
        {
            DB::table('events')->insert(
                array(
                    'id'      => $row[0],
                    'person'    => $row[1],
                    'location'    => $row[2],
                    'startDate' => $row[3],
                    'endDate' => $row[4],
                    'activity' => $row[5],

                )
            );
        });
	}

	public function index()
	{
		$events  = EventModel::all();

        return response()->json($events);
	}

	public function show($id) {
		$event = EventModel::find($id);

		return response()->json($event);
	}

}