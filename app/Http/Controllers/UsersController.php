<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Console;
use App\Display;
use App\Services;
use App\User_type;
use App\Http\Resources\Users as UsersResource;
use App\Http\Resources\UsersCollection;
use App\Http\Resources\Usertype as UserstypeResource;
use App\Http\Resources\UsertypeCollection;
use App\Http\Resources\Services as ServicesResource;
use App\Http\Resources\ServiceCollection;
use App\Http\Resources\Consoles as ConsolesResource;
use App\Http\Resources\ConsoleCollection;
use App\Http\Resources\Displays as DisplaysResource;
use App\Http\Resources\DisplayCollection;
use App\Http\Requests\NewUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UsersController extends Controller
{
    //Affiche liste Users
    public function index()
    {
      $users = new USersCollection(User::all());
        return view('listusers',
            [
                'users' => $users,
            ]
        );
    }

    //Create New Users
    public function store(NewUserRequest $request)
    {

        $request->validate([
            'email',
            'user_type_id',
            'username',
            'pin'
        ]);

        $path = null;
                if ($request->file('photo')) {
                    $path = 'avatar_'.time().'.'.$request->photo->extension();
                    $request->photo->move(public_path('storage/images'), $path);
                }
                $users = User::create([
                        'name' => $request->name,
                        'last_name' => $request->last_name,
                        'username' => $request->username,
                        'password' => bcrypt($request->password),
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'pin'  => $request->pin,
                        'photo' => $path,
                        'status' => $request->status,
                        'user_type_id' => $request->user_type_id,
                        'updated_at' =>"",
                        'created_at' =>"",
                    ]);
                    return redirect('/users');
    }

    //Update USers
     public function update(UpdateUserRequest $request, User $user)
    {

        $validated = $request->validated();

        $user->email = $validated["email"];
        $user->username = $validated["username"];
        $user->pin = $validated["pin"];
        $user->user_type_id = $validated["user_type_id"];

        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->pin = $request->input('pin');
        $user->status = $request->input('status');
        $user->user_type_id = $request->input('user_type_id');
        if ($request->hasfile('photo')) {
          $file = $request->file('photo');
          $extension = $file->getClientOriginalExtension();
          $filename = time() . '.' .$extension;
          $file->move('storage/images/', $filename);
          $user->photo = $filename;
        }

        $user->save();

       return redirect('/users');
    }

    //Delete Users
    public function destroy($id)
    {
        $user = User::findOrfail($id);
        if (is_null($user)) {
            return response()->json(['error' => 'id :'.$id.' ne correspond a aucun USer'], 404);
        }
        else{
            DB::table('users')->delete($id);
            return response()->json(['success' => 'Bien supprimé' ,
                'id User' =>$id], 401);
	    }
    }

     /*public function destroy(User $user){
       $user->delete();
       return response(204);
   }*/


    //Affiche Liste[users,console,service,display] in office
    public function inde()
    {
          $users = new USersCollection(User::all());
          $consoles = new ConsoleCollection(Console::all());
          $services = new ServiceCollection(Services::all());
          $displays = new DisplayCollection(Display::all());
            return view('offices',
                [
                    'users' => $users,
                    'consoles' => $consoles,
                    'services' => $services,
                    'displays' => $displays
                ]
        );

    }

    public function showuser($id)
    {
        $user = User::find($id);
        return view('updateuser' , ['post' => $user]);
    }


}
