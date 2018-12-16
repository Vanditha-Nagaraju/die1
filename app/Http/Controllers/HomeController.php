<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    //public function index()
    //{
    //$user = Auth::user();
    //$question = $user->questions()->paginate(6);
    //return view('home')->with('questions', $question);
    //}
    public function index()
    {
        $user = Auth::user();
        //$question = $user->questions()->paginate(6);
        $users = User::get();
        return view('users', ['users' => User::where('id', '!=', Auth::id())->get()]);

    }

    //public function index1()
    //{
        //return view('Follow', [
            //'users' => User::where('id', '!=', Auth::id())->get()
        //]);
    //}
    /**
     * Show the application of itsolutionstuff.com.
     *
     * @return \Illuminate\Http\Response
     */
    public function user($id)
    {
        $user = User::find($id);
        return view('usersView', compact('user'));
    }
    /**
     * Show the application of itsolutionstuff.com.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxRequest(Request $request){
        $user = User::find($request->user_id);
        $response = auth()->user()->toggleFollow($user);
        return response()->json(['success'=>$response]);
    }
}