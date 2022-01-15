<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AccountOtherCost;

class OtherCostController extends Controller
{
    public function view(){
    	$data['allData'] = AccountOtherCost::orderBy('id','desc')->get();
    	return view('admin.account.cost.other-cost-view',$data);
    }

    public function add(){      
    	return view('admin.account.cost.other-cost-add');
    }

    public function store(Request $request){
        $cost = new AccountOtherCost();
        $cost->date = date('Y-m-d',strtotime($request->date));
        $cost->amount = $request->amount;
        if ($request->file('image')){
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/cost_images'), $filename);
            $cost['image']= $filename;
        }
        $cost->description = $request->description;
        $cost->save();

        return redirect()->route('accounts.cost.view')->with('success','Data saved successfully!');
    }

    public function edit($id){ 
      $data['editData'] = AccountOtherCost::find($id);    
      return view('admin.account.cost.other-cost-add',$data);
    }

    public function update(Request $request, $id){
        $cost = AccountOtherCost::find($id);
        $cost->date = date('Y-m-d',strtotime($request->date));
        $cost->amount = $request->amount;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/cost_images/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/cost_images'), $filename);
            $cost['image']= $filename;
        }
        $cost->description = $request->description;
        $cost->save();

        return redirect()->route('accounts.cost.view')->with('success','Data updated successfully!');
    }
}
