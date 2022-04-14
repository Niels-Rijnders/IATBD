<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class UserController extends Controller
{

    public function index($role){
        $persons = \App\Models\User::all()->where('role', $role);
        return $persons;
    }

    public function ownerIndex(){
        return view('owner.index', ['owners' => $this->index('Eigenaar')]);
    }

    public function ownerShow($id){
        $owners = \App\Models\User::find($id);
        return view('owner.show', ['owners' => $owners]);
    }

    public function ownerAnimals($id){
        $animals = \App\Models\User::find($id)->myAnimals;
        return view('animal.ownerIndex', ['animals' => $animals]);
    }

    public function sitterIndex(){
        return view('sitter.index', ['sitters' => $this->index('Oppasser')]);
    }

    public function sitterShow($id){
        $sitters = \App\Models\User::find($id);
        $reviews = \App\Models\Review::all()->where('id', $id);
        return view('sitter.show', [
            'sitters' => $sitters,
            'reviews' => $reviews,
            ]);
    }

    // create application
    public function createApplication(){
        $animal = DB::table('animal')->where('word_opgepast', 0)->get();
        return view('sitter.create', ['animals' => $animal]);
    }

    public function storeApplication(Request $request, \App\Models\Animal $animal, \App\Models\User $user){
        $user = Auth::user();
        $petname = $request->input('namePet');
        // return $petname;
        try{
            DB::table('animal')
                    ->where('name', $petname)
                    ->update([
                        'oppasser'=> $user->id,
                        ]);
            return redirect('/');
        }catch(Exception $e){
            return redirect('/createsitter');
        }
    }
    // Owner accepts or refuses
    public function createAccept($id, \App\Models\Animal $animalMod, \App\Models\User $userMod){
        $animal = $animalMod::find($id);
        $oppasserId = $animal->oppasser;
        $oppasser = $userMod::find($oppasserId);
        // return $sitterId;
            if($oppasserId == NULL){
                $user = Auth::user()->id;
                return $this->ownerAnimals($user);
            }else{
                return view('owner.accept', [
                    'animal' => $animal,
                    'sitter' => $oppasser
                ]);
            }  
      
    }

    public function setSitterToNull($animal){
        DB::table('animal')
        ->where('name', $animal->name)
        ->update([
            'oppasser'=> NULL,
            ]);
        return ;
    }

    public function updateAccept(Request $request, \App\Models\Animal $animalMod, \App\Models\User $userMod){
        switch($request->input('action')){
            case 'accept':
                $id = intval(substr($_SERVER['REQUEST_URI'], -1));
                $animal = $animalMod::find($id);
                // return $animal;
                return $this->createReview($animal);
                break;
            case 'refuse':
                $uri = $_SERVER['REQUEST_URI'];
                $id = intval(substr($uri, -1));
                $animal = $animalMod::find($id);
                try{
                    $this->setSitterToNull($animal);
                    $user = Auth::user()->id;
                    return $this->ownerAnimals($user);
                }catch(Exception $e){
                    return redirect('/application/{{$animal->id}}');
                }      
                break;
        }        
    }

    // Reviews
    public function createReview($animal){
        $oppasser = \App\Models\User::find($animal->oppasser);
        $this->setSitterToNull($animal);
        return view('owner.review', ['oppasser'=>$oppasser]);
    }

    public function procesStoreReview(\App\Models\Review $review){
        try{
            $review->save();
            return '/';
        }catch(Exception $e){
            return 'owner.review';
        }
    }

    public function storeReview(Request $request, \App\Models\Review $review){
        $id = substr($_SERVER['REQUEST_URI'], -2);
        if($id[0] == "/"){
            $id = intval(substr($id, -1));
        }else{
            $id = intval($id);
        }
        $review->id = $id;
        if($request->input('rating') != NULL){
            $review->rating =  $request->input('rating');
            $review->review_text = $request->input('review_text');
            return redirect($this->procesStoreReview($review));            
        }
        return redirect('/');
    }
}