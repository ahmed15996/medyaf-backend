<?php

namespace App\Services\Admin;

use App\Models\Country;
use App\Repositories\Sql\CountryRepository;
use Illuminate\Http\Request;

class CountryService
{
    protected $countryRepo ;

    public function __construct(CountryRepository $countryRepo)
    {
        $this->countryRepo    = $countryRepo ;
    }

    public function get_countries($request){
        $countries = Country::query();
        orderById($request , $countries);
        return $this->columns($countries);
    }

    public function columns($countries){
        return DataTables($countries)

        ->editColumn('created_at' , function($country){
            return $country->created_at->format('y-m-d');
        })
        ->editColumn('users' , function($country){
            return $country->users()->count();
        })
        ->addColumn('action', 'dashboard.backend.countries.actions')
        ->rawColumns(['action'])
        ->make(true);
    }

    public function add_country(Request $request , $data){
        $country =$this->countryRepo->create($data);
    }

    public function update_country(Request $request , $data , $country){
        $country->update($data);
    }


}
