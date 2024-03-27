<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SCController extends Controller
{
    public function create(Request $request)
    {
        try {
            // dd($request->all());
            if (request()->wantsJson()) {
                if (isset($request['info'])) {
                    $infoData = $request['info'];
                    $response =  DB::table('sc_users')->insertGetId(['info' => json_encode($infoData)]);
                    if ($response) {
                        return response([
                            'message' => 'Data inserted successfully',
                            'status' => 200,
                            'userID' => $response
                        ]);
                    }
                } else {
                    return response([
                        'message' => 'Failed to insert data',
                        'status' => 400,
                    ]);
                }
            }
            //code...
        } catch (\Throwable $e) {
            //throw $th;
            // dd($e);
            return response([
                'status'=> 500,
                'message'=> $e
            ]);
        }
    }

    public function index()
    {
        try {
            if (request()->wantsJson()) {
                $data = [];
                $users = DB::table('sc_users')->get();
                foreach ($users as $key => $user) {
                    $infoArray = json_decode($user->info, true);
                    $data[$key]['id'] = $user->id;
                    $data[$key]['info'] = $infoArray;
                }
                if ($users) {
                    return response([
                        'status' => 200,
                        'message' => 'Data found successfully',
                        'data' => $data
                    ]);
                } else {
                    return response([
                        'status' => 400,
                        'message' => 'Failed to get data'
                    ]);
                }
            }
        } catch (\Throwable $e) {
            dd($e);
        }
    }
}
/* 

if (request()->wantsJson()) {
                $data = $data->status()->get();

            if ($data) {
                return response([
                    'status' => true,
                    'message' => 'Data Show Successfully',
                    'code' => 200,
                    'data' => SliderResource::collection($data),

                ], 200);
            } else {
                return response([
                    'status' => false,
                    'message' => 'তথ্য পাওয়া যায়নি',
                    'code' => 404,
                    'data' => null,

                ], 404);
            }

*/