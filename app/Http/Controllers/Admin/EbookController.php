<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\Helper;
use App\Models\Ebook;
use DB;
class EbookController extends Controller
{
    public function index()
    {
    	$ebooks=Ebook::get();
    	return view('admin.ebooks.index',compact('ebooks'));
    }

    public function create()
    {
    	return view('admin.ebooks.create');
    }

    public function edit($id)
    {
    	$ebook=Ebook::find($id);
    	return view('admin.ebooks.edit',compact('ebook'));
    }

    public function store(Request $request)
    {
    	try {
    		 DB::beginTransaction();
    		 $save=new Ebook();
    		 $save->title=$request->name;
    		 if ($request->hasFile('cover')) {
                    $fileScan = $request->file('cover');
                    $picturea = time() . rand(10000, 99999);
                    $paths = public_path() . '/ebooks';
                    $cover = Helper::imageUpload($fileScan, $picturea, $paths);
                    } else {
                    $cover = null;
             } 
             if ($request->hasFile('pdf_file')) {
                    $fileScan = $request->file('pdf_file');
                    $picturea = time() . rand(10000, 99999);
                    $paths = public_path() . '/ebooks/files';
                    $pdfFile = Helper::imageUpload($fileScan, $picturea, $paths);
                    } else {
                    $pdfFile = null;
             }
             $save->cover_image=$cover;
             $save->pdf=$pdfFile;
             $save->save();
    		 DB::commit();
             $request->session()->flash('success', "Save successfully");
             return back();
    	} catch (Exception $e) {
    		return $e;
    		DB::rollback();
             $request->session()->flash('error', 'Something wrong!');
             return back(); 
    	}
    }

    public function update($id,Request $request)
    {
    	try {
    		 DB::beginTransaction();
    		 $save=Ebook::find($id);
    		 $save->title=$request->title;
    		 if ($request->hasFile('cover')) {
                    $fileScan = $request->file('cover');
                    $picturea = time() . rand(10000, 99999);
                    $paths = public_path() . '/ebooks';
                    $unlink=$paths.'/'.$save->cover_image;
                    if (file_exists($unlink)) {
                    	unlink($unlink);
                    }
                    $cover = Helper::imageUpload($fileScan, $picturea, $paths);
                    } else {
                    $cover = $save->cover_image;
             } 
             if ($request->hasFile('pdf_file')) {
                    $fileScan = $request->file('pdf_file');
                    $picturea = time() . rand(10000, 99999);
                    $paths = public_path() . '/ebooks/files';
                    $unlink=$paths.'/'.$save->pdf;
                    if (file_exists($unlink)) {
                    	unlink($unlink);
                    }
                    $pdfFile = Helper::imageUpload($fileScan, $picturea, $paths);
                    } else {
                    $pdfFile = $save->pdf;
             }
             $save->cover_image=$cover;
             $save->pdf=$pdfFile;
             $save->save();
    		 DB::commit();
             $request->session()->flash('success', "Save successfully");
             return back();
    	} catch (Exception $e) {
    
    		DB::rollback();
             $request->session()->flash('error', 'Something wrong!');
             return back(); 
    	}
    }

    public function delete(Request $request)
    {
    	try {
            DB::beginTransaction();
            $save=Ebook::find($request->id);
            $save->delete();
            DB::commit();
            $request->session()->flash('success', "Delete successfully");
            return back();
            } catch (Exception $e) {
            DB::rollback();
            $request->session()->flash('error', 'Something wrong!');
            return back(); 
        }
    }
}
