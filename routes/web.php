<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/test-video', function () {
    return view('partials.vimeo-video-player');
});

//แสดงรายการ ซี่รี่ส์/ตอน index
Route::get('/series', function(){
    $series=\App\Serie::all();
    return view('serie.index')->with(['series'=>$series]);

})->name('series');

//แสดงฟอร์มสร้าง ซี่รี่ส์/ตอน
Route::get('/series/create',function(){
    return view('serie.create');
})->name('create');
Route::get('/series/{serieid}/episodes/create',function($serieid){
    return view('episode.create')->with(['serieid' => $serieid]);
});

//รับข้อมูลจากฟอร์มสร้าง ซีรีย์/ตอน แล้วบันทึกลงตาราง
Route::POST('/series',function(){
    $data = \Request::all();

    //return $data;

    //{"_token"=>"f2eNfaXvGHkFYPJ9iSrsa0Bq9R1Wn511L5VqkquF","title"=>"test"}

    $episode = \App\Serie::create($data);

    return redirect('series');
});

Route::POST('/serie/{id}/episodes',function($id){
    $data = \Request::all();

    $episode = \App\Episode::create($data);

    $episode->serie_id = $id;

    $episode->save();

    return redirect('/series/'. $id);
});

//แสดงตอนที่อยู่ใน ซี่รี่ย์ 
// Route::get('/series/{id}',function($id){ แบบแรก
//     $serie=\App\serie::find($id);
//     return view('serie.show')->with([
//         'serie' => $serie
//     ]);
//     return $id;

// });

Route::get('/series/{serie}',function(\App\Serie $serie){
    return view('serie.show')->with([
        'serie' => $serie
    ]);
    return $id;

});

