<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Sql\ContactUsRepository;

class ContactController extends Controller
{

    protected $contactRepo ;


    public function __construct(ContactUsRepository $contactRepo)
    {
      $this->contactRepo = $contactRepo ;
    }

    public function get_contacts(){
      $contacts = $this->contactRepo->query();
      return DataTables($contacts)
      ->editColumn('created_at' , function($contact){
          return $contact->created_at->format('y-m-d');
      })

      ->addColumn('msg', 'dashboard.backend.contacts.msg')
      ->rawColumns(['msg'])
      ->make(true);
    }

    public function index(){
      return view('dashboard.backend.contacts.index');
    }
}
