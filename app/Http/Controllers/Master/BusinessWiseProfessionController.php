<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Master\BusinessWiseProfession;

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
                            3 =>'category_id'
                        );
  
        $totalData = BusinessWiseProfession::count();


            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $countries = BusinessWiseProfession::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }
        else {
            $search = $request->input('search.value'); 

            $countries =  BusinessWiseProfession::where('id','LIKE',"%{$search}%")
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
        if(!empty($countries))
        {
            foreach ($countries as $value)
            {
                $edit =  route('edit.business.category',$value->id);

                $nestedData['id'] 					  = $value->id;
                $nestedData['profession_name'] 		  = $value->profession_name;
                $nestedData['profession_description'] = $value->profession_description;
                $nestedData['category_id'] 			  = $value->category_id;
                $nestedData['created_at'] = date('j M Y h:i a',strtotime($value->created_at));
                $nestedData['options'] = "<a href='{$edit}' class='btn btn-sm' style='background-color:#3c968a;color:#fff;' pagename='Single business category edit' data-remote='false' data-toggle='modal' data-target='.modal'>edit</a>";
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
}
