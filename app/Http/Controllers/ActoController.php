<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use App\Models\Acto;

    class ActoController extends Controller {
        public function getAll()
        {
            $actos = Acto::all();
            return view('actos.index', compact('actos'));
        }

        public function getById($id)
        {
            $acto = Acto::find($id);
            return view('actos.show', compact('acto'));
        }

        public function insert(Request $request)
        {
            $acto = new Acto();
            // TODO
            $acto->Fecha = $request->input('Fecha');
            $acto->Hora = $request->input('Hora');
            $acto->Titulo = $request->input('Titulo');
            $acto->Descripcion_corta = $request->input('Descripcion_corta');
            $acto->Descripcion_larga = $request->input('Descripcion_larga');
            $acto->Num_asistentes = $request->input('Num_asistentes');
            $acto->Id_tipo_acto = $request->input('Id_tipo_acto');
            $acto->save();

            return redirect()->route('actos.index');
        }

        public function update(Request $request, $id)
        {
            $acto = Acto::find($id);
            // TODO
            $acto->name = $request->input('name');
            $acto->email = $request->input('email');
            $acto->password = bcrypt($request->input('password'));
            $acto->save();

            return redirect()->route('actos.show', $id);
        }

        public function delete($id)
        {
            $acto = Acto::find($id);
            $acto->delete();

            return redirect()->route('actos.index');
        }

        // public function index()
        // {
        //     $user = null;
        //     if (Auth::check()) {
        //         $id = Auth::id();
        //         $user = Acto::find($id);
        //     }
        //     return view('index', compact('user'));
        // }

    }
    
?>
