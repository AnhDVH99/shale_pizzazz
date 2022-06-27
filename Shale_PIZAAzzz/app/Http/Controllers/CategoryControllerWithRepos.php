<?php

namespace App\Http\Controllers;

use App\Http\Repository\CategoryRepos;
use App\Http\Repository\FoodRepos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryControllerWithRepos extends Controller
{
    public function index()
    {
        $categories = CategoryRepos::getAllCategories();
        return view('categoryWithRepos.index',
            [
                'categories' => $categories,
            ]);
    }

    public function show($id)
    {

        $category = CategoryRepos::getCategoryById($id); //this is always an array of objects
        return view('categoryWithRepos.show',
            [
                'category' => $category[0] //get the first element
            ]
        );
    }

    public function create()
    {

        return view(
            'categoryWithRepos.new',
            ["category" => (object)[
                'ca_ID' => '',
                'ca_name' => '',
                'ca_image' => ''
            ]]);

    }

    public function store(Request $request)
    {
        $this->formValidate($request)->validate(); //shortcut

        $category = (object)[
            'ca_ID' => $request->input('ca_ID'),
            'ca_name' => $request->input('ca_name'),
            'ca_image' => $request->input('ca_image')
        ];

        $newId = CategoryRepos::insert($category);

        return redirect()
            ->action('CategoryControllerWithRepos@index')
            ->with('msg', 'New category with id: ' . $newId . ' has been inserted');
    }

    public function edit($id)
    {
        $category = CategoryRepos::getCategoryById($id); //this is always an array


        return view(
            'categoryWithRepos.update',
            ["category" => $category[0]]);
    }

    public function update(Request $request, $ca_ID)
    {
        if ($ca_ID != $request->input('ca_ID')) {
            //id in query string must match id in hidden input
            return redirect()->action('CategoryControllerWithRepos@index');
        }

        $this->formValidate($request)->validate(); //shortcut

        $category = (object)[
            'ca_ID' => $request->input('ca_ID'),
            'ca_name' => $request->input('ca_name'),
            'ca_image' => $request->input('ca_image')
        ];
        CategoryRepos::update($category);

        return redirect()->action('CategoryControllerWithRepos@index')
            ->with('msg', 'Update Successfully');
    }

    public function confirm($id)
    {
        $category = CategoryRepos::getCategoryById($id); //this is always an array

        return view('categoryWithRepos.confirm',
            [
                'category' => $category[0]
            ]
        );
    }

    public function destroy(Request $request, $id)
    {
        $foods = FoodRepos::getAllFoods();
        if ($foods > 0){
            return redirect() -> action('CategoryControllerWithRepos@index')
                ->with('msg', 'Please delete all Products related!');
        }
        if ($request->input('id') != $id) {
            //id in query string must match id in hidden input
            return redirect()->action('CategoryControllerWithRepos@index');
        }



        CategoryRepos::delete($id);


        return redirect()->action('CategoryControllerWithRepos@index')
            ->with('msg', 'Delete Successfully');
    }

    private function formValidate($request)
    {
        return Validator::make(
            $request->all(),
            [
                'ca_name' => ['required'],
                'ca_image' => ['required'],

            ],

            [
                //change validation message
                'ca_name.required' => 'You must input name of Category',
                'ca_image.required' => 'You must input image of Category'
            ]
        );
    }
}
