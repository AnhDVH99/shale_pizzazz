<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;

class CustomerRepos
{
    public static function getAllCustomer()
    {
        $sql = 'select c.* ';
        $sql .= 'from customers as c ';
        $sql .= 'order by c.cus_username';

        return DB::select($sql);
    }

    public static function getCustomerById($cus_id)
    {
        $sql = 'select c.* ';
        $sql .= 'from customers as c ';
        $sql .= 'where c.cus_id = ? ';

        return DB::select($sql, [$cus_id]);
    }


    public static function update($customer)
    {
        $sql = 'update customers ';
        $sql .= 'set cus_username = ?, cus_password = ?, cus_fullname = ? ,cus_phone = ?, cus_email = ?, cus_gender = ?, cus_dob = ? ';
        $sql .= 'where cus_id = ?';

        DB::update($sql, [$customer->cus_username, $customer->cus_password, $customer->cus_fullname, $customer->cus_phone, $customer->cus_email, $customer->cus_gender, $customer->cus_dob, $customer->cus_id]);

    }
}
