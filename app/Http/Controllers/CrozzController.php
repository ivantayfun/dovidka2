<?php

namespace App\Http\Controllers;

//use App\Helpers\General\CollectionHelper;
//use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Ldap\User;
use App\Ldap\Contact;
use App\Models\Description;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use LdapRecord\Connection;
use App\Support\Collection;
class CrozzController extends Controller
{
    public function position()
    {
        $user = Auth::user();
        $description = Description::all();
        return view('crozz.title',['description' => $description, 'user' => $user]);
    }


    public function main()
    {
        $user = Auth::user();
        $description = Description::all();
        $company = Company::all();
        $contact = new Collection(Contact::in('ou=zsu,dc=dov,dc=ua')->where('objectclass', '=', 'contact')->get());
        $contact = $contact->paginate(10);
        return view('crozz.contact',['contact' => $contact,'description' => $description, 'company' => $company, 'user' => $user]);
    }
    public function index()
    {
        //$user = Auth::user();
        $description = Description::all();
        $company = Company::all();
        //$contact = new Collection(Contact::in('ou=zsu,dc=dov,dc=ua')->where('objectclass', '=', 'contact')->get());
        //$contact = $contact->paginate(10);
        return view('crozz.crozz',['description' => $description, 'company' => $company]);
    }



}
