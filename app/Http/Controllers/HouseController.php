<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\House;
class HouseController extends Controller
{
    public function index()
    {
        $available = House::where("status",true)->get();
        $booked = House::where("status", false)->get();
        return response()->json([
            'Available'=>$available,
            'Booked'=>$booked
        ]);
    }
    public function bookHouse($id)
    {
        $booking = House::find($id);
        if("status" == 0){
            $booking->status = true;
            $booking->save();
            return response()->json([
                "code"=> 200,
                "message"=> "House booked successfully"
            ]);
        }
        elseif ("status" ==1) {
            
            return response()->json([
                "code"=> "Error",
                "message"=> "House already booked"
            ]);
        }
    }
    public function releaseHouse($id)
    {
        $booking = House::find($id);
        if('status' == 1){
            $booking->status = false;
            $booking->save();
            return response()->json([
                "code"=> 200,
                "message"=> "House released successfully"
            ]);
        }
        else{
            return response()->json([
                "code"=> "Error",
                "message"=> "House was Available"
            ]);
        }
    }
    public function destroy($id){
        $del = House::find($id);
        $del = $del-> delete();
        return response()->json([
            "Code"=> 200
            ,"message"=>"House deleted successfully"
        ]);
    }
}
