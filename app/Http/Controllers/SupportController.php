<?php

namespace App\Http\Controllers;
use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Models\Support;
use DB;
use Auth;
class SupportController extends Controller
{
    public function create()
    {
    	return view('user.supports.create');
    }

    public function index()
    {
        $data=Support::where('user_id',Auth::id())->get();
    	return view('user.supports.index',compact('data'));
    	
    }

    public function show($id)
    {
        $data=Support::find($id);
        $data->status=1;
        $data->save();
        return view('user.supports.show',compact('data'));
        
    }

    public function delete(Request $request)
    {
        try {
            DB::beginTransaction();
            $save=Support::find($request->id);
            if ($save) {
                 $paths = public_path() . '/supports';
                 $path=$paths.'/'.$save->file;
                @unlink($path);
               $save->delete();
            }
            DB::commit();
            $request->session()->flash('success', "Delete successfully");
            return back();
            } catch (Exception $e) {
            DB::rollback();
            $request->session()->flash('error', 'Something wrong!');
            return back(); 
        }
    }

    public function store(Request $request)
    {
    	try {
             DB::beginTransaction();
              if ($request->hasFile('image')) {
                    $fileScan = $request->file('image');
                    $picturea = time() . rand(10000, 99999);
                    $paths = public_path() . '/supports';
                    $cover = Helper::imageUpload($fileScan, $picturea, $paths);
                    } else {
                    $cover = null;
             }
    		$save=Support::create([
                'user_id'=>Auth::id(),
                'title'=>$request->subject,
                'note'=>$request->note,
                'file'=>$cover,
                'status'=>1,
                'admin_status'=>0,
                'sending_type'=>2,
            ]);	

    	     DB::commit();
             $request->session()->flash('success', "Message sent successfully");
             return back();
        } catch (Exception $e) {
            DB::rollback();
             $request->session()->flash('error', 'Something wrong!');
             return back(); 
        }
    	
    }
}
