<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Customer;
use App\Models\User;

class CompanysController extends Controller
{
    public function store() 
    {
        $data = request()->validate([
            'name' => 'required|min:3',
            'address' => 'required|min:3',
            'field' => 'required|min:3'
        ]);

        Company::create($data);

        return true;
    }

    public function register()
    {
        
        $company = request()->get('company');
        $customer = request()->get('customer');
        $user = request()->get('user');
        
        $newCompany = Company::create($company);

        $newUser = User::create($user);

        $customer["company_id"] = $newCompany->id;
        $customer["user_id"] = $newUser->id;
        $newCustomer = new Customer($customer);
        $newCustomer->save();

        
        

        

        return [$newCompany, $newCustomer, $newUser];

    }
}
