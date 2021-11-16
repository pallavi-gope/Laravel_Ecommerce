<?php

namespace App\Http\Controllers;

use App\Models\ShipDistrict;
use App\Models\Shipdivision;
use App\Models\ShipState;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminShippingController extends Controller
{
    //----------------DIVISION-----------------------//
    public function divisionView(){
        $shipping = Shipdivision::orderBy('id', 'DESC')->get();
        return view('admin.shipping', compact('shipping'));
    }
    public function divisionAdd(Request $request){
        Shipdivision::insert([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Division Added Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function divisionDelete($id){
        Shipdivision::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Division Deleted Successfully!',
            'alert-type' => 'warning'
        );
        return Redirect()->back()->with($notification);
    }
    public function divisionEdit($id){
        $item = Shipdivision::findOrFail($id);
        return view('admin.division_edit', compact('item'));
    }
    public function divisionUpdate(Request $request){
        $id = $request->id;
        Shipdivision::findOrFail($id)->update([
            'division_name' => $request->division_name,
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Division Updated Successfully!',
            'alert-type' => 'info'
        );
        return Redirect()->route('division.manage')->with($notification);
    }
    //----------------DISTRICT-----------------------//
    public function districtView(){
        $district = ShipDistrict::orderBy('id', 'DESC')->get();
        $division = Shipdivision::orderBy('division_name', 'ASC')->get();
        return view('admin.district', compact('district', 'division'));
    }
    public function districtAdd(Request $request){
        ShipDistrict::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'District Added Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function districtDelete($id){
        ShipDistrict::findOrFail($id)->delete();
        $notification = array(
            'message' => 'District Delted Successfully!',
            'alert-type' => 'warning'
        );
        return Redirect()->back()->with($notification);
    }
    public function districtEdit($id){
        $division = Shipdivision::orderBy('division_name', 'ASC')->get();
        $district = ShipDistrict::findOrFail($id);
        return view('admin.district_edit', compact('division', 'district'));
    }
    public function districtUpdate(Request $request){
        $id = $request->id;
        ShipDistrict::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'District Updated Successfully!',
            'alert-type' => 'info'
        );
        return Redirect()->route('district.manage')->with($notification);
    }
    //----------------STATE-----------------------//
    public function stateView(){
        $state = ShipState::orderBy('id', 'DESC')->get();
        $division = Shipdivision::orderBy('division_name', 'ASC')->get();
        $district = ShipDistrict::orderBy('district_name', 'ASC')->get();
        return view('admin.state', compact('state', 'division', 'district'));
    }
    public function stateAdd(Request $request){
        ShipState::insert([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'State Added Successfully!',
            'alert-type' => 'success' 
        );
        return Redirect()->back()->with($notification);
    }
    public function stateEdit($id){
        $state = ShipState::findOrFail($id);
        $division = Shipdivision::orderBy('division_name', 'ASC')->get();
        $district = ShipDistrict::orderBy('district_name', 'ASC')->get();
        return view('admin.state_edit', compact('state', 'division', 'district'));
    }
    public function stateUpdate(Request $request){
        $id = $request->id;
        ShipState::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'State Updated Successfully!',
            'alert-type' => 'info'
        );
        return Redirect()->route('state.manage')->with($notification);
    }
    public function stateDelete($id){
       ShipState::findOrFail($id)->delete();
       $notification = array(
           'message' => 'State Deleted Successfully!',
           'alert-type' => 'warning'
       );
       return Redirect()->back()->with($notification);
    }
    public function getDistrict($division_id){
        $district = ShipDistrict::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
        return response()->json($district);
        exit;
    }
}
