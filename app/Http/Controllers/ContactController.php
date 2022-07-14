<?php

namespace App\Http\Controllers;

use App\Ldap\Contact;
use App\Models\Company;
use App\Models\Description;
use App\Models\Post_office_box;
use Illuminate\Http\Request;
use App\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    var $paginatesize;

    public function index()
    {
        $description = Description::all()->sortBy('position_order');
        $company = Company::all()->sortBy('position_order');
        $contact = new Collection(Contact::in('ou=zsu,dc=dov,dc=ua')->where('objectclass', '=', 'contact')->get());
        $contact = $contact->sortBy('cn')->paginate(10);
        return view('crozz.contact',['contact' => $contact,'description' => $description, 'company' => $company, 'user' => Auth::user()]);
    }
    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('login');
    }
    public function fetch_data(Request $request)
    {

        if($request->ajax())
        {
            $description = Description::all();
            $company = Company::all();
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            if($query != ''){
                $contact = new Collection(Contact::in('ou=zsu,dc=dov,dc=ua')
                    ->where('objectclass', '=', 'contact')
                    ->orwhereContains('cn',  $query)
                    ->orwhereContains('sn',  $query)
                    ->orderBy($sort_by, $sort_type)
                    ->get());
            }

            else {
                $contact = new Collection(Contact::in('ou=zsu,dc=dov,dc=ua')
                    ->where('objectclass', '=', 'contact')
                    ->orderBy($sort_by, $sort_type)->get());
            }


            $contact = $contact->paginate(3);

            return view('crozz.paginationcontact', ['contact' => $contact,'description' => $description, 'company' => $company, 'user' => Auth::user()]);
        }

    }
    public function add(Request $request)
    {
        /*$rules = [
            //ФІО      sn
            'sn' => 'required|min:5',
            //АТС-2
            //'homephone' => 'required|min:5',
            //ЗСУ-002
            'cn'=> 'required|min:5|unique:contact,cn',
            //Званя
            //'description' => 'required|min:5',
            //Посада
            //'title' => 'required|min:5',
            //Підрозділ
            //'department' => 'required|min:5',
            //Військова частина
            //'company' => 'required|min:5',
            //Кабінет
            //'physicaldeliveryofficename' => 'required|min:5',
            //Будівля
            //'postofficebox' => 'required|min:5',

        ];
        $messages = [
            'sn.required' => "Значення ФІО обов'язкове",
            'sn.min' => 'Мінімальне значення для поля ФІО = 5',
            'sn.unique' => 'Данний запис вже існує',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }*/
/*        $model = Contact::create([
        'distinguishedname' => 'cn=' . $request->cn . ',ou=zsu,dc=dov,dc=ua',
        'sn' => $request->sn,
        'cn' => $request->cn,
        'homephone' => $request->homephone,
        'description' => $request->description,
        'title' => $request->title,
        'department' => $request->department,
        'company' => $request->company,
        'physicaldeliveryofficename' => $request->physicaldeliveryofficename,
        'postofficebox' => $request->postofficebox,
        ]);*/
        $model = new Contact();
        $model->distinguishedname = 'cn='.$request->cn.',ou=zsu,dc=dov,dc=ua';
        $model->sn = $request->sn;
        $model->cn = $request->cn;
        $model->homephone = $request->homephone;
        $model->description = $request->description;
        $model->title = $request->title;
        $model->department = $request->department;
        $model->company = $request->company;
        $model->physicaldeliveryofficename = $request->physicaldeliveryofficename;
        $model->postofficebox = $request->postofficebox;
        $model->save();
        return redirect()->back()->with('message', 'Запис добавлено.');
        //return response()->json(['success' => 'Запис добавлено.']);

    }

    public  function update (Request $request)
    {

        if ($request->Update) {
            $model = Contact::in('ou=zsu,dc=dov,dc=ua')->where('cn', '=', $request->cn)->first();//Post_office_box::find($request->id);
            $model->sn = $request->sn;
            $model->cn = $request->cn;
            $model->homephone = $request->homephone;
            //dd($request);
            $model->description = $request->description;
            $model->title = $request->title;
            $model->department = $request->department;
            $model->company = $request->company;
            $model->physicaldeliveryofficename = $request->physicaldeliveryofficename;
            $model->postofficebox = $request->postofficebox;
            $model->save();
            return redirect()->back()->with('message', 'Запис оновлено');


        }
        if ($request->Delete) {
            $model = Contact::in('ou=zsu,dc=dov,dc=ua')->where('cn', '=', $request->cn)->first();
            $model->delete();
            return redirect()->back()->with('message', 'Запис видалено');
        }
        return redirect()->back();
    }


}
