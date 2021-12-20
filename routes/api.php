<?php

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/visitor-data', function (Request $request) {
    $response = Http::post('https://registration.gjepc.org/getVisitorData.php',[
        'username' => 'mukesh@kwebmaker.com',
        'password' => '123456',
    
    ]);

    $data= $response->object() ;
    $count=0;
    $exists_count=0;
    $result= $data->Response;
    if($result->status ==true){
        $visitors= $result->Result;
        foreach($visitors as $v){
        $exists=Visitor::where('unique_code',$v->unique_code)->orWhere('mobile',$v->mobile)->first();
            if($exists){
                $exists_count++;
            }
            else{
                $count++;
                $visitor=new Visitor();
                $visitor->unique_code=$v->unique_code;
                $visitor->registration_id=$v->registration_id;
                $visitor->registration_number=$v->registration_number;
                $visitor->company=$v->company;
                $visitor->name=$v->name;
                $visitor->mobile=$v->mobile;
                $visitor->designation=$v->designation;
                $visitor->photo_url=$v->photo_url;
                $visitor->category=$v->category;
                $visitor->dose_status=$v->dose_status;
                $visitor->updateStatus=$v->updateStatus;
                $visitor->isReplaced=$v->isReplaced;
                $visitor->post_date=$v->post_date;
                $visitor->save();
            }
        }
    }

    return response()->json([
        'status'=>true,
        'message'=>'success',
        'visitors_added'=>$count,
        'visitors_exists'=>$exists_count
    ]);

});
