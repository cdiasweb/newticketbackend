<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\CompanyImage;
use App\Models\Customer;
use App\Models\User;
use App\Mail\ConfirmUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Registered;



class CompaniesController extends Controller
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
        
        try {

            $company = request()->get('company');
            $customer = request()->get('customer');
            $user = request()->get('user');

            // check user
            $userExists = DB::table('users')
                ->where('email', $user["email"])
                ->get();
            
            if( sizeof($userExists) > 0 ) {
                return [
                    "error" => true,
                    "message" => "Já existe um usuário com essas informações." 
                ];
            }

            // define user type
            $user["type"] = 1;
            
            // company images
            $companyImages = $company["companyImages"];
            unset( $company["companyImages"] );

            $newCompany = Company::create($company);

            $images = [];
            if( sizeof($companyImages) > 0 ) {

                foreach( $companyImages as $k => $v ) {

                    $images[] = $v["imagePreview"];

                }

            }

            $newCompany->images()->createMany($images);
            
            $user["password"] = bcrypt($user["password"]);
            $newUser = User::create($user);
            

            $customer["company_id"] = $newCompany->id;
            $customer["user_id"] = $newUser->id;
            $newCustomer = Customer::create($customer);

            // send e-mail
            $newUser->sendEmailVerificationNotification();

            return [$newCompany, $newCustomer, $newUser];

        } catch (Exception $e) {

            return "Erro ao realizar o registro da empresa: " . $e->message();

        }

    }
}
