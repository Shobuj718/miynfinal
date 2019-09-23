<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Master\Timezone;

class TimezoneController extends Controller
{
    public function allTimezone()
    {
    	return view('admin.master.timezone.all-timezone');
    }

    public function allTimezoneShow(Request $request)
    {

        $columns = array( 
                            0 =>'id', 
                            1 =>'city_name',
                            2 =>'timezone_name',
                            3 =>'timezone_gmt',
                            4 =>'timezone_offset'
                        );
  
        $totalData = Timezone::count();


            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $countries = Timezone::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }
        else {
            $search = $request->input('search.value'); 

            $countries =  Timezone::where('id','LIKE',"%{$search}%")
                            ->orWhere('city_name', 'LIKE',"%{$search}%")
                            ->orWhere('timezone_name', 'LIKE',"%{$search}%")
                            ->orWhere('timezone_gmt', 'LIKE',"%{$search}%")
                            ->orWhere('timezone_offset', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = Timezone::where('id','LIKE',"%{$search}%")
                             ->orWhere('city_name', 'LIKE',"%{$search}%")
                             ->orWhere('timezone_name', 'LIKE',"%{$search}%")
                             ->orWhere('timezone_gmt', 'LIKE',"%{$search}%")
                             ->orWhere('timezone_offset', 'LIKE',"%{$search}%")
                             ->count();
        }

        $data = array();
        if(!empty($countries))
        {
            foreach ($countries as $value)
            {
                $show =  route('country.show',$value->id);
                $edit =  route('edit.timezone',$value->id);

                $nestedData['id'] = $value->id;
                $nestedData['city_name'] = $value->city_name;
                $nestedData['timezone_name'] = $value->timezone_name;
                $nestedData['timezone_gmt'] = $value->timezone_gmt;
                $nestedData['timezone_offset'] = $value->timezone_offset;
                $nestedData['created_at'] = date('j M Y h:i a',strtotime($value->created_at));
                $nestedData['options'] = "<a href='{$edit}' class='btn btn-sm' style='background-color:#3c968a;color:#fff;' pagename='Single timezone edit' data-remote='false' data-toggle='modal' data-target='.modal'>edit</a>";
                $data[] = $nestedData;

            }
        }
          
        $json_data = array(
                    "draw"            => intval($request->input('draw')),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );
            
        echo json_encode($json_data); 
    }

    public function addTimezone()
    {
    	return view('admin.master.timezone.add-timezone');
    }

    public function saveTimezone(Request $request)
    {

    	$messageType = "success";

    	$timezone_name = Timezone::where('timezone_name', $request->timezone_name)
    						->orWhere('city_name', $request->city_name)
    						->first();
    	
    	$messageType = "";

    	if(gettype($timezone_name) == 'object'){
    		$messageType = "error";
    		return response()->json([
	            'message' => 'Timezone/City Already Exist, Please Choose Another!!!',
	            'messageType'    => $messageType,
	            'result'  => $timezone_name,
	            'type'  => gettype($timezone_name)
	        ]);
    	} else {
	    	$timezone = new Timezone;
	        $timezone->city_name   		= $request->city_name;
	        $timezone->timezone_name   	= $request->timezone_name;
	        $timezone->timezone_gmt   	= $request->timezone_gmt;
	        $timezone->timezone_offset 	= $request->timezone_offset;
	        $timezone->save();

	        $messageType = "success";
	    	return response()->json([
	            'message' => 'Data Added successfully.',
	            'data'    => $timezone,
	            'messageType'    => $messageType,
	        ]);
	    }
    }

    public function editTimezone($id)
    {
    	$timezone = Timezone::find($id);
    	return view('admin.master.timezone.edit-timezone', compact('timezone'));
    }

    public function updateTimezone(Request $request, $id)
    {

    	$timezonecheck = Timezone::find($id);

    	/*$messageType = "success";
		    	return response()->json([
		            'message' => 'Timezone Data Updated Successfully.',
		            'data'    => $timezonecheck,
		            'messageType'    => $messageType,
		        ]);*/
    	
    	$messageType = "";

    	if(gettype($timezonecheck) == 'object'){

    		if($timezonecheck->city_name == $request->city_name){
    			$timezonecheck->timezone_name   	= $request->timezone_name;
		        $timezonecheck->timezone_gmt   		= $request->timezone_gmt;
		        $timezonecheck->timezone_offset 	= $request->timezone_offset;
		        $timezonecheck->save();

    			$messageType = "success";
    			return response()->json([
		            'message' => 'Timezone Updated Successfully.',
		            'messageType'    => $messageType,
		            'result'  => $timezonecheck,
		            'type'  => gettype($timezonecheck)
		        ]);
    		}

    		else {
		        $timezonecheck->city_name   		= $request->city_name;
		        $timezonecheck->timezone_name   	= $request->timezone_name;
		        $timezonecheck->timezone_gmt   	= $request->timezone_gmt;
		        $timezonecheck->timezone_offset 	= $request->timezone_offset;
		        $timezonecheck->save();

		        $messageType = "success";
		    	return response()->json([
		            'message' => 'Timezone Data Updated Successfully.',
		            'data'    => $timezonecheck,
		            'messageType'    => $messageType,
		            'result'  => $timezonecheck
		        ]);
		    }
    	} 
    	else{
    		$messageType = "error";
    		return response()->json([
	            'message' => 'Something went wrong, please try again!!!',
	            'messageType'    => $messageType,
	            'result'  => $timezonecheck,
	        ]);
    	}
    }
}
