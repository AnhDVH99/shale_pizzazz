<?php

namespace App\Http\Controllers;

use App\Http\Repository\CategoryRepos;
use App\Http\Repository\FoodRepos;
use Illuminate\Http\Request;

class ClientControllerWithRepos extends Controller
{
    public function index()
    {
        $categories = CategoryRepos::getAllCategories();
        $foods = FoodRepos::getAllFoods();
        return view('clientView.index',
            [
                'categories' => $categories,
                'foods' => $foods
            ]);
    }

    public function show($p_id)
    {

        $food = FoodRepos::getFoodById($p_id); //this is always an array of objects

        return view('clientView.show',
            [
                'food' => $food[0] //get the first element
            ]
        );
    }
}
