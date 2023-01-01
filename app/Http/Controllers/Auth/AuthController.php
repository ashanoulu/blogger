<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewAccountRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;

class AuthController extends Controller
{

    private $userRepository;

    /**
     * AuthController constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function login(LoginRequest $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        $user = $this->userRepository->findUserByEmailAndPassword($email, Hash::make($password));

        if (Hash::check($password, $user->password)){
            if ($user){
                if (!$token = $token = auth('api')->attempt([
                    'email' =>  $request->get('email'),
                    'password'=> $request->get('password')
                ])){
                    return response()->json(['error' => 'Unauthorized'], 200);
                }
            } else {
                return response()->json(['error' => 'User Name or Password incorrect'], 401);
            }
        } else {
            return response()->json(['error' => 'User Name or Password incorrect'], 401);
        }

        return response()->json(['status' => 'success','user'=>$user,'token'=>$token,'expires' => auth('api')->factory()->getTTL() * 60], 200)->header('Authorization', $token);
    }

    public function register(CreateNewAccountRequest $request)
    {

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
        if (!$token = $token = auth('api')->attempt([
            'email' =>  $request->get('email'),
            'password'=> $request->get('password')

        ])){
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json(['status' => 'success','user'=>$user,'token'=>$token,'expires' => auth('api')->factory()->getTTL() * 60], 200)->header('Authorization', $token);
    }

    public function refresh()
    {
        if ($token = auth('api')->refresh()) {
            return response()
                ->json(['status' => 'success'], 200)
                ->header('Authorization', $token);
        }

        return response()->json(['error' => 'refresh_token_error'], 401);
    }

    public function user()
    {
        return new UserResource(auth('api')->user());
    }


    public function logout()
    {
        auth('api')->logout();
        echo '<script>localStorage.removeItem("user");</script>';
        exit;
    }
}
