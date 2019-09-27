<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Master\BusinessWiseProfession;
use App\Models\Master\BusinessCategory;

class BusinessWiseProfessionController extends Controller
{
    public function allBusinessWiseProfession()
    {
    	return view('admin.master.business_wise_profession.all-business-wise-profession');
    }

    public function allBusinessWiseProfessionShow(Request $request)
    {

        
        $columns = array( 
                            0 =>'id', 
                            1 =>'profession_name',
                            2 =>'profession_description',
                            3 =>'category_name'
                        );
  
        $totalData = BusinessWiseProfession::count();


            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $profession = BusinessWiseProfession::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }
        else {
            $search = $request->input('search.value'); 

            $profession =  BusinessWiseProfession::where('id','LIKE',"%{$search}%")
                            ->orWhere('profession_name', 'LIKE',"%{$search}%")
                            ->orWhere('profession_description', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = BusinessWiseProfession::where('id','LIKE',"%{$search}%")
                             ->orWhere('profession_name', 'LIKE',"%{$search}%")
                             ->orWhere('profession_description', 'LIKE',"%{$search}%")
                             ->count();
        }

        $data = array();
        if(!empty($profession))
        {
            foreach ($profession as $value)
            {
                $edit =  route('edit.business.wise.profession',$value->id);

                $category = BusinessCategory::find($value->category_id);
                //dd($category);

                $nestedData['id'] 					  = $value->id;
                $nestedData['profession_name'] 		  = $value->profession_name;
                $nestedData['profession_description'] = $value->profession_description;
                $nestedData['category_name'] 		  = $category->business_category_name ?? '';
                $nestedData['created_at'] = date('j M Y h:i a',strtotime($value->created_at));
                $nestedData['options'] = "<a href='{$edit}' class='btn btn-sm' style='background-color:#3c968a;color:#fff;' pagename='Single business wise profession edit' data-remote='false' data-toggle='modal' data-target='.modal'>edit</a>";
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

    public function addBusinessWiseProfession()
    {
    	$categories = BusinessCategory::all();

    	return view('admin.master.business_wise_profession.add', compact('categories'));
    }

    public function saveBusinessWiseProfession(Request $request)
    {

    	try {
    		
	    	$featureCheck = BusinessWiseProfession::where('profession_name', $request->profession_name)->first();
	    	
	    	$messageType = "";

	    	if(gettype($featureCheck) == 'object'){
	    		$messageType = "error";
	    		return response()->json([
		            'message' => 'Profession Name Already Exist, Please Choose Another!!!',
		            'messageType'    => $messageType,
		            'result'  => $featureCheck,
		            'type'  => gettype($featureCheck)
		        ]);
	    	} else {
		    	$profession 				 = new BusinessWiseProfession;
		        $profession->profession_name = $request->profession_name;
		        $profession->profession_description    	 = $request->profession_description;
		        $profession->category_id    	 = $request->category_id;
		        $profession->save();

		        $messageType = "success";
		    	return response()->json([
		            'message' => 'Profession Added successfully.',
		            'data'    => $profession,
		            'messageType'    => $messageType,
		        ]);
		    }
    	} catch (\Exception $e) {
    		$messageType = "error";
    		return response()->json([
		            'message' => 'Something went wrong, Please try again!!!',
		            'messageType'    => $messageType
		        ]);
    	}
    }

    public function editBusinessWiseProfession($id)
    {
    	$categories = BusinessCategory::all();
    	$profession = BusinessWiseProfession::find($id);
    	return view('admin.master.business_wise_profession.edit', compact('profession', 'categories'));
    }

    public function updateBusinessWiseProfession(Request $request, $id)
    {
    	try {

    		$professionCheck = BusinessWiseProfession::find($id);
    	
	    	$messageType = "";

	    	if(gettype($professionCheck) == 'object'){

	    		if($professionCheck->profession_name == $request->profession_name){

                    $result = \DB::table('business_wise_professions')->where('id', $id)->update([
                    		'profession_description' => $request->profession_description,
                    		'category_id' 			 => $request->category_id
                    	]);

                    if($result){
                        $messageType = "success";
                        return response()->json([
                            'message' => 'Profession Data Updated Successfully.',
                            'messageType'    => $messageType,
                            'result'  => $result
                        ]);
                    }else{
                        $messageType = "error";
                        return response()->json([
                            'message' => 'Profession Data Not Updated.',
                            'messageType'    => $messageType,
                            'result'  => $result
                        ]);
                    }
	    			
	    		}

	    		else {
			        $professionCheck->profession_name = $request->profession_name;
			        $professionCheck->profession_description = $request->profession_description;
			        $professionCheck->category_id = $request->category_id;
			        $professionCheck->save();

			        $messageType = "success";
			    	return response()->json([
			            'message' => 'Profession Data Updated Successfully.',
			            'data'    => $professionCheck,
			            'messageType'    => $messageType,
			            'result'  => $professionCheck
			        ]);
			    }
	    	} 
    	} catch (\Exception $e) {
    		$messageType = "error";
    		return response()->json([
		            'message' => 'Something went wrong, please try again!!!.',
		            'messageType'    => $messageType
		        ]);
    	}
    }
}
