<?php

namespace App\Http\Controllers;

use App\Models\Post_office_box;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostOfficeBoxController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $model = Post_office_box::paginate(10);
        return view('crozz.post_office_box',['post_office_boxis' => $model, 'user' => $user]);
    }
    public function add(Request $request)
    {
        $rules = [
            'post_office_boxadd' => 'required|min:1|unique:post_office_boxis,post_office_box',
        ];
        $messages = [
            'post_office_boxadd.required' => "Значення будівля обов'язкове",
            'post_office_boxadd.min' => 'Мінімальне значення для поля Будівля = 1',
            'post_office_boxadd.unique' => 'Данний запис вже існує',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }
        $model = new Post_office_box();
        $model->post_office_box = $request->post_office_boxadd;
        $model->save();
        return response()->json(['success' => 'Запис добавлено.']);

    }

    public  function update (Request $request)
    {
        $model = Post_office_box::find($request->id);
        if ($request->Update) {
            if ( $model->post_office_box != $request->post_office_box){
                $rules = [
                    'post_office_box' => 'required|min:1|unique:post_office_boxis,post_office_box',
                ];
                $messages = [
                    'post_office_box.required' => "Значення будівля обов'язкове",
                    'post_office_box.min' => 'Мінімальне значення для поля Будівля = 1',
                    'post_office_box.unique' => 'Данний запис вже існує',
                ];
                $validator = Validator::make($request->all(), $rules, $messages);
                if ($validator->fails()) {
                    return redirect()->back()->with('errors', $validator->errors());
                } else {
                    $model->post_office_box = $request->post_office_box;
                    $model->save();
                    return redirect()->back()->with('message', 'Запис оновлено');
                }
            } else {


                $model->post_office_box = $request->post_office_box;
                $model->save();
                return redirect()->back()->with('message', 'Запис оновлено');
            }

        }
        if ($request->Delete) {
            $model = Post_office_box::find($request->id);
            $model->delete();
            return redirect()->back()->with('message', 'Запис видалено');
        }
        return redirect()->back();
    }


}
