<?php

namespace App\Http\Controllers;

use App\Dish;
use Illuminate\Http\Request;
use App\Menu;
use App\Http\Requests\StoreDishRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::all();
        return view('admin.dish.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $menus = Menu::all(); //paimam is duomenu bazes duomenis
            return view('admin.dish.create', compact('menus'));//nukreipiam i atvaizdavima
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDishRequest $request)
    {
      //dd($request);
      $timestamp = Carbon::now()->toAtomString(); //prideda laika prie foto

      $name = $request->file('photo')->getClientOriginalName();
      $path = $request->file('photo')->storeAs('public/image',$timestamp.$name);
      Image::make(Input::file('photo'))->resize(100, 200)->save(storage_path('app/public/image/'.$name));
      $dish= new Dish();
      $dish->title = $request->title;
      $dish->price = $request->price;
      $dish->description = $request->description;
      $dish->menu_id = $request->menu_id;
      $dish->photo = basename($path);
      $dish->save();
      return redirect('admin/dish')->with(['message'=>'sekmingai prideta']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        $menus = Menu::all();
        return view('admin.dish.edit',['dish'=>$dish],compact('menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {

      if($request->file('photo')) {
       $path = $request->file('photo')->getClientOriginalName();
       $path = $request->file('photo')->storeAs('public/image',$timestamp.$name);
       Image::make(Input::file('photo'))->resize(300, 200)->save(storage_path('app/public/image/'.$name));
       $oldPath = 'public/image/';
       if (!empty($dish->photo)) {
         Storage::delete($oldPath.$dish->photo);
       }
       $dish->photo = basename($path);
     }
       $dish->title = $request->title;
       $dish->price = $request->price;
       $dish->description = $request->description;
       $dish->menu_id = $request->menu_id;

       $dish->update();
       return redirect('admin/dish')->with(['message'=>'Sekmingai issaugota']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {

    $oldPath = 'public/image/';
    if(!empty($dish->photo)) {
    Storage::delete($oldPath.$dish->photo);
    }
        $dish->delete();
        return redirect('admin/dish');
    }
}
