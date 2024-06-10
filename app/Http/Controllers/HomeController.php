<?php

namespace App\Http\Controllers;

use App\Helpers\LdapHelper;
use App\Models\Extranet\Calendario;
use App\Models\Extranet\Politica;
use App\Models\Rrhh\RT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use LdapRecord\Container;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function web()
    {
        $eventos = Calendario::all();
        $politicas = Politica::take(3)->get();
        return view('web.home', get_defined_vars());
    }

    // public function webb5()
    // {
    //     $eventos = Calendario::all();
    //     $politicas = Politica::take(3)->get();
    //     return view('web.webb5', get_defined_vars());
    // }

    public function empresa()
    {
        return view('web.empresa');
    }

    public function manual()
    {
        return view('web.manual.manual', get_defined_vars());
    }
    public function politicas()
    {
        $politicas = Politica::paginate(6);
        return view('web.politicas.lista', get_defined_vars());
    }
    public function politica($id)
    {
        $politica = Politica::find($id);
        return view('web.politicas.politica', get_defined_vars());
    }
    function aplicaciones() {
        return view('web.aplicaciones', get_defined_vars());
    }
    public function sesionWindows()
    {
        $usuarioEncontrado = true;
        if (!session()->has('username')) {

            // $userEmail =getenv("USERNAME")."@".strtolower(getenv("USERDNSDOMAIN"));
            $userEmail =getenv("USERNAME");
            // return $userEmail;exit;
            $usuarioEncontrado = LdapHelper::sessionIntranet($userEmail);
            // return $usuarioEncontrado;exit;
            return response()->json(["success"=>getenv()],200);
        }

        return response()->json(["success"=>getenv()],200);
    }

    public function estatico()
    {
        $calendario = Calendario::all();
        $eventosCalendario = array();
        foreach ($calendario as $key => $value) {
            array_push($eventosCalendario,array(
                "id"    => $value->id,
                "title" => $value->titulo,
                "start" => $value->fecha_inicio."T".$value->hora_inicio,
                "end"   => $value->fecha_final."T".$value->hora_final,
                "color" => $value->id,
            ));
        }
        return response()->json($eventosCalendario,200);
    }
    // -----
    // public function conectarUsairo($email, $password)
    // {
    //     $connection = Container::getConnection('default');

    //     $connection = Container::getDefaultConnection();

    //     if ($connection->auth()->attempt('CN=asistente.contable.03,OU=Of_Usuarios,OU=okcomputer,DC=grouptech,DC=LOCAL', '4n4r383c41996@')) {
    //         return ["success"=>true];exit;
    //     }
    //     // return LdapHelper::conectarLdap($request->username,$request->password);exit;
    //     $array = explode('@',$email);
    //     $usuario = $array[0];
    //     $dominio = explode('.',$array[1])[0];
    //     $dominio = ($dominio==='smartvalue'?'SMARTVALUE_SOLUTION':strtoupper($dominio));

    //     $usuarioEncontrado = LdapHelper::listarLdap("Ana Rebeca Loayza Puma",$password,$dominio);
    //     print "<pre>";
    //     print_r ($usuarioEncontrado);
    //     print "</pre>";exit;

    //     // print_r ($usuarioEncontrado[0]["userprincipalname"]);exit;
    //     // return $usuarioEncontrado;exit;
    //     return response()->json($usuarioEncontrado,200);


    //     // return response()->json([$email,$password,],200);
    // }
    function calendario() {
        $calendario = Calendario::all();
        $data=array();
        foreach ($calendario as $key => $value) {
            $type = $this->eventosCalendario($value->tipo_evento_id);
            array_push($data,array(
                "id"=>$value->id,
                "name"=>$value->titulo,
                // "badge"=>$value->id,
                "date"=>[date("m/d/Y", strtotime($value->fecha_inicio)), date("m/d/Y", strtotime($value->fecha_final)) ],
                "description"=>$value->descripcion,
                "type"=>$type,
                // "everyYear"=> !0
            ));
        }

        return response()->json($data,200);
    }

    function eventosCalendario($id) {
        $type = '';
        switch ($id) {
            case 1:
                $type = 'birthday';
            break;
            case 2:
                $type = 'holiday';
            break;

            default:
                $type = 'event';
            break;
        }
        return $type;
    }



}
