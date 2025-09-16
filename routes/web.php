<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dosen');
});

Route::get('/test-submit', function(){
    return view('test-submit');
});

Route::post('/submit', function(){
    return 'Form has been submitted';
});

Route::put('/update', function(){
    return "Send update data";
});

Route::delete('/remove', function(){
    return "Send remove data";
});

// Route Group
// 3 halaman admin / nambahin dosen / nambahin mahasiswa / nambahin karyawan

Route::prefix('/admin')->group(function(){
    route::get('/dosen', function(){
        return view('admin.dosen');
    });
    route::get('/karyawan', function(){
        return view('admin.karyawan');
    });
    route::get('/mahasiswa', function(){
        return view('admin.mahasiswa');
    });    
});

Route::match(['get','post'], '/feedback', function(Request $request){
    if($request->isMethod('post')){
        return 'Form submitted';
    }
    return view('feedback');
});

Route::get('/contact', function(){
    return view('contact');
});

Route::post('/submit-contact', function(Request $request){
    $name = $request->input('name');
    return "Received name $name";
});

Route::get('/about', function(){
    return view('about', ['name' => 'Tes']);
});