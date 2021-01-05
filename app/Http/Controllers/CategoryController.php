<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
//        $categories = DB::table('categories')
//            ->where('age', '>', 18)
//            ->orWhere('gender', 'm')
//            ->orWhere('gender', 'f')
//            ->get();
//

//        $categories = DB::table('categories')
//            ->where('created_at',  '2020-12-16 00:00:00')
////            ->whereIn('id', [11,22])
//            ->where('show_at_index',  1)
//            ->first();
//        $categories = DB::table('categories')
//            ->where('title', 'php')->first();

        $categories = Category::all();
//            ->where('title', 'php')
//            ->first();

        foreach ($categories as $category) {
            echo $category->title . '<hr>';
        }

        dd($categories);
        return 'CAtegories';
    }

    public function insert()
    {
        return view('admin.category_insert');
    }

    public function store(Request $request)
    {
//        $category = new Category();
//        $category->title = $request->input('title');
//        $category->show_at_index = $request->has('show_at_index') ? $request->input('show_at_index') : 0;
//        $category->save();


        $data = [
            'title' => $request->input('title'),
            'show_at_index' => $request->has('show_at_index') ? $request->input('show_at_index') : 0,
        ];
        $category = new Category($data);
        $category->save();

        dd($category);
    }
}
