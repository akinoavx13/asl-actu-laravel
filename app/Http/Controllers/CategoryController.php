<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public static function routes($router)
    {
        $router->pattern('category_id', '[0-9]+');

        $router->get('index', [
            'uses' => 'CategoryController@index',
            'as' => 'category.index',
        ]);

        $router->get('create', [
            'uses' => 'CategoryController@create',
            'as' => 'category.create',
        ]);

        $router->post('store', [
            'uses' => 'CategoryController@store',
            'as' => 'category.store',
        ]);

        $router->get('delete/{category_id}', [
            'uses' => 'CategoryController@delete',
            'as' => 'category.delete',
        ]);

        $router->get('edit/{category_id}', [
            'uses' => 'CategoryController@edit',
            'as' => 'category.edit',
        ]);

        $router->post('update/{category_id}', [
            'uses' => 'CategoryController@update',
            'as' => 'category.update',
        ]);
    }

    public function index()
    {
        $categories = Category::orderBy('order')->get();

        return view('category.index', compact('categories'));
    }

    public function create()
    {
        $category = new Category();

        return view('category.form', compact('category'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'color' => 'required|in:orange,red,clear_blue,dark_blue,green',
            'name' => 'required',
            'order' => 'required|numeric|min:1'
        ]);

        Category::create([
            'color' => $request->get('color'),
            'name' => $request->get('name'),
            'order' => $request->get('order')
        ]);

        return redirect()->route('category.index')->with('success', 'Catégorie créée');
    }

    public function delete($category_id)
    {
        $category = Category::findOrFail($category_id);

        $category->delete();

        return redirect()->route('category.index')->with('success', 'Catégorie supprimée');
    }

    public function edit($category_id)
    {
        $category = Category::findOrFail($category_id);

        return view('category.form', compact('category'));
    }

    public function update(Request $request, $category_id)
    {
        $category = Category::findOrFail($category_id);

        $this->validate($request, [
            'color' => 'required|in:orange,red,clear_blue,dark_blue,green',
            'name' => 'required',
            'order' => 'required|numeric|min:1'
        ]);

        $category->update([
            'color' => $request->get('color'),
            'name' => $request->get('name'),
            'order' => $request->get('order')
        ]);

        return redirect()->route('category.index')->with('success', 'Catégorie sauvegardée');
    }
}
