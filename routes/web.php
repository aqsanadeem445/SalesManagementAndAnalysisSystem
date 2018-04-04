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
Route::group(['middleware'=>['web']],function(){
    Route::get('/', function()
    {
        return redirect('/owner');
    });
    
    Route::get('/customer', function()
    {
        return view('customer');
    });

    Route::get('/chef', function()
    {
        return view('chef');
    });

   
    

    Route::get('/success/{id}', function($i)
    {
        return view('Order_Success',['id'=>$i]);
    });
    Route::match(['get', 'post'],'/store', 'OrderController@store')->name('store');

//Route After ITEM IS ADDED
    
    Route::match(['get', 'post'],'/Addeditem', 'ItemController@add')->name('addeditem');

//Route for Adding ITEM EMPLOYEE TEST PART
    
    Route::get('/Additem', function()
    {
        return view('AddItems');
    })->name('additem');

//Get The Shop Items using the ID of the Shop.

    Route::get('/showitems', 'ItemController@show')->name('showitems');
    Route::get('/showsummary', 'OrderController@showsummary')->name('showsummary');
    Route::get('/chef_order', 'OrderController@chef_order')->name('chef_orders');
    Route::post('/savecart','OrderController@savecart');
    Route::post('/editst','OrderController@editst');
    Route::post('/savefeed','OrderController@savefeed');
    Route::post('/setstatus','OrderController@setstatus');
    Route::post('/removeorder','OrderController@complete_order');
    Route::post('/alterst','OrderController@alter_st');
    Route::resource('order','OrderController');
    Route::get('/showstatus', 'OrderController@showstatus')->name('showstatus');
});

Auth::routes();
Route::get("/home",function(){
        return view('data_analytics');
    
        
})->middleware('auth');
Route::get('/owner', function()
    {
     if(Auth::check()){
        return redirect('/home');
     } 
     else{
        return view('/auth/login');
     }
        
    });
Route::get('/logout', function()
    {
        Auth::logout();
        Session::flush();
        return redirect('/owner');
    });
Route::get('/month', function(){
        return view('data');
    })->middleware('auth');

    Route::get('/year', function()
    {
        return view('data1');    
    })->middleware('auth');
    Route::get('/login', function()
    {
        return view('data_analytics');
    })->middleware('auth');
