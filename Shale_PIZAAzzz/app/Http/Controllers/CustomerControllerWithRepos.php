<?php

namespace App\Http\Controllers;



use App\Http\Repository\CustomerRepos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CustomerControllerWithRepos extends Controller
{
    public function index()
    {
        $customers = CustomerRepos::getAllCustomer();
        return view('customerWithRepos.index',
            [
                'customers' => $customers,
            ]);
    }

    public function show($cus_id)
    {

        $customer = CustomerRepos::getCustomerById($cus_id); //this is always an array of objects
        return view('customerWithRepos.show',
            [
                'customer' => $customer[0] //get the first element
            ]
        );
    }


    public function edit($ad_id)
    {
        $customer = CustomerRepos::getCustomerById($ad_id); //this is always an array


        return view(
            'customerWithRepos.update',
            ["customer" => $customer[0]]);
    }

    public function update(Request $request, $cus_id)
    {
        if ($cus_id != $request->input('cus_id')) {
            //id in query string must match id in hidden input
            return redirect()->action('CustomerControllerWithRepos@index');
        }

        $this->formValidate($request)->validate(); //shortcut

        $customer = (object)[
            'cus_id' => $request->input('cus_id'),
            'cus_username' => $request->input('cus_username'),
            'cus_password' => bcrypt($request->input('cus_password')),
            'cus_fullname' => $request->input('cus_fullname'),
            'cus_phone' => $request->input('cus_phone'),
            'cus_email' => $request->input('cus_email'),
            'cus_gender' => $request->input('cus_gender'),
            'cus_dob' => $request->input('cus_dob')
        ];


        CustomerRepos::update($customer);

        return redirect()->action('CustomerControllerWithRepos@index')
            ->with('msg', 'Update Successfully');
    }


    private function formValidate($request)
    {
        return Validator::make(
            $request->all(),
            [
                'ad_password' => ['required', 'min:8',Rule::exists('admin')
//                    function ($attribute, $value, $fail) use ($request) {
//                        $hash_password =
//                        $failCondition =
//                        if ($failCondition) {
//                            $fail('Password does match please enter correct password to update!');
//                        }
//                    },
                ],
                'cus_email' => ['required', 'email',],
                'cus_phone' => ['starts_with:0', 'required', 'digits:11'],
                'cus_fullname' => ['required', 'regex:/(^([a-z A-z]+$))/u'],
                'cus_username' => ['required'],
                'cus_gender' => ['required']
            ],
            [
                'cus_email.required' => 'Please enter your email',
                'cus_email.email' => 'Invalid email! please re-enter email',
                'cus_phone.starts_with' => 'Phone number must start with 0, Please add 0 at the beginning of phone number',
                'cus_phone.required' => 'Please enter Phone number',
                'cus_phone.digits' => 'Phone number must be 11 digital, please enter exact 11 number',
                'cus_fullname.required' => 'Please enter your full name',
                'cus_username.required' => 'Please enter username',
                'cus_gender.required' => 'Please select gender',
                'cus_fullname.regex' => 'Please enter letter character in Full Name fields'
            ]

        );

    }
}
