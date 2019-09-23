<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Master\Currency;

class CurrencyController extends Controller
{
    public function allCurrncy()
    {
    	return view('admin.master.currency.all-currency');
    }

    public function allCurrncyShow(Request $request)
    {

    	
        
        $columns = array( 
                            0 =>'id', 
                            1 =>'currency_name',
                            2 =>'currency_shortcode'
                        );
  
        $totalData = Currency::count();


            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $countries = Currency::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }
        else {
            $search = $request->input('search.value'); 

            $countries =  Currency::where('id','LIKE',"%{$search}%")
                            ->orWhere('currency_name', 'LIKE',"%{$search}%")
                            ->orWhere('currency_shortcode', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = Currency::where('id','LIKE',"%{$search}%")
                             ->orWhere('currency_name', 'LIKE',"%{$search}%")
                             ->orWhere('currency_shortcode', 'LIKE',"%{$search}%")
                             ->count();
        }

        $data = array();
        if(!empty($countries))
        {
            foreach ($countries as $value)
            {
                $edit =  route('edit.currency',$value->id);

                $nestedData['id'] 					= $value->id;
                $nestedData['currency_name'] 		= $value->currency_name;
                $nestedData['currency_shortcode'] 	= substr(strip_tags($value->currency_shortcode),0,50);
                $nestedData['created_at'] = date('j M Y h:i a',strtotime($value->created_at));
                $nestedData['options'] = "<a href='{$edit}' class='btn btn-sm' style='background-color:#3c968a;color:#fff;' pagename='Single country edit' data-remote='false' data-toggle='modal' data-target='.modal'>edit</a>";
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

    public function addCurrency()
    {
    	return view('admin.master.currency.add-currency');
    }

    public function saveCurrency(Request $request)
    {


    	$currencycheck = Currency::where('currency_name', $request->currency_name)->first();
    	
    	$messageType = "";

    	if(gettype($currencycheck) == 'object'){
    		$messageType = "error";
    		return response()->json([
	            'message' => 'Currency Already Exist, Please Choose Another!!!',
	            'messageType'    => $messageType,
	            'result'  => $currencycheck,
	            'type'  => gettype($currencycheck)
	        ]);
    	} else {
	    	$country = new Currency;
	        $country->currency_name = $request->currency_name;
	        $country->currency_shortcode = $request->currency_shortcode;
	        $country->save();

	        $messageType = "success";
	    	return response()->json([
	            'message' => 'Currency Added successfully.',
	            'data'    => $country,
	            'messageType'    => $messageType,
	        ]);
	    }
    }

    public function editCurrency($id)
    {
    	$currency = Currency::find($id);
    	return view('admin.master.currency.edit-currency', compact('currency'));
    }

    public function updateCurrency(Request $request, $id)
    {

    	$currencycheck = Currency::find($id);
    	
    	$messageType = "";

    	if(gettype($currencycheck) == 'object'){

    		if($currencycheck->currency_name == $request->currency_name){
    			$currencycheck->currency_shortcode = $request->currency_shortcode;
    			$currencycheck->save();

    			$messageType = "success";
    			return response()->json([
		            'message' => 'Currency Description Updated Successfully.',
		            'messageType'    => $messageType,
		            'result'  => $currencycheck,
		            'type'  => gettype($currencycheck)
		        ]);
    		}

    		else {
		        $currencycheck->currency_name 		= $request->currency_name;
		        $currencycheck->currency_shortcode 	= $request->currency_shortcode;
		        $currencycheck->save();

		        $messageType = "success";
		    	return response()->json([
		            'message' => 'Currency Data Updated Successfully.',
		            'data'    => $currencycheck,
		            'messageType'    => $messageType,
		            'result'  => $currencycheck
		        ]);
		    }
    	} 
    	else{
    		$messageType = "error";
    		return response()->json([
	            'message' => 'Something went wrong, please try again!!!',
	            'messageType'    => $messageType,
	            'result'  => $currencycheck,
	        ]);
    	}
    }
}
