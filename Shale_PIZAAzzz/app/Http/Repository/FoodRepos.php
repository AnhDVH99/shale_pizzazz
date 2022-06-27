<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;

class FoodRepos
{
    public static function getAllFoods() {
        $sql = 'select f.* ';
        $sql .= 'from foods as f ';
        $sql .= 'order by f.p_name';

        return DB::select ($sql);
    }

    public static function getFoodById($id){
        $sql = 'select f.*  ';
        $sql .= 'from foods as f ';
        $sql .= 'where f.p_id = ? ';

        return DB::select($sql, [$id]);
    }
    public static function getAllFoodsWithCategories() {
        $sql = 'select f.*, c.ca_name as categoriesName ';
        $sql .= 'from foods as f ';
        $sql .= 'join category as c on f.ca_ID = c.ca_ID ';
        $sql .= 'order by f.p_name';

        return DB::select ($sql);

    }

    public static function insert($food){
        $sql = 'insert into foods ';
        $sql .= '(p_name, p_price, p_size, p_description, p_image, ca_ID) ';
        $sql .= 'values (?, ?, ?, ?, ?, ?) ';

        $result =  DB::insert($sql, [$food->p_name, $food->p_price, $food->p_size, $food->p_description, $food->p_image, $food->ca_ID]);
        if($result){
            return DB::getPdo()->lastInsertId();
        } else {
            return -1;
        }
    }

    public static function update($food){
        $sql = 'update foods ';
        $sql .= 'set p_name = ?, p_price = ?, p_size = ?, p_description = ?, p_image = ?, ca_ID = ? ';
        $sql .= 'where p_id = ? ';

        DB::update($sql, [$food->p_name, $food->p_price, $food->p_size, $food->p_description, $food->p_image, $food->ca_ID, $food->p_id]);

    }

    public static function delete($id){
        $sql = 'delete from foods ';
        $sql .= 'where p_id = ? ';

        DB::delete($sql, [$id]);
    }
}
