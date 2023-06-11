<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\TipoUController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\ActoController;
use App\Models\User;
use App\Models\Acto;
use App\Models\TipoUsuario;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// Ruta de la página principal
Route::get('/principal', function () {
    $usidTipoUsuarioer = null;
    $idTipoUsuario = null;
    if (Auth::check()) {
        $userId = Auth::id();
        $user = User::find($userId);
        $idTipoUsuario = $user->Id_tipo_usuario;
        $nombreUsuario = $user->Nombre;
    }    
    if ($idTipoUsuario) {
        $tipoUsuario = TipoUsuario::find($idTipoUsuario);
        $descripcionTipoUsuario = $tipoUsuario ? $tipoUsuario->Descripcion : null;
    } else {
        $descripcionTipoUsuario = null;
    }
    return view('principal', compact('idTipoUsuario', 'descripcionTipoUsuario', 'nombreUsuario'));
})->name('principal');


// Ruta de la página principal
Route::get('/', function () {
    $user = null;
    if (Auth::check()) {
        $id = Auth::id();   
        $user = User::find($id);
    }    
    
    return view('index', compact('user'));
});    


// Rutas del login
Route::get('/login', function () {
    return view('login');
});    

Route::post('/login', [AuthController::class, 'login'])->name('login');

// Ruta del logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');


// Rutas del signup
Route::post('/signup', [SignupController::class, 'register'])->name('register');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');    

// Ruta del perfil
// Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

// Ruta de la edición del perfil
Route::get('/editprofile', function () {
    $user = Auth::user();
    $id_persona = $user->id; // Obtén el ID de la persona asociado al usuario autenticado
    $idTipoUsuario = $user->Id_tipo_usuario;
    $nombreUsuario = $user->Nombre;
    

    return view('editprofile', compact('user', 'id_persona', 'idTipoUsuario', 'nombreUsuario'));
})->name('editprofile');

Route::post('/profile', [EditProfileController::class, 'update'])->name('profile.update');


Route::get('/actos', function () {
    $user = Auth::user();
    $id_persona = $user->id; // Obtén el ID de la persona asociado al usuario autenticado
    $idTipoUsuario = $user->Id_tipo_usuario;
    $nombreUsuario = $user->Nombre;
    $actos = Acto::all();
    return view('actos', compact('actos','id_persona', 'idTipoUsuario', 'nombreUsuario'));
})->name('actos');





