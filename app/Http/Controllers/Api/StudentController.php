<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    //
    /**
     * Create User
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {

        try {
            //Validated
            $validateUser = Validator::make(
                $request->all(),
                [
                    'avatar' => 'required',
                    'type' => 'required',
                    'open_id' => 'required',
                    'name' => 'required',
                    'email' => 'required|email',

                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'code' => false,
                    'msg' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }
            $validated = $validateUser->validated();
            $map = [];
            $map['type'] = $validated['type'];
            $map['open_id'] = $validated['open_id'];
            $user = Student::where($map)->first();

            //user logged in or not
            if (empty($user)) {
                //user does not exists in database
                $validated['token'] = md5(uniqid() . rand(100000, 999999));
                $validated['created_at'] = Carbon::now();
                // $validated['password'] = Hash::make($validated['password']);
                Student::insert($validated);
                $userId = Student::select('id')->where('token', $validated['token'])->first()->id;

                $userInfo = Student::where('id', '=', $userId)->first();

                $accessToken = $userInfo->createToken(uniqid())->plainTextToken;

                $userInfo->accessToken = $accessToken;
                Student::where('id', '=', $userId)->update(['access_token' => $accessToken]);
                $userInfo = Student::where('id', '=', $userId)->first();

                return response()->json([
                    'code' => 200,
                    'msg' => 'User Created Successfully',
                    'data' => $userInfo
                ], 200);
            }
            $accessToken = $user->createToken(uniqid())->plainTextToken;
            $user->accesToken = $accessToken;

            // $user = User::create([
            //     'name' => $request->name,
            //     'email' => $request->email,
            //     'password' => Hash::make($request->password)
            // ]);

            return response()->json([
                'code' => 200,
                'msg' => 'User logged in Successfully',
                'data' => $user,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => false,
                'msg' => $th->getMessage()
            ], 500);
        }
    }
}
