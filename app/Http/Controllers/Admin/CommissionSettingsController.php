<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Commission;
use DB;
class CommissionSettingsController extends Controller
{
    public function index()
    {
    	$comm=Commission::get();
    	$collect=collect($comm);
    	return view('admin.settings.commission',compact('collect'));
    }

    public function store(Request $request)
    {
        try {

        DB::beginTransaction();
    	Commission::truncate();
    	for ($i=0; $i < sizeof($request->lebel_id) ; $i++) { 
	    	$save=new Commission();
	    	$save->level_id=$request->lebel_id[$i];
	    	$save->percent=$request->lebel_commission[$i];
	    	$save->save();
    	}
        
            DB::commit();
             $request->session()->flash('success', "Save successfully");
             return back();
            } catch (Exception $e) {
              DB::rollback();
             $request->session()->flash('error', 'Something wrong!');
             return back(); 
        }
    }
}
