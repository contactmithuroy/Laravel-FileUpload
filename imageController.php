<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Car;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

            // $imageName = rand(11111, 99999) . '.' . $request->file('image')->getClientOriginalExtension();
            // $destinationPath = 'events';
            // $fileName = rand(11111, 99999) . '.' . $extension;
            // $upload_success = $image->move($destinationPath, $imageName);
  
            // $image=$request->file('image');
            // $fileName = time().'-'.$image->getClientOriginalExtension();   

        $request->validate([
            'name'=>'required',
            'model'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg|max:5048'
        ]);     

        if($request->hasfile('image')){

            $imageName = rand(11111, 99999) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);

            $car = Car::create([
            'name'=>$request->name,
            'model'=>$request->model,
            'image'=>$imageName
           ]);
           $car->save();
        }
        return redirect('/cars');
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
