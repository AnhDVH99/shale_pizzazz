<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;

class AdminRepos
{
    public static function getAllAdmin()
    {
        $sql = 'select a.* ';
        $sql .= 'from admin as a ';
        $sql .= 'order by a.ad_username';

        return DB::select($sql);
    }

    public static function getAdminById($ad_id)
    {
        $sql = 'select a.* ';
        $sql .= 'from admin as a ';
        $sql .= 'where a.ad_id = ? ';

        return DB::select($sql, [$ad_id]);
    }


    public static function update($admin)
    {
        $sql = 'update admin ';
        $sql .= 'set ad_username = ?, ad_password = ?, ad_fullname = ? ,ad_phone = ?, ad_email = ?, ad_gender = ?, ad_dob = ? ';
        $sql .= 'where ad_id = ?';

        DB::update($sql, [$admin->ad_username, $admin->ad_password, $admin->ad_fullname, $admin->ad_phone, $admin->ad_email, $admin->ad_gender, $admin->ad_dob, $admin->ad_id]);

    }

}
