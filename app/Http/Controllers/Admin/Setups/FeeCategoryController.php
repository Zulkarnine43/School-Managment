<?php

namespace App\Http\Controllers\Admin\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\FeeCategory;
use Auth;

class FeeCategoryController extends Controller
{
    public function view()
    {
    	$feeCategories = FeeCategory::all();
    	return view('admin.setups.fee_category.fee-category-view',compact('feeCategories'));
    }

    public function add()
    {    	
    	return view('admin.setups.fee_category.fee-category-add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:fee_categories,name'
        ]);

        if(empty($request['status'])){
            $status='0';
        }else{
            $status='1';
        }

        $feeCategories = new FeeCategory();
        $feeCategories->name = $request->name;
        $feeCategories->status = $status;
        $feeCategories->created_by = Auth::user()->id;
        $feeCategories->save();

        return redirect()->route('setups.fee.category.view')->with('success','Fee Category has been created successfully!');
    }

    public function edit($id)
    {
    	$feeCategories = FeeCategory::find($id);
    	return view('admin.setups.fee_category.fee-category-add',compact('feeCategories'));
    }

    public function update(Request $request, $id)
    {
        $feeCategories = FeeCategory::find($id);
        $this->validate($request,[
            'name' => 'required|unique:fee_categories,name,'.$feeCategories->id
        ]);

        if(empty($request['status'])){
            $status='0';
        }else{
            $status='1';
        }
        
        $feeCategories->name = $request->name;
        $feeCategories->status = $status;
        $feeCategories->updated_by = Auth::user()->id;
        $feeCategories->save();

        return redirect()->route('setups.fee.category.view')->with('success','Fee Category has been updated successfully!');
    }

    public function delete(Request $request)
    {
    	$feeCategories = FeeCategory::find($request->id);  	
    	$feeCategories->delete();
    	return redirect()->route('setups.fee.category.view')->with('success','Fee Category has been deleted successfully!');
    }
}
