<?php

namespace App\Http\Controllers\Iot;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\User;
use App\Sensor;

class SensorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('iot.addSensor')->withTitle('新增传感器')->with('user', session('user') )->with('sensors', session('sensors')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo $request->name;
		// var_dump($request->all());
		Sensor::create(['name' => $request->name, 'unit' => $request->unit, 'math' => $request->math, 'user_id' => session('userId')]);
		Session::forget('sensors');
		$sensors = User::find(session('userId'))->sensors;

		session(['sensors' => $sensors]);

		return redirect()->back()->with('success', true)->withTitle('新增成功')->with('user', session('user') )->with('sensors', session('sensors')); 



    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:10',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
