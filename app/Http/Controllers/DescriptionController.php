<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Description;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class DescriptionController extends Controller
{
    public function description()
    {
        $user = Auth::user();
        $description = new Collection(Description::get());
        $description = $description->sortBy('position_order')->paginate(10);

        return view('crozz.description',['description' => $description, 'user' => $user]);
    }

    public function descriptionsorted(Request $request)
    {
        $description = Description::get()->sortBy('position_order');
        $descriptioncount = $description->count();
            for ($i=0; $descriptioncount-1;$i++){
                foreach ($description as $desc){
                if($desc->id == $request->position[$i]){
                   $desc->position_order = $i+1;
                    $desc->save();
                }
            }
        }
     }

    public function descriptionadd(Request $request)
    {
        /*$description = new Description;
        $description->description = $request->descriptionadd;
        $description->save();
        return Redirect::route('description');*/
        $rules = [
            'descriptionadd' => 'required|min:5|unique:descriptions,description',
        ];
        $messages = [
            'descriptionadd.required' => "Значення військова частина обов'язкове",
            'descriptionadd.min' => 'Мінімальне значення для поля Військова частина = 5',
            'descriptionadd.unique' => 'Данний запис вже існує = 5',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }
        $company = new Description;
        $companyall = Description::all()->count();
        $company->description = $request->descriptionadd;
        $company->description = $request->descriptionadd;
        $company->position_order = $companyall + 1;
        $company->save();
        return response()->json(['success' => 'Запис добавлено.']);
    }
    public function descriptionupdate(Request $request)
    {
        $model = Description::find($request->id);
        if ($request->Update) {
            if ( $model->description != $request->description){
                $rules = [
                    'description' => 'required|min:5|unique:descriptions,description',
                ];
                $messages = [
                    'description.required' => "Значення військова звання обов'язкове",
                    'description.min' => 'Мінімальне значення для поля Військова звання = 5',
                    'description.unique' => 'Данний запис вже існує',
                ];
                $validator = Validator::make($request->all(), $rules, $messages);
                if ($validator->fails()) {
                    return redirect()->back()->with('errors', $validator->errors());
                } else {
                    $model->description = $request->description;
                    $model->save();
                    return redirect()->back()->with('message', 'Запис оновлено');
                }
            } else {


                $model->description = $request->description;
                $model->save();
                return redirect()->back()->with('message', 'Запис оновлено');
            }

        }
        if ($request->Delete) {
            $model = Description::find($request->id);
            $model->delete();
            return redirect()->back()->with('message', 'Запис видалено');
        }
    }
}
