<?php


namespace App\Dao;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserDao
{
    /***
     * @param array $user
     * @return \App\User
     */
    public function register($user)
    {
        return User::create([
            'name' => $user['name'],
            'email' => $user['email'],
            'profile' => $user['profile'],
            'phone' => $user['phone'],
            'address' => $user['address'],
            'status' => true,
            'delete' => false,
            'password' => Hash::make($user['password']),
            'confirmation_token' => str_replace('/', '', bcrypt(Str::random(16))),
        ]);
        //return $result;
    }
    public function login($email, $password)
    {
        $password = md5($password);
        $result = DB::table('users')
            ->select(['id','name', 'email', 'profile'])
            ->where([
                ['email','=',$email],
                ['password','=',$password],
                ['confirmation_token','=',true],
            ])
            ->get();
        return $result;
    }
    public function delete($id)
    {
        $result = DB::table('users')
            ->where([
                ['user_id','=',$id],
            ])
            ->update([
                ['users.delete' => true]
            ]);
        return $result;
    }
    public function edit(User $user)
    {
        $result = DB::table('users')
            ->where([
                ['id','=',$user->id],
            ])
            ->update([
                [
                    'name' => $user->name,
                    'email' => $user->email,
                ]
            ]);
        return $result;
    }
    public function password(User $user)
    {
        $password = $user->password;
        $result = DB::table('users')
            ->where([
                ['id','=',$user->id],
            ])
            ->update([
                [
                    'password' => $password,
                ]
            ]);
        return $result;
    }
    public function get($id)
    {
        $result = DB::table('users')
            ->where([
                ['id','=',$id],
            ])
            ->get();
        return $result;
    }
    public function getAll()
    {
        $result = DB::table('users')
            ->where([
                ['users.delete','=',false],
            ])
            ->get();
        return $result;
    }
    public function check($email)
    {
        $result = DB::table('users')
            ->where([
                ['email','=',$email],
            ])
            ->count();
        return $result;
    }
}
