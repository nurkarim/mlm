<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Withdrawal;
use App\Models\Transaction;
use App\Mail\WithdrawalApproved;
use App\Mail\WithdrawalReturn;
use Yajra\DataTables\Facades\DataTables;
use Auth;
use DB;
use Mail;
class WithdrawalController extends Controller
{
    public function edit($id)
    {
    	$withdrawal=Withdrawal::find($id);
    	return view('admin.withdrawal.edit',compact('withdrawal'));
    }

    public function update($id,Request $request)
    {
    	try {
             DB::beginTransaction();
    		$update=Withdrawal::find($id);
    		$update->status=$request->status;
    		$update->save();
    		if ($update->status==1) {
    		Transaction::create([
                    'user_id'=>$update->user_id,
                    'type'=>5,
                    'note'=>'Withdrawal Approved',
                    'amount'=>$update->amount,
                    'fee'=>$update->fee,
                    'total'=>$update->total,
                    'from'=>'Wallet',
                    'to'=>'Admin',
                    'status'=>1,
                    ]);
    		$data=[
                'name'=>$update->user->name,
                'user_name'=>$update->user->user_name,
                'date'=>date('Y-m-d'),
                'updated_at'=>$update->updated_at,
                'amount'=>$update->amount,
                'fee'=>$update->fee,
                'total'=>$update->total,
                'wallet_address'=>$update->wallet_address,
            ];
            Mail::to($update->user->email)->send(new WithdrawalApproved($data));

    	   
            $request->session()->flash('success', "Status change successfully");
             }elseif($update->status==2){
                Transaction::create([
                    'user_id'=>$update->user_id,
                    'type'=>2,
                    'note'=>'Withdrawal cancel and return amount into wallet',
                    'amount'=>$update->amount,
                    'fee'=>0,
                    'total'=>$update->amount,
                    'from'=>'Admin',
                    'to'=>'Wallet',
                    'status'=>1,
                    ]);
    		    
    		    $data=[
                'name'=>$update->user->name,
                'user_name'=>$update->user->user_name,
                'date'=>date('Y-m-d'),
                'updated_at'=>$update->updated_at,
                'amount'=>$update->amount,
                'fee'=>$update->fee,
                'total'=>$update->total,
                'wallet_address'=>$update->wallet_address,
               ];
               
              Mail::to($update->user->email)->send(new WithdrawalReturn($data));
              $request->session()->flash('success', "Status change successfully");
             }else{
                $request->session()->flash('error', "Status change unsuccessfully");
             }

             DB::commit();
            return back();
            } catch (Exception $e) {
            DB::rollback();
            $request->session()->flash('error', 'Something wrong!');
            return back(); 
        }
    }

    public function activeWithdrawal()
    {
        return view('admin.withdrawal.active');
    }

    public function inactiveWithdrawal()
    {
        return view('admin.withdrawal.inactive');
    }

    public function activeWithdrawalAjax()
    {
        $data = Withdrawal::orderBy('id','DESC')->where('status',1)->Orwhere('status',2)->get();
        return DataTables::of($data)
            ->addIndexColumn() 
            ->addColumn('user_name', function ($data) {
              return $data->user->user_name;
            })    
            ->addColumn('date', function ($data) {
              return $data->created_at->format('Y-m-d');
            })  
            ->addColumn('statusW', function ($data) {
              if ($data->status==1) {
                  return "<span class='btn btn-xs btn-success'>Active</span>";
              }else{

                  return "<span class='btn btn-xs btn-danger'>Cancel</span>";
              }
            }) ->addColumn('action', function ($data) {
                $html = '';
                return $html;

            })
            ->rawColumns(['action','statusW'])
            ->make(true);
    }   
    public function inactiveWithdrawalAjax()
    {
        $data = Withdrawal::orderBy('id','DESC')->where('status',0)->get();
        return DataTables::of($data)
            ->addIndexColumn() 
            ->addColumn('user_name', function ($data) {
              return $data->user->user_name;
            })    
            ->addColumn('date', function ($data) {
              return $data->created_at->format('Y-m-d');
            })  
            ->addColumn('statusW', function ($data) {
                  return "<span class='bg-danger'>Pending</span>";
            }) ->addColumn('action', function ($data) {
                $html = '<a href="javascript:void(0)" data-toggle="modal" data-target="#modal" class="btn btn-xs btn-info ajaxDatatableEdit" onclick=loadModal("' . route('withdrawals.edit', $data->id) . '") id="ajaxEdit_' . $data->id . '" >Action</a>';
                return $html;

            })
            ->rawColumns(['action','statusW'])
            ->make(true);
    }
}
