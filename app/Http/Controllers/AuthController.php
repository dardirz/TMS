<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')
                        ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {

        return view('auth.registration');

    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'type'=>'required'
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("/")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'password' => Hash::make($data['password']),
        'type'=>$data['type']
      ]);
    }

    public function dashboard()
    {

            return view('dashboard');


       
    }

    public function home(){

            return view('home');
        
        
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    public function showUsers(){
        $user = User::all();
        return view('admin.user.users',['user'=>$user]);
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin.user.edit',['user'=>$user]);
    }

    public function update(Request $request,$id){

        $validator=$request->validate([
            'phone' => 'required',
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if($validator){

            $user = User::findOrFail($id);
            $user->update($request->all());
            return redirect(route('user-show'))->with('sucess','updated');
        }else{
            return back()->with('fail','some error');
        }


    }

    public function destroy( $id)
    {
        //
        $user = User::findOrFail($id);
        $user->delete();
        return redirect(route('user-show'))->with('sucess', 'User is Deleted Successful!');
    }



}
