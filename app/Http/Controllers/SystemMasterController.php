<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\SystemMaster;
use Auth;
use Datatables;

class SystemMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
	function __construct()
	{
		parent:: __construct();
	
		$this->middleware(['auth','allowurl']);
		
	}
	
    public function index()
    {
		return view('pages.systemmaster');
    }
	
	public function getdata(){
		
        $data = SystemMaster::get();
        return Datatables::of($data)

        	->addColumn('system_value_txt', function($data) {
        		return ( strlen($data->system_value_txt) > 20 ) ? substr($data->system_value_txt, 0, 20). '<small style="margin-left: 10px; color: #bdbdbd">[...]</small>' : $data->system_value_txt; 
        	})
			->addColumn('option', function($data) {
				return '<input id="children-item-' . $data->id . '" type="checkbox" name="check_row" class="check_row" value="' . $data->item_id . '">';
			})->make(true);

	}

    public function store(Request $request)
    {	
		if ($request->id) {
			$cruds = SystemMaster::findOrFail($request->id);
			$cruds->system_type 		= $request->system_type;
			$cruds->system_code 		= $request->system_code;
			$cruds->system_value_txt 	= $request->system_value_txt;
			$cruds->system_value_num 	= $request->system_value_num;
			$cruds->updated_by 			= Auth::user()->name;
			
			if ($cruds->save()){
				$res = ['title' => trans('label.success'), 'type' => 'success', 'message' => trans('label.update_success')];
				return response()->json($res);

			} else {
				$res = ['title' => 'Error', 'type' => 'error', 'message' => trans('update_failure')];
				return response()->json($res);
			}
		} else {
			$cruds = new SystemMaster();
			$cruds->system_type 		= $request->system_type;
			$cruds->system_code 		= $request->system_code;
			$cruds->system_value_txt 	= $request->system_value_txt;
			$cruds->system_value_num 	= $request->system_value_num;
			$cruds->created_by 			= Auth::user()->name;
			
			if ($cruds->save()){
				$res = ['title' => trans('label.success'), 'type' => 'success', 'message' => trans('label.save_success')];
				return response()->json($res);

			} else {
				$res = ['title' => 'Error', 'type' => 'error', 'message' => trans('label.save_failure')];
				return response()->json($res);
			}
		}
    }

    public function show($id)
    {
        $item = SystemMaster::where('id', $id)->first();
        return $item->toJson();
    }

    public function destroy(Request $request)
    {
		$item = New SystemMaster;
        $ids = $request->id;

        foreach ($ids as $id) {
            $item->where('id', $id)->delete();
        }
		
		$res = ['title' => trans('label.success'), 'type' => 'success', 'message' => count($request->id). trans('label.delete.success')];
		return response()->json($res);
    }
}
