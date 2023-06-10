<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use App\Models\User;

    class UserController extends Controller {
        public function getAll()
        {
            $users = User::all();
            return view('users.index', compact('users'));
        }

        public function getById($id)
        {
            $user = User::find($id);
            return view('users.show', compact('user'));
        }

        public function insert(Request $request)
        {
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->save();

            return redirect()->route('users.index');
        }

        public function update(Request $request, $id)
        {
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->save();

            return redirect()->route('users.show', $id);
        }

        public function delete($id)
        {
            $user = User::find($id);
            $user->delete();

            return redirect()->route('users.index');
        }

        // public function index()
        // {
        //     $user = null;
        //     if (Auth::check()) {
        //         $id = Auth::id();
        //         $user = User::find($id);
        //     }
        //     return view('index', compact('user'));
        // }

    }
    
?>
