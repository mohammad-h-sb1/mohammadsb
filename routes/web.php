<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function (){
    $articles=Article::all();
    dd($articles);
    return view('index');

});

Route::get('/about',function (){
    return view('about');
});

Route::get('/header',function (){
    return view('header');
});





Route::prefix('admin')->group(function (){
    Route::get('/articles',function (){

        return view('admin.articles.index',[
            'articles'=>Article::all()
        ]);
      });
    Route::get('/articles/create',function (){
        return view('admin.articles.create');
    });
    Route::post('/articles/create', function (){
//        $article= new Article();
//        $article->title= request('title');
//        $article->slug=  request('title');
//        $article->body=  request('body');
//        $article->save();

        $validate_date=Validator::make(request()->all(),[

            'title'=>'required|min:10|max:50',
            'body'=>'required'
        ])->validated();

//        if ($validator->fails()){
//            return redirect()
//                ->back()
//                ->withErrors($validator);
//        }

        Article::create([
            'title'=>$validate_date['title'],
            'slug'=>$validate_date['title'],
            'body'=>$validate_date['body']
        ]);

        return redirect('/admin/articles/create');
    });
    Route::get('/articles/{id}/edit',function ($id){
        $article= Article::find($id);

        return view('admin.articles.edit',[
            'article' =>$article
        ]);
    });
    Route::put('/articles/{id}/edit',function ($id){

        $validate_date=Validator::make(request()->all(),[

            'title'=>'required|min:10|max:50',
            'body'=>'required'
        ])->validated();

        $article=Article::findOrFail($id);

        $article->update([
            'title'=>$validate_date['title'],
            'slug'=>$validate_date['title'],
            'body'=>$validate_date['body']
        ]);

        return back();
    });

    Route::delete('/articles/{id}',function ($id){
        $articles=Article::find($id);
        $articles->delete();
        return back();
    });
});
