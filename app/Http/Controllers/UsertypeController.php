<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User_type;
use App\Http\Resources\Usertype as UsertypeResource;
use App\Http\Resources\UsertypeCollection;

class UsertypeController extends Controller
{
    //Affiche liste Typeusers in users
    public function index()
	{
        $types = new UsertypeCollection(User_type::all());
        return view('createuser',
            [
                'types' => $types,
            ]
        );
    }
}
