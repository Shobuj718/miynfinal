<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Master\Country;
use App\Models\Master\Package;

class CountryContrller extends Controller
{
	public function allCountry(){
		return view('admin.master.country.all-country');
	}
    public function allCountryShow(Request $request)
    {
    	
        $columns = array( 
                            0 =>'id', 
                            1 =>'country_name',
                            2 =>'country_code'
                        );
  
        $totalData = Country::count();


            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $countries = Country::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }
        else {
            $search = $request->input('search.value'); 

            $countries =  Country::where('id','LIKE',"%{$search}%")
                            ->orWhere('country_name', 'LIKE',"%{$search}%")
                            ->orWhere('country_code', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = Country::where('id','LIKE',"%{$search}%")
                             ->orWhere('country_name', 'LIKE',"%{$search}%")
                             ->orWhere('country_code', 'LIKE',"%{$search}%")
                             ->count();
        }

        $data = array();
        if(!empty($countries))
        {
            foreach ($countries as $value)
            {
                $edit =  route('country.edit',$value->id);

                $nestedData['id'] = $value->id;
                $nestedData['country_name'] = $value->country_name;
                $nestedData['country_code'] = substr(strip_tags($value->country_code),0,50);
                $nestedData['created_at'] = date('j M Y h:i a',strtotime($value->created_at));
                $nestedData['options'] = "<a href='{$edit}' class='btn btn-sm btn-warning ' pagename='Single country edit' data-remote='false' data-toggle='modal' data-target='.modal'>edit</a>";
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
    public function addCountry()
    {
    	return view('admin.master.country.add-country');
    }
    public function insertCountry(Request $request)
    {

    	$country_name = Country::where('country_name', $request->country_name)->first();
    	
    	$messageType = "";

    	if(gettype($country_name) == 'object'){
    		$messageType = "error";
    		return response()->json([
	            'message' => 'Country Already Exist, Please Choose Another!!!',
	            'messageType'    => $messageType,
	            'result'  => $country_name,
	            'type'  => gettype($country_name)
	        ]);
    	} else {
	    	$country = new Country;
	        $country->country_name = $request->country_name;
	        $country->country_code = $request->country_code;
	        $country->save();

	        $messageType = "success";
	    	return response()->json([
	            'message' => 'Country Added successfully.',
	            'data'    => $country,
	            'messageType'    => $messageType,
	        ]);
	    }
    }

    public function editCountry($id)
    {
    	$country = Country::find($id);
    	return view('admin.master.country.edit', compact('country'));
    }

    public function updateCountry(Request $request, $id)
    {

    	$contrycheck = Country::find($id);
    	
    	$messageType = "";

    	if(gettype($contrycheck) == 'object'){

    		if($contrycheck->country_name == $request->country_name){
    			$contrycheck->country_code = $request->country_code;
    			$contrycheck->save();

    			$messageType = "success";
    			return response()->json([
		            'message' => 'Country Description Updated Successfully.',
		            'messageType'    => $messageType,
		            'result'  => $contrycheck,
		            'type'  => gettype($contrycheck)
		        ]);
    		}

    		else {
		        $contrycheck->country_name = $request->country_name;
		        $contrycheck->country_code = $request->country_code;
		        $contrycheck->save();

		        $messageType = "success";
		    	return response()->json([
		            'message' => 'Country Data Updated Successfully.',
		            'data'    => $contrycheck,
		            'messageType'    => $messageType,
		            'result'  => $contrycheck
		        ]);
		    }
    	} 
    	else{
    		$messageType = "error";
    		return response()->json([
	            'message' => 'Something went wrong, please try again!!!',
	            'messageType'    => $messageType,
	            'result'  => $contrycheck,
	        ]);
    	}
    }
}
