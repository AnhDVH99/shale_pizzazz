<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;

class CategoryRepos
{
    public static function getAllCategories() {
        $sql = 'select c.* ';
        $sql .= 'from category as c ';
        $sql .= 'order by c.ca_name';

        return DB::select ($sql);
    }

    public static function getCategoriesByFoodId($id){
        $sql = 'select c.* ';
        $sql .= 'from category as c ';
        $sql .= 'join foods as f on c.ca_ID = f.ca_ID ';
        $sql .= 'where f.p_id = ?';

        return DB::select($sql, [$id]);
    }

    public static function getCategoryById($id){
        $sql = 'select c.* ';
        $sql .= 'from category as c ';
        $sql .= 'where c.ca_ID = ? ';

        return DB::select($sql, [$id]);
    }

    public static function insert($category){
        $sql = 'insert into category ';
        $sql .= '(ca_ID, ca_name, ca_image) ';
        $sql .= 'values (?, ?, ?) ';

        $result =  DB::insert($sql, [$category->ca_ID, $category->ca_name, $category->ca_image]);
        if($result){
            return DB::getPdo()->lastInsertId();
        } else {
            return -1;
        }
    }

    public static function update($category){
        $sql = 'update category ';
        $sql .= 'set ca_name = ?, ca_image = ? ';
        $sql .= 'where ca_ID = ? ';

        DB::update($sql, [$category->ca_name, $category->ca_image, $category->ca_ID]);

    }

    public static function delete($id){
        $sql = 'delete from category ';
        $sql .= 'where ca_ID = ? ';

        DB::delete($sql, [$id]);
    }
}
