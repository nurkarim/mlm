<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FundTransfer;
use App\Models\Transaction;
use App\Models\Withdrawal;
use App\Models\ReferralCommission;
use App\Models\AddFundsWallet;
use Yajra\DataTables\Facades\DataTables;
class HistoryController extends Controller
{

	public function addFundsIndex()
	{
		return view('admin.history.addFunds');
	}

    public function transaction()
	{
		return view('admin.history.transaction');
	}

	public function withdrawal()
	{
		return view('admin.history.withdrawal');
	}

    public function addFundsAjax()
    {
        $data = AddFundsWallet::orderBy('id','DESC')->get();
        return DataTables::of($data)
            ->addIndexColumn() 
            ->addColumn('user_name', function ($data) {
              return $data->user->user_name;
            })    
            ->addColumn('date', function ($data) {
              return $data->created_at->format('Y-m-d');
            })  
            ->addColumn('type', function ($data) {
              if ($data->type==1) {
              	return "Stripe";
              }else{
              	return "Coinpayment";
              }
            })->addColumn('details', function ($data) {
              if ($data->type==1) {
              	return $data->strip_charge_id;
              }else{
              return $data->coinbase_wallet_address;
              }
            })
            ->addColumn('action', function ($data) {
                $html = '';
                return $html;

            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function transactionAjax()
    {
        $data = Transaction::orderBy('id','DESC')->get();
        return DataTables::of($data)
            ->addIndexColumn() 
            ->addColumn('user_name', function ($data) {
            	$html='<a href="'.route('members.show',$data->user_id).'">'.$data->user->user_name.'</a>';
              return $html;
            })    
            ->addColumn('date', function ($data) {
              return $data->created_at->format('Y-m-d');
            })  
            ->addColumn('total', function ($data) {
              if ($data->type==5) {
              	return "- ".$data->total;
              }
              return $data->total;

            })->addColumn('amount', function ($data) {
                if ($data->type==5) {
              	return "- ".$data->amount;
              }
              return $data->amount;
            })
            ->addColumn('action', function ($data) {
                $html = '';
                return $html;

            })
            ->rawColumns(['action','user_name'])
            ->make(true);
    }

    public function withdrawalAjax()
    {
        $data = Withdrawal::orderBy('id','DESC')->get();
        return DataTables::of($data)
            ->addIndexColumn() 
            ->addColumn('user_name', function ($data) {
            	$html='<a href="'.route('members.show',$data->user_id).'">'.$data->user->user_name.'</a>';
              return $html;
            })    
            ->addColumn('date', function ($data) {
              return $data->created_at->format('Y-m-d');
            })  
           ->addColumn('statusW', function ($data) {
                if ($data->status==1) {
              	return "Approved";
              }
              return "Pending";
            })
            ->addColumn('action', function ($data) {
                $html = '';
                return $html;

            })
            ->rawColumns(['action','user_name'])
            ->make(true);
    }
}
