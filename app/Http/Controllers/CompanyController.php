<?php

namespace App\Http\Controllers;

use App\Ldap\Contact;
use App\Models\Company;
use App\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CompanyRequest;
use App\Http\Requests\CompanyaddRequest;

class CompanyController extends Controller
{
    public function company()
    {
        $user = Auth::user();
        $company = new Collection(Company::get());
        $company = $company->sortBy('position_order')->paginate(5);
        return view('crozz.company',['company' => $company, 'user' => $user]);
    }
    public function companysorted(Request $request)
    {
        $company = Company::get()->sortBy('position_order');
        $companycount = $company->count();
        for ($i=0; $companycount-1;$i++){
            foreach ($company as $comp){
                if($comp->id == $request->position[$i]){
                    $comp->position_order = $i+1;
                    $comp->save();
                }
            }
        }
    }
    public function companyadd(Request $request)
    {
        $rules = [
            'companyadd' => 'required|min:5|unique:companies,company',
        ];
        $messages = [
            'companyadd.required' => "Значення військова частина обов'язкове",
            'companyadd.min' => 'Мінімальне значення для поля Військова частина = 5',
            'companyadd.unique' => 'Данний запис вже існує = 5',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }
        $companyall = Company::all()->count();
        $company = new Company;
        $company->company = $request->companyadd;
        $company->position_order = $companyall + 1;
        $company->save();
        return response()->json(['success' => 'Запис добавлено.']);

    }

        public  function companyupdate(Request $request)
        {
            $company = Company::find($request->id);
            if ($request->Update) {
                if ( $company->company != $request->company){
                    $rules = [
                        'company' => 'required|min:5|unique:companies,company',
                    ];
                    $messages = [
                        'company.required' => "Значення військова частина обов'язкове",
                        'company.min' => 'Мінімальне значення для поля Військова частина = 5',
                        'company.unique' => 'Данний запис вже існує = 5',
                    ];
                    $validator = Validator::make($request->all(), $rules, $messages);
                    if ($validator->fails()) {
                        return redirect()->back()->with('errors', $validator->errors());
                    } else {
                        $company->company = $request->company;
                        $company->save();
                        return redirect()->back()->with('message', 'Запис оновлено');
                    }
                } else {


                    $company->company = $request->company;
                    $company->save();
                    return redirect()->back()->with('message', 'Запис оновлено');
                }

            }
            if ($request->Delete) {
                $company = Company::find($request->id);
                $company->delete();
                return redirect()->back()->with('message', 'Запис видалено');
            }

        }


}
