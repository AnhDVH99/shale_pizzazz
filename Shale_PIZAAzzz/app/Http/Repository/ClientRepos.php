<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;

class ClientRepos
{
    public static function getAllFoods() {
        $sql = 'select f.* ';
        $sql .= 'from foods as f ';
        $sql .= 'order by f.p_name';

        return DB::select ($sql);
    }
    public static function getAllCategories() {
        $sql = 'select c.* ';
        $sql .= 'from category as c ';
        $sql .= 'order by c.ca_name';

        return DB::select ($sql);
    }
    public static function getFoodById($id){
        $sql = 'select f.*  ';
        $sql .= 'from foods as f ';
        $sql .= 'where f.p_id = ? ';

        return DB::select($sql, [$id]);
    }
}
