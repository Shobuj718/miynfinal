<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Master\Industry;

class IndustryController extends Controller
{
    public function allIndustry()
    {
    	return view('admin.master.industry.all-industry');
    }

    public function allIndustryShow(Request $request)
    {

        
        $columns = array( 
                            0 =>'id', 
                            1 =>'industry_name'
                        );
  
        $totalData = Industry::count();


            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $countries = Industry::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }
        else {
            $search = $request->input('search.value'); 

            $countries =  Industry::where('id','LIKE',"%{$search}%")
                            ->orWhere('industry_name', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = Industry::where('id','LIKE',"%{$search}%")
                             ->orWhere('industry_name', 'LIKE',"%{$search}%")
                             ->count();
        }

        $data = array();
        if(!empty($countries))
        {
            foreach ($countries as $value)
            {
                $edit =  route('edit.industry',$value->id);

                $nestedData['id'] 					= $value->id;
                $nestedData['industry_name'] 		= $value->industry_name;
                $nestedData['created_at'] = date('j M Y h:i a',strtotime($value->created_at));
                $nestedData['options'] = "<a href='{$edit}' class='btn btn-sm' style='background-color:#3c968a;color:#fff;' pagename='Single industry edit' data-remote='false' data-toggle='modal' data-target='.modal'>edit</a>";
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

    public function addIndustry()
    {
    	return view('admin.master.industry.add-industry');
    }

    public function saveIndustry(Request $request)
    {

    	$currencycheck = Industry::where('industry_name', $request->industry_name)->first();
    	
    	$messageType = "";

    	if(gettype($currencycheck) == 'object'){
    		$messageType = "error";
    		return response()->json([
	            'message' => 'Industry Already Exist, Please Choose Another!!!',
	            'messageType'    => $messageType,
	            'result'  => $currencycheck,
	            'type'  => gettype($currencycheck)
	        ]);
    	} else {
	    	$country = new Industry;
	        $country->industry_name = $request->industry_name;
	        $country->save();

	        $messageType = "success";
	    	return response()->json([
	            'message' => 'Industry Added successfully.',
	            'data'    => $country,
	            'messageType'    => $messageType,
	        ]);
	    }
    }
    public function editIndustry($id)
    {
    	$industry = Industry::find($id);
    	return view('admin.master.industry.edit-industry', compact('industry'));
    }

    public function updateIndustry(Request $request, $id)
    {

    	$industrycheck = Industry::find($id);
    	
    	$messageType = "";

    	if(gettype($industrycheck) == 'object'){

    		if($industrycheck->industry_name == $request->industry_name){

    			$messageType = "error";
    			return response()->json([
		            'message' => 'Industry Data Not Updated.',
		            'messageType'    => $messageType,
		            'result'  => $industrycheck,
		            'type'  => gettype($industrycheck)
		        ]);
    		}

    		else {
		        $industrycheck->industry_name 		= $request->industry_name;
		        $industrycheck->save();

		        $messageType = "success";
		    	return response()->json([
		            'message' => 'Industry Data Updated Successfully.',
		            'data'    => $industrycheck,
		            'messageType'    => $messageType,
		            'result'  => $industrycheck
		        ]);
		    }
    	} 
    	else{
    		$messageType = "error";
    		return response()->json([
	            'message' => 'Something went wrong, please try again!!!',
	            'messageType'    => $messageType,
	            'result'  => $industrycheck,
	        ]);
    	}
    }
}
