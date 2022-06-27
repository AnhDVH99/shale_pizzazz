<?php

namespace App\Http\Controllers;

use App\Http\Repository\AdminRepos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;



class AdminControllerWithRepos extends Controller
{
    public function index()
    {
        $admins = AdminRepos::getAllAdmin();
        return view('adminWithRepos.index',
            [
                'admins' => $admins,
            ]);
    }

    public function show($ad_id)
    {

        $admin = AdminRepos::getAdminById($ad_id); //this is always an array of objects
        return view('adminWithRepos.show',
            [
                'admin' => $admin[0] //get the first element
            ]
        );
    }


    public function edit($ad_id)
    {
        $admin = AdminRepos::getAdminById($ad_id); //this is always an array


        return view(
            'adminWithRepos.update',
            ["admin" => $admin[0]]);
    }

    public function update(Request $request, $ad_id)
    {
        if ($ad_id != $request->input('ad_id')) {
            //id in query string must match id in hidden input
            return redirect()->action('AdminControllerWithRepos@index');
        }

        $this->formValidate($request)->validate(); //shortcut

        $admin = (object)[
            'ad_id' => $request->input('ad_id'),
            'ad_username' => $request->input('ad_username'),
            'ad_password' => bcrypt($request->input('ad_password')),
            'ad_fullname' => $request->input('ad_fullname'),
            'ad_phone' => $request->input('ad_phone'),
            'ad_email' => $request->input('ad_email'),
            'ad_gender' => $request->input('ad_gender'),
            'ad_dob' => $request->input('ad_dob')
        ];


        AdminRepos::update($admin);

        return redirect()->action('AdminControllerWithRepos@index')
            ->with('msg', 'Update Successfully');
    }


    private function formValidate($request)
    {
        return Validator::make(
            $request->all(),
            [
                'ad_password' => ['required', 'min:8'
//                    function ($attribute, $value, $fail) use ($request) {
//                        $hash_password =
//                        $failCondition =
//                        if ($failCondition) {
//                            $fail('Password does match please enter correct password to update!');
//                        }
//                    },
                ],
                'ad_email' => ['required', 'email',],
                'ad_phone' => ['starts_with:0', 'required', 'digits:11'],
                'ad_fullname' => ['required', 'regex:/(^([a-z A-z]+$))/u'],
                'ad_username' => ['required'],
                'ad_gender' => ['required'],
                'ad_dob' => ['required','after:01/01/1999']

            ],
            [
                'ad_email.required' => 'Please enter your email',
                'ad_email.email' => 'Invalid email! please re-enter email',
                'ad_phone.starts_with' => 'Phone number must start with 0, Please add 0 at the beginning of phone number',
                'ad_phone.required' => 'Please enter Phone number',
                'ad_phone.digits' => 'Phone number must be 11 digital, please enter exact 11 number',
                'ad_fullname.required' => 'Please enter your full name',
                'ad_username.required' => 'Please enter username',
                'ad_gender.required' => 'Please select gender',
                'ad_dob.after' => 'Date of birth must be a date after 01/01/1999',
                'ad_fullname.regex' => 'Please enter letter character in Full Name fields'
            ]

        );

    }
}
