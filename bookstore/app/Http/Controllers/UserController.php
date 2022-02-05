<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
Use  Illuminate\Http\Response;
Use  Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($user_id )
    {
        return User::find($user_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        $user=User::find($user_id);
        return $user->delete();
    }

    public function register(Request $request){
        $fields = $request->validate([
            'name' => 'required|string',
            'email'=> 'required|string|unique:users,email',
            'password'=> 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt( $fields['password'])
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        $response=[
            'user'=>$user,
            'token'=>$token
        ];

        return response()->json(['data' => $user, 'access_token'=> $token,
        'token_type'=>'Bearer']);
    }

    public function login(Request $request){
        $fields = $request->validate([
            
            'email'=> 'required|string',
            'password'=> 'required|string'
        ]);

        //check Email
        $user = User::where('email', $fields['email'])->first();

        //Check pass
        if(!$user ||!Hash::check($fields['password'], $user->password)){
            return response([
                'message' => "Bad username/password"
            ], 401);

        $token = $user->createToken('auth_token')->plainTextToken;

        $response=[
            'user'=>$user,
            'token'=>$token
        ];

        return response()->json(['data' => $user, 'access_token'=> $token,
        'token_type'=>'Bearer']);
    }

    
    }
}