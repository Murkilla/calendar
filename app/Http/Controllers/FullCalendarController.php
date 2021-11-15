<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Redirect,Response;

class FullCalendarController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $start = (!empty($_GET['start'])) ? ($_GET['start']) : ('');
            $end = (!empty($_GET['end'])) ? ($_GET['end']) : ('');
            //$data = Event::whereDate('start', '>=', $start)->whereDate('end','<=',$end)->get(['id','title','start','end']);
            $selectArr = [ 'start' => $start,
                            'end' => $end
                        ];
            $data = Event::select($selectArr);
            return Response::json($data);
        }
        return view('fullcalendar');
    }
    
    public function create(Request $request)
    {  
        $insertArr = [ 'title' => $request->title,
                       'start' => $request->start,
                       'end' => $request->end
                    ];
        $event = Event::cus_insert($insertArr);  
        return Response::json($event);
    }
     
 
    public function update(Request $request)
    {   
        $updateArr = [  'id' => $request->id,
                        'title' => $request->title,
                        'start' => $request->start,
                        'end' => $request->end 
                    ];
        $event  = Event::cus_update($updateArr);
 
        return Response::json($event);
    } 
 
 
    public function destroy(Request $request)
    {
        $deleteArr = ['id' => $request->id];
        $event = Event::cus_delete($deleteArr);
   
        return Response::json($event);
    }
}
