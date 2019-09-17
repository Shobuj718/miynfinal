<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Master\Package;

class PackageController extends Controller
{
    public function allPackages()
    {
    	$packages = Package::all();

    	return view('admin.master.packages.all-packages', compact('packages'));
    }

    public function packageJsonData()
    {

    	$packages = Package::all();



    	$requestData['draw'] = 10;
    	$totalData = 10;
    	$totalFiltered = 10;


        $response = [
            "draw"            => intval( $requestData['draw'] ),  
			"recordsTotal"    => intval( $totalData ),  
			"recordsFiltered" => intval( $totalFiltered ), 
			"data"            => $packages  
        ];

        //return response()->json($response, 200);

    	/*$packages = Package::all();
    	//dd($packages);
    	$packages = json_encode($packages);*/

    	return view('admin.master.packages.packages-json-data', compact('response'));
    }

    public function CheckallPackages(Request $request)
    {
    	$totalData = Package::all();

        dd($totalData);
          
    }

    public function allPosts(Request $request)
    {
        
        $columns = array( 
                            0 =>'id', 
                            1 =>'package_name'
                        );
  
        $totalData = Package::count();


            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $posts = Package::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }
        else {
            $search = $request->input('search.value'); 

            $posts =  Package::where('id','LIKE',"%{$search}%")
                            ->orWhere('package_name', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = Package::where('id','LIKE',"%{$search}%")
                             ->orWhere('package_name', 'LIKE',"%{$search}%")
                             ->count();
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $show =  route('package.show',$post->id);
                $edit =  route('package.edit',$post->id);

                $nestedData['id'] = $post->id;
                $nestedData['package_name'] = $post->package_name;
                $nestedData['package_description'] = substr(strip_tags($post->package_description),0,50)."...";
                $nestedData['created_at'] = date('j M Y h:i a',strtotime($post->created_at));
                $nestedData['options'] = "<a href='{$edit}' class='btn btn-sm btn-warning ' pagename='Single package edit' data-remote='false' data-toggle='modal' data-target='.modal'>edit</a>";
                $data[] = $nestedData;

                /*<a href='{$show}' class='btn btn-sm btn-info ' pagename='Single package details' data-remote='false' data-toggle='modal' data-target='.modal' >show</a>*/

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

    public function modalData()
    {
    	$packages = Package::all();
    	//return json_code($packages); 
    	//return $packages;
    	return view('admin.master.packages.modal-data');
    }
    public function modalDataCheck()
    {
    	$packages = Package::all();
    	//return json_code($packages); 
    	//return $packages;
    	return view('admin.master.packages.modal-data-check');
    }

    public function packageAddNew(Request $request)
    {

    	$exist_package_name = Package::where('package_name', $request->package_name)->first();
    	
    	$messageType = "";

    	if(gettype($exist_package_name) == 'object'){
    		$messageType = "error";
    		return response()->json([
	            'message' => 'Package Already Exist, Please Choose Another!!!',
	            'messageType'    => $messageType,
	            'result'  => $exist_package_name,
	            'type'  => gettype($exist_package_name)
	        ]);
    	} else {
	    	$package = new Package;
	        $package->package_name = $request->package_name;
	        $package->package_description = $request->package_description;
	        $package->save();

	        $messageType = "success";
	    	return response()->json([
	            'message' => 'Package Added successfully.',
	            'data'    => $package,
	            'messageType'    => $messageType,
	            'result'  => $exist_package_name
	        ]);
	    }
    }

    public function showPackage($id)
    {
    	$package = Package::find($id);

    	return view('admin.master.packages.package-show', compact('package'));
    }

    public function editPackage($id)
    {
    	$package = Package::find($id);

    	return view('admin.master.packages.package-edit', compact('package'));
    }

    public function updatePackage(Request $request, $id)
    {
    	$packagecheck = Package::find($id);

    	//$exist_package_name = Package::where('package_name', $request->package_name)->first();
    	
    	$messageType = "";

    	if(gettype($packagecheck) == 'object'){

    		if($packagecheck->package_name == $request->package_name){
    			$packagecheck->package_description = $request->package_description;
    			$packagecheck->save();

    			$messageType = "success";
    			return response()->json([
		            'message' => 'Package Description Updated Successfully.',
		            'messageType'    => $messageType,
		            'result'  => $packagecheck,
		            'type'  => gettype($packagecheck)
		        ]);
    		}

    		else {
		        $packagecheck->package_name = $request->package_name;
		        $packagecheck->package_description = $request->package_description;
		        $packagecheck->save();

		        $messageType = "success";
		    	return response()->json([
		            'message' => 'Package Data Updated Successfully.',
		            'data'    => $packagecheck,
		            'messageType'    => $messageType,
		            'result'  => $packagecheck
		        ]);
		    }
    	} 
    	else{
    		$messageType = "error";
    		return response()->json([
	            'message' => 'Something went wrong, please try again!!!',
	            'messageType'    => $messageType,
	            'result'  => $packagecheck,
	        ]);
    	}
    }
}
