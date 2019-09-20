<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Master\Feature;

class FeatureController extends Controller
{
    public function allFeature()
    {
    	return view('admin.master.feature.all-feature');
    }

    public function allFeatureShow(Request $request)
    {


        
        $columns = array( 
                            0 =>'id', 
                            1 =>'feature_name'
                        );
  
        $totalData = Feature::count();


            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $countries = Feature::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }
        else {
            $search = $request->input('search.value'); 

            $countries =  Feature::where('id','LIKE',"%{$search}%")
                            ->orWhere('feature_name', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = Feature::where('id','LIKE',"%{$search}%")
                             ->orWhere('feature_name', 'LIKE',"%{$search}%")
                             ->count();
        }

        $data = array();
        if(!empty($countries))
        {
            foreach ($countries as $value)
            {
                $edit =  route('edit.feature',$value->id);

                $nestedData['id'] 					= $value->id;
                $nestedData['feature_name'] 		= $value->feature_name;
                $nestedData['created_at'] = date('j M Y h:i a',strtotime($value->created_at));
                $nestedData['options'] = "<a href='{$edit}' class='btn btn-sm btn-warning ' pagename='Single feature edit' data-remote='false' data-toggle='modal' data-target='.modal'>edit</a>";
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

    public function addFeature()
    {
    	return view('admin.master.feature.add-feature');
    }

    public function saveFeature(Request $request)
    {


    	$featureCheck = Feature::where('feature_name', $request->feature_name)->first();
    	
    	$messageType = "";

    	if(gettype($featureCheck) == 'object'){
    		$messageType = "error";
    		return response()->json([
	            'message' => 'Feature Already Exist, Please Choose Another!!!',
	            'messageType'    => $messageType,
	            'result'  => $featureCheck,
	            'type'  => gettype($featureCheck)
	        ]);
    	} else {
	    	$feature = new Feature;
	        $feature->feature_name = $request->feature_name;
	        $feature->save();

	        $messageType = "success";
	    	return response()->json([
	            'message' => 'Feature Added successfully.',
	            'data'    => $feature,
	            'messageType'    => $messageType,
	        ]);
	    }
    }

    public function editFeature($id)
    {
    	$feature = Feature::find($id);
    	return view('admin.master.feature.edit-feature', compact('feature'));
    }

    public function updateFeature(Request $request, $id)
    {

    	try {
	    	$featureCheck = Feature::find($id);
	    	
	    	$messageType = "";

	    	if(gettype($featureCheck) == 'object'){

	    		if($featureCheck->feature_name == $request->feature_name){

	    			$messageType = "error";
	    			return response()->json([
			            'message' => 'Feature Already Exist, Please Choose Another!!!',
			            'messageType'    => $messageType,
			            'result'  => $featureCheck,
			            'type'  => gettype($featureCheck)
			        ]);
	    		}

	    		else {
			        $featureCheck->feature_name 		= $request->feature_name;
			        $featureCheck->save();

			        $messageType = "success";
			    	return response()->json([
			            'message' => 'Feature Data Updated Successfully.',
			            'data'    => $featureCheck,
			            'messageType'    => $messageType,
			            'result'  => $featureCheck
			        ]);
			    }
	    	} 
	    	else{
	    		$messageType = "error";
	    		return response()->json([
		            'message' => 'Something went wrong, please try again!!!',
		            'messageType'    => $messageType,
		            'result'  => $featureCheck,
		        ]);
	    	}
    	} catch (\Exception $e) {
    		$messageType = "error";
    		return response()->json([
		            'message' => 'Feature Already Exist, Please Choose Another!!!',
		            'messageType'    => $messageType
		        ]);
    	}
    	
    }
}
