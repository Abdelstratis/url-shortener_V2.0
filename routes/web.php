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

use App\Url;

Route::get('/', function () {
    return view('welcome ');
});

Route::post('/', function () {

    $url = request('url');

    Validator::make(compact('url') ,['url' => 'required|url'])->validate();


   $record = Url::whereUrl($url)->first();

   if($record){
       return view('result')->withShortened($record->shortened);
   }


   //creer une nouvelle short url et la retourner


    $row = Url::create([
        'url' => $url,
        'shortened' => Url::getUniqueShortUrl()

    ]);

   if($row){
       return view('result')->withShortened($row->shortened);
   }
   else{
       echo ' Erreur : Veuillez réessayez';
   }



});











Route::get('/{shortened}', function ($shortened) {
    $url = Url::whereShortened($shortened)->first();

   if(! $url){

       return redirect('/');

   }

       return redirect($url->url);

});

