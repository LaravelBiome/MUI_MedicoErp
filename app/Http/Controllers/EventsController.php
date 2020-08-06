<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Calendar ;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\Events;


class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Events::get();
        $event_list = [];

    	foreach ($events as $key => $event) {

            $enddate = $event->end_date."24:00:00";

    		$event_list[] = \Calendar::event(
                $event->event_title,
                false,
                new \DateTime($event->start_date),
                new \DateTime($event->end_date)
            );
    	}
    	$calendar_details = \Calendar::addEvents($event_list);
        return view('pages.calendar.index', compact('calendar_details') );
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.calendar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'event_title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        if ($validator->fails()) {
            toast('Enter a valid event','warning','top-right')->background('#FFFFF0')->autoClose(2000);
            //->withInput()->withErrors($validator);
           return back();
        }else{
            $event = new Events;
            $event->event_title = $request['event_title'];
            $event->start_date = $request['start_date'];
            $event->end_date = $request['end_date'];
            $event->save();

            toast('Event added successfully','success','top-right')->background('#FFFFF0')->autoClose(2000);
            return Redirect::to('calendar');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
