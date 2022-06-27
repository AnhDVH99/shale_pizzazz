<?php

namespace App\Http\Controllers;

use App\Http\Repository\CategoryRepos;
use App\Http\Repository\FoodRepos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FoodControllerWithRepos extends Controller
{
    public function index()
    {
        $foods = FoodRepos::getAllFoodsWithCategories();
        return view('foodWithRepos.index',
            [
                'foods' => $foods,
            ]);
    }

    public function show($p_id)
    {

        $food = FoodRepos::getFoodById($p_id); //this is always an array of objects
        $categories = CategoryRepos::getCategoriesByFoodId($p_id);
        return view('foodWithRepos.show',
            [
                'food' => $food[0], //get the first element
                'categories' => $categories[0]
            ]
        );
    }

    public function create()
    {
        $categories = CategoryRepos::getAllCategories();
        return view(
            'foodWithRepos.new',
            ["food" => (object)[
                'p_id' => '',
                'p_name' => '',
                'p_price' => '',
                'p_size' => '',
                'p_description' => '',
                'p_image' => '',
                'ca_ID' => ''
            ],
                'categories' => $categories
            ]);

    }

    public function store(Request $request)
    {
        $this->formValidate($request)->validate(); //shortcut

        $food = (object)[

            'p_name' => $request->input('p_name'),
            'p_price' => $request->input('p_price'),
            'p_size' => $request->input('p_size'),
            'p_description' => $request->input('p_description'),
            'p_image' => $request->input('p_image'),
            'ca_ID' => $request->input('ca_ID')
        ];

        $newId = FoodRepos::insert($food);

        return redirect()
            ->action('FoodControllerWithRepos@index')
            ->with('msg', 'New class with id: ' . $newId . ' has been inserted');
    }

    public function edit($p_id)
    {
        $food = FoodRepos::getFoodById($p_id); //this is always an array
        $categories = CategoryRepos::getAllCategories();

        return view(
            'foodWithRepos.update',
            ["food" => $food[0],
            "categories" => $categories
            ]);
    }

    public function update(Request $request, $p_id)
    {
        if ($p_id != $request->input('p_id')) {
            //id in query string must match id in hidden input
            return redirect()->action('FoodControllerWithRepos@index');
        }

        $this->formValidate($request)->validate(); //shortcut

        $food = (object)[
            'p_id' => $request->input('p_id'),
            'p_name' => $request->input('p_name'),
            'p_price' => $request->input('p_price'),
            'p_size' => $request->input('p_size'),
            'p_description' => $request->input('p_description'),
            'p_image' => $request->input('p_image'),
            'ca_ID' => $request->input('ca_ID')
        ];
        FoodRepos::update($food);

        return redirect()->action('FoodControllerWithRepos@index')
            ->with('msg', 'Update Successfully');
    }

    public function confirm($id)
    {
        $food = FoodRepos::getFoodById($id); //this is always an array
        $categories = CategoryRepos::getCategoriesByFoodId($id);
        return view('foodWithRepos.confirm',
            [
                'food' => $food[0],
                'categories' => $categories[0]
            ]
        );
    }

    public function destroy(Request $request, $p_id)
    {
        if ($request->input('p_id') != $p_id) {
            //id in query string must match id in hidden input
            return redirect()->action('FoodControllerWithRepos@index');
        }

        FoodRepos::delete($p_id);


        return redirect()->action('FoodControllerWithRepos@index')
            ->with('msg', 'Delete Successfully');
    }

    private function formValidate($request)
    {
        return Validator::make(
            $request->all(),
            [
                'p_name' => 'required',
                'p_price' => ['required', 'alpha_num'],
                'p_size' => ['required'],
                'p_image' =>['required'],
                'p_description' => ['required'],
                'ca_ID' => ['required', 'gt:0']
                ],
            [
                'p_name.required' => 'Please enter food name',
                'p_price.required' => 'Please enter food price',
                'p_size.required' => 'Please select size',
                'p_image.required' => 'Please choose image',
                'ca_ID.required' => 'Please choose one category',
                'p_description.required' => 'Please enter description',
                'p_price.alpha_num' => 'Please input positive number',
                'ca_ID.gt' => 'Please select one category'

            ]


        );
    }
}
