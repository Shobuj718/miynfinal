<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Master\Language;

class LanguageController extends Controller
{
    public function allLanguage()
    {
    	return view('admin.master.language.all-language');
    }

    public function allLanguageShow(Request $request)
    {



        
        $columns = array( 
                            0 =>'id', 
                            1 =>'language_name',
                            2 =>'short_name'
                        );
  
        $totalData = Language::count();


            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $countries = Language::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }
        else {
            $search = $request->input('search.value'); 

            $countries =  Language::where('id','LIKE',"%{$search}%")
                            ->orWhere('language_name', 'LIKE',"%{$search}%")
                            ->orWhere('short_name', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = Language::where('id','LIKE',"%{$search}%")
                             ->orWhere('language_name', 'LIKE',"%{$search}%")
                             ->orWhere('short_name', 'LIKE',"%{$search}%")
                             ->count();
        }

        $data = array();
        if(!empty($countries))
        {
            foreach ($countries as $value)
            {
                $edit =  route('edit.language',$value->id);

                $nestedData['id'] 					= $value->id;
                $nestedData['language_name'] 		= $value->language_name;
                $nestedData['short_name'] 			= $value->short_name;
                $nestedData['created_at'] = date('j M Y h:i a',strtotime($value->created_at));
                $nestedData['options'] = "<a href='{$edit}' class='btn btn-sm' style='background-color:#3c968a;color:#fff;' pagename='Single language edit' data-remote='false' data-toggle='modal' data-target='.modal'>edit</a>";
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

    public function addLanguage(Request $request)
    {
    	return view('admin.master.language.add-language');
    }

    public function saveLanguage(Request $request)
    {
    	try {
    		
	    	$featureCheck = Language::where('language_name', $request->language_name)->first();
	    	
	    	$messageType = "";

	    	if(gettype($featureCheck) == 'object'){
	    		$messageType = "error";
	    		return response()->json([
		            'message' => 'Language Already Exist, Please Choose Another!!!',
		            'messageType'    => $messageType,
		            'result'  => $featureCheck,
		            'type'  => gettype($featureCheck)
		        ]);
	    	} else {
		    	$feature = new Language;
		        $feature->language_name = $request->language_name;
		        $feature->short_name    = $request->short_name;
		        $feature->save();

		        $messageType = "success";
		    	return response()->json([
		            'message' => 'Language Added successfully.',
		            'data'    => $feature,
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

    public function editLanguage($id)
    {
    	$language = Language::find($id);
    	return view('admin.master.language.edit-language', compact('language'));
    }

    public function updateLanguage(Request $request, $id)
    {


    	try {

    		$languageCheck = Language::find($id);
    	
	    	$messageType = "";

	    	if(gettype($languageCheck) == 'object'){

	    		if($languageCheck->language_name == $request->language_name){
	    			$languageCheck->short_name 	 = $request->short_name;
	    			$languageCheck->save();

	    			$messageType = "success";
	    			return response()->json([
			            'message' => 'Language Short Name Updated Successfully.',
			            'messageType'    => $messageType,
			            'result'  => $languageCheck,
			            'type'  => gettype($languageCheck)
			        ]);
	    		}

	    		else {
			        $languageCheck->language_name = $request->language_name;
			        $languageCheck->short_name = $request->short_name;
			        $languageCheck->save();

			        $messageType = "success";
			    	return response()->json([
			            'message' => 'Language Data Updated Successfully.',
			            'data'    => $languageCheck,
			            'messageType'    => $messageType,
			            'result'  => $languageCheck
			        ]);
			    }
	    	} 
	    	else{
	    		$messageType = "error";
	    		return response()->json([
		            'message' => 'Something went wrong, please try again!!!',
		            'messageType'    => $messageType,
		            'result'  => $languageCheck,
		        ]);
	    	}
    	} catch (\Exception $e) {
    		$messageType = "error";
    		return response()->json([
		            'message' => 'Language Name Already Exist, Please Choose Another.',
		            'messageType'    => $messageType
		        ]);
    	}
    }
}
