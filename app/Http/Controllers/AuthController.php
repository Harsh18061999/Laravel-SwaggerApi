<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \App\Http\Requests\RegisterRequest;
use App\Models\User;
class AuthController extends Controller
{
        /**
    * @OA\Post(
    *      path="/register",
    *      operationId="storeUser",
    *      tags={"Register"},
    *      summary="User Register",
    *      description="User Register here",
    *      @OA\RequestBody(
    *       @OA\JsonContent(),
    *          required=true,
    *          @OA\MediaType(
    *                mediaType="multipart/form-data",
    *               @OA\Schema(
    *                   type="object",
    *                   required={"name","email", "password", "password_confirmation"},
    *                   @OA\Property(property="name", type="text"),
    *                   @OA\Property(property="email", type="text"),
    *                   @OA\Property(property="password", type="password"),
    *                   @OA\Property(property="password_confirmation", type="password")
    *               ),
    *           ),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function register(Request $request){

        // $user = User::create($request->all());

        // return (new UserResource($user))
        //     ->response([

        //     ])
        //     ->setStatusCode(Response::HTTP_CREATED);

        $validator = \Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return errorResponse($validator->errors());
        }

        $data['password'] = Hash::make($request->password);
        $data['name'] = $request->name;
        $data['email'] = $request->email;
       
        $user = User::create($data);
        $user = new UserResource($user);

        return response([
            'message' => __('register_success'),
            'user' => $user,
            'token' =>  $user->createToken('Register')->plainTextToken
        ], 200);
    }

      /**
        * @OA\Post(
        * path="/login",
        * operationId="authLogin",
        * tags={"Login"},
        * summary="User Login",
        * description="Login User Here",
        *     @OA\RequestBody(
        *         @OA\JsonContent(),
        *         @OA\MediaType(
        *            mediaType="multipart/form-data",
        *            @OA\Schema(
        *               type="object",
        *               required={"email", "password"},
        *               @OA\Property(property="email", type="email"),
        *               @OA\Property(property="password", type="password")
        *            ),
        *        ),
        *    ),
        *      @OA\Response(
        *          response=201,
        *          description="Login Successfully",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(
        *          response=200,
        *          description="Login Successfully",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(
        *          response=422,
        *          description="Unprocessable Entity",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(response=400, description="Bad request"),
        *      @OA\Response(response=404, description="Resource Not Found"),
        * )
        */
    public function login(Request $request){
        $validator = \Validator::make($request->all(), [
            'email' => 'required|exists:users',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return errorResponse($validator->errors());
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            return response([
                'user' => new UserResource($user),
                'token' => $user->createToken('Register')->plainTextToken,
            ], 200);
        }else{
            return errorResponse([__('login_fail')]);
        }
    }
}
