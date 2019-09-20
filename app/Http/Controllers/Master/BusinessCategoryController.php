<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Master\BusinessCategory;

class BusinessCategoryController extends Controller
{
    public function allBusinessCategory()
    {
    	return view('admin.master.businesscategory.all-business-category');
    }

    public function allBusinessCategoryShow(Request $request)
    {
        
        $columns = array( 
                            0 =>'id', 
                            1 =>'business_category_name'
                        );
  
        $totalData = BusinessCategory::count();


            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $countries = BusinessCategory::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }
        else {
            $search = $request->input('search.value'); 

            $countries =  BusinessCategory::where('id','LIKE',"%{$search}%")
                            ->orWhere('business_category_name', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = BusinessCategory::where('id','LIKE',"%{$search}%")
                             ->orWhere('business_category_name', 'LIKE',"%{$search}%")
                             ->count();
        }

        $data = array();
        if(!empty($countries))
        {
            foreach ($countries as $value)
            {
                $edit =  route('edit.business.category',$value->id);

                $nestedData['id'] 					= $value->id;
                $nestedData['business_category_name'] 		= $value->business_category_name;
                $nestedData['created_at'] = date('j M Y h:i a',strtotime($value->created_at));
                $nestedData['options'] = "<a href='{$edit}' class='btn btn-sm btn-warning ' pagename='Single business category edit' data-remote='false' data-toggle='modal' data-target='.modal'>edit</a>";
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

    public function addBusinessCategory()
    {
    	return view('admin.master.businesscategory.add-business-category');
    }

    public function saveBusinessCategory(Request $request)
    {

    	$businessCategoryCheck = BusinessCategory::where('business_category_name', $request->business_category_name)->first();
    	
    	$messageType = "";

    	if(gettype($businessCategoryCheck) == 'object'){
    		$messageType = "error";
    		return response()->json([
	            'message' => 'Business Category Already Exist, Please Choose Another!!!',
	            'messageType'    => $messageType,
	            'result'  => $businessCategoryCheck,
	            'type'  => gettype($businessCategoryCheck)
	        ]);
    	} else {
	    	$businessCategory = new BusinessCategory;
	        $businessCategory->business_category_name = $request->business_category_name;
	        $businessCategory->save();

	        $messageType = "success";
	    	return response()->json([
	            'message' => 'Business Category Added successfully.',
	            'data'    => $businessCategory,
	            'messageType'    => $messageType,
	        ]);
	    }
    }

    public function editBusinessCategory($id)
    {
    	$businessCategory = BusinessCategory::find($id);
    	return view('admin.master.businesscategory.edit-business-category', compact('businessCategory'));
    }

    public function updateBusinessCategory(Request $request, $id)
    {


    	$businessCategoryCheck = BusinessCategory::find($id);

    	
    	$messageType = "";

    	if(gettype($businessCategoryCheck) == 'object'){

    		if($businessCategoryCheck->business_category_name == $request->business_category_name){

    			$messageType = "error";
    			return response()->json([
		            'message' => 'Business Category Already Exist, Please Choose Another!!!',
		            'messageType'    => $messageType,
		            'result'  => $businessCategoryCheck,
		            'type'  => gettype($businessCategoryCheck)
		        ]);
    		}

    		else {
		        $businessCategoryCheck->business_category_name 		= $request->business_category_name;
		        $businessCategoryCheck->save();

		        $messageType = "success";
		    	return response()->json([
		            'message' => 'Business Category Updated Successfully.',
		            'data'    => $businessCategoryCheck,
		            'messageType'    => $messageType,
		            'result'  => $businessCategoryCheck
		        ]);
		    }
    	} 
    	else{
    		$messageType = "error";
    		return response()->json([
	            'message' => 'Something went wrong, please try again!!!',
	            'messageType'    => $messageType,
	            'result'  => $businessCategoryCheck,
	        ]);
    	}
    }
}
