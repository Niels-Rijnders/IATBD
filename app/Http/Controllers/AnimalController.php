<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Auth;
use DB;
class AnimalController extends Controller
{
    public function index(){
        return view('animal.index',[
            'animal' => \App\Models\Animal::all(),
            'role' => \App\Models\User::all()->where('id', Auth::id())->first()->role,
        ]);
    }
    
    public function show($id){

        return view('animal.show', [
            'animal' => \App\Models\Animal::find($id),
            'role' => \App\Models\User::all()->where('id', Auth::id())->first()->role,
        ]);
    }

    public function create(){
        return view('animal.create', [
            'kind_of_animal' => \App\Models\KindOfAnimal::all(),
            'images' => \App\Models\Image::all(),
        ]);
    }

    public function store(Request $request, \App\Models\Animal $animal){
        $animal->name = $request->input('name');
        $animal->species = $request->input('species');
        $animal->breed = $request->input('breed');
        $animal->age = $request->input('age');
        $animal->description = $request->input('description');
        $animal->image = $request->input('image');
        $animal->owner = Auth::id();
        $animal->oppasser = null;
        
        try{
            $animal->save();
            return redirect('/');
        }
        catch(Exception $e){
            return redirect('/animal/create');
        }
    }

    public function oppassen(Request $request, \App\Models\Animal $animal /* of \App\Models\Animal::find($id)*/){
        $animal->oppasser = Auth::id();
        
        try{
            $animal->save();
            return redirect('/');
        }
        catch(Exception $e){
            return redirect('/animal/create');
        }
    }

    public function delete(){
        return view('animal.delete', [
            'owner' => Auth::id(),
            'animal' => \App\Models\User::find(Auth::id())->myAnimals,
        ]);
    }
    
    public function destroy(Request $request, \App\Models\Animal $animal){
        $name = $request->input('name');
        try{
            DB::delete('delete from animal where name = ?',[$name]);
            return redirect('/');
        }
        catch(exception $e){
            return redirect('/animal/create');
        }

    }

    public function word_opgepast(){
        $animals = DB::table('animal')->where('word_opgepast', 0)->get();
        return view('animal.index', ['animal' => $animals]);
    }
}