<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Measurement;
use Illuminate\Support\Facades\Redirect;


class MeasurementController extends Controller
{
    public function displayUnits(){
        $instaMeasurement = new Measurement();
        $product = $instaMeasurement->getUnits();
        $categories = $instaMeasurement->getCategories();
        return view('measurements', compact('product'));
    }

    public function addUnit(){
        $instaMeasurement = new Measurement();
        $categories = $instaMeasurement->getCategories();
        return view('unit', compact('categories'));
    }

    public function convertView($id){
        $categories = Measurement::where('parent_id', $id)->get();
        return view('conversion', compact('categories'));
    }

    public function editUnit($id){
        $instaMeasurement = new Measurement();
        $categories = $instaMeasurement->getCategories();
        $unit = Measurement::where('id', $id)->first(); 
        return view('unit', compact('categories', 'unit'));
    }

    public function saveUnit(Request $request){
        $this->validate($request,[
            'category'=>'required',
            'unit_name' => 'required|unique:measurements,category_name',
            'coefficient'=>'required'
            ]);
        $unit = new Measurement();
        $unit->parent_id = $request->category;
        $unit->category_name = $request->unit_name;
        $unit->conversion_coefficient = $request->coefficient;
        $unit->save();
        return Redirect::to('/measurement')->with('success', 'The unit was saved with success!');
    }

    public function updateUnit(Request $request){
        $this->validate($request,[
            'unit_id'=>'required',
            'category'=>'required',
            'unit_name' => 'required|unique:measurements,category_name,'.$request->unit_id,
            'coefficient'=>'required'
            ]);
        $unit = Measurement::where('id', $request->unit_id)->first();
        $unit->parent_id = $request->category;
        $unit->category_name = $request->unit_name;
        $unit->conversion_coefficient = $request->coefficient;
        $unit->save();
        return Redirect::to('/measurement')->with('success', 'The unit was updated with success!');
    }

    public function deleteUnit($id){
        $unit = Measurement::find($id);
        $unit->delete();
        return Redirect::back()->withErrors(['The unit was deleted with success!']);
    }

    public function convertUnit(Request $request){
        $this->validate($request,[
            'quantity'=>'required',
            'from'=>'required',
            'to'=>'required',
            ]);
        
        $base = Measurement::where('conversion_coefficient',1)->first();
        $from = Measurement::where('id',$request->from)->first();
        $fromName = Measurement::where('id',$request->from)->select('category_name')->first();
        $to = Measurement::where('id',$request->to)->first();
        $fromTo = Measurement::where('id',$request->to)->select('category_name')->first();
        $result = $request->quantity * $from->conversion_coefficient / $to->conversion_coefficient;
        return Redirect::back()->with('result', $request->quantity.' units of '.$fromName->category_name.' equals '.$result.' units of '.$fromTo->category_name);
    }
}
