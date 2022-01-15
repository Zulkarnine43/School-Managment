<?php

namespace App\Http\Controllers\Admin\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentClass;
use App\Model\FeeCategory;
use App\Model\FeeCategoryAmount;
use Auth;

class FeeCategoryAmountController extends Controller
{
    public function view()
    {
    	$feeAmounts = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
    	return view('admin.setups.fee_amount.fee-amount-view',compact('feeAmounts'));
    }

    public function add()
    {    	
    	$classes = StudentClass::all();
    	$feeCategories = FeeCategory::all();
    	return view('admin.setups.fee_amount.fee-amount-add',compact('classes','feeCategories'));
    }

    public function store(Request $request)
    {
        $countClass = count($request->class_id);
        if($countClass != NULL)
        {
            for ($i=0; $i < $countClass; $i++) { 
                $feeAmounts = new FeeCategoryAmount();
                $feeAmounts->class_id = $request->class_id[$i];
                $feeAmounts->fee_category_id = $request->fee_category_id;
                $feeAmounts->amount = $request->amount[$i];
                $feeAmounts->created_by = Auth::user()->id;
                $feeAmounts->save();
            }
        }
        return redirect()->route('setups.fee.amount.view')->with('success','Fee Category Amount has been created successfully!');
    }

    public function edit($fee_category_id)
    {
    	$feeAmounts = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','ASC')->get();
    	$classes = StudentClass::all();
    	$feeCategories = FeeCategory::all();
    	return view('admin.setups.fee_amount.fee-amount-edit',compact('feeAmounts','classes','feeCategories'));
    }

    public function update(Request $request, $fee_category_id)
    {
        if($request->class_id == NULL) 
        {
            return redirect()->back()->with('error','Sorry! You do not select any items!');
        }   
        else
        {
            
            FeeCategoryAmount::whereNotIn('class_id',$request->class_id)->where('fee_category_id',$request->fee_category_id)->delete();
            foreach ($request->class_id as $key => $value) {
                $householdexist = FeeCategoryAmount::where('class_id',$request->class_id[$key])->where('fee_category_id',$request->fee_category_id)->first();
                if($householdexist){
                    $feeAmounts = $householdexist;
                }else{
                    $feeAmounts = new FeeCategoryAmount();
                }
                $feeAmounts->fee_category_id = $request->fee_category_id;
                $feeAmounts->class_id = $request->class_id[$key];
                $feeAmounts->amount = $request->amount[$key];
                $feeAmounts->created_by = Auth::user()->id;
                $feeAmounts->updated_by = Auth::user()->id;
                $feeAmounts->save();
            }            
        }
        return redirect()->route('setups.fee.amount.view')->with('success','Fee Category Amount has been updated successfully!');
    }

    public function details($fee_category_id)
    {
    	$feeAmounts = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','ASC')->get();
        return view('admin.setups.fee_amount.fee-amount-details',compact('feeAmounts'));
    }
}
