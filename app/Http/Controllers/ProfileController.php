<?php
use Illuminate\Support\Facades\Auth;
namespace App\Http\Controllers;
use profile;
use update;

use App\Models\User;
use Illuminate\Http\Request;
use Auth ;
///use  App\Models\Profile;

class ProfileController extends Controller
{  
    public function __construct(){
        $this->middleware('auth');
   }
    public function index()
    {
        //$user1=App\Models\User::find(1)
        $user = Auth::user();
        $id = Auth::id();

  
        //$user = user::first(); 
        //$id = user::first(); 
   // if($user->profile==null){
     //   $profile=Profile::create([
       //     'address'=>'damaa',
         //   'gender'=>'male',
          //  'bio'=>'hello',
           // 'facebook' =>'http://www.facebook.com',
            //'user_id'=>$id 

        //]);

    //}   
    ///لحتى تتوفر المعلومات لازم ارسل الuser معو 
    return view('users.profile')->with('user', $user);   


    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function update(Request $request)
    {
        $this->validate($request , [
            'address'=>'required',
            'name'=>'required',
               'gender'=>'required',
               'bio'=>'required'            
        ]);

        // DB::beginTransaction();
        // $user=Auth::user();
        // $user->update([
        //     "name"=>$request
        // ]);
        // $user->profile->update([
        //     "addess"=>$request->address,
        //     "gender"=>$request->gender,
        //     "bio"=>$request->bio
        // ]);
         //DB::commit();

        $user->name=$request->name;
        //لانو عم منجيبهن من البروفايل 
        $user->profile->address=$request->address;
        $user->profile->gender=$request->gender;
        $user->profile->bio=$request->bio;
        $user->save();
        if($request->has('passwrod')){
            $user->password=bycrpt($request->password );
            $user->save();
        }
       //return "RECORDS ADDED";
       return redirect()->back();
   //   return back();
    }

    public function destroy($id)
    {
        //
    }
}
