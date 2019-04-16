<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ebook;
class EbookController extends Controller
{
   public function index()
    {
    	$ebooks=Ebook::get();
    	return view('user.ebooks.index',compact('ebooks'));
    }
}
