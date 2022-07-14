<?php

namespace App\Http\Controllers;

use App\Ldap\Contact;
use App\Models\Company;
use App\Ldap\User;
use Illuminate\Http\Request;
use App\Support\Collection;
use Illuminate\Support\Facades\Auth;
use LdapRecord\Models\Model;

class UserController extends Controller
{
    public function index()
    {
        $contact = new Collection(User::get());
        $contact = $contact->paginate(3);
        //$users = User::paginate(3);
        return view('crozz.user',[ 'users' => $contact,'user' => Auth::user()]);
    }
    public function add(Request $request)
    {

        /*$model = new User;

        $model->distinguishable = 'cn='.$request->cn.',cn=Users,dc=dov,dc=ua';

        $model->sn = $request->sn;

        $model->cn = $request->cn;

        $model->save();*/
        /*$user = App\Models\User::create([
            'distinguishable' => 'cn='.$request->cn.',cn=Users,dc=dov,dc=ua',
            'cn'        => 'Steve Bauman',
        ]);*/

        $user = new User;
        $user->ldap->cn = 'Steve Bauman';
        $user->ldap->givenname = 'Steve';
        $user->ldap->sn = 'Bauman';
        $user->ldap->company = 'Acme';
        $user->save();

        return redirect()->back()->with('message', 'Запис добавлено.');
        //$users = User::paginate(3);
        //return view('crozz.user',[ 'users' => $users,'user' => Auth::user()]);
    }


}
