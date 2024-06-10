<?php
namespace App\Helpers;

use App\Models\Configuracion\Usuario;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use LdapRecord\Container;

class LdapHelper
{

    public static function conectarLdap($mail_from, $password_from, $dominio_from)
    {

        try {
            $connection = Container::getDefaultConnection();
            $connection =  $connection->auth()->attempt('CN='.$mail_from.',OU=Of_Usuarios,OU='.$dominio_from.',DC=grouptech,DC=LOCAL', $password_from);

            if ($connection) {

                $ldap_dn = "CN=".$mail_from.",OU=Of_Usuarios,OU=".$dominio_from.",DC=grouptech,DC=LOCAL";
                $ldap_password = $password_from;

                $ldap_con = ldap_connect("192.168.20.3",389);
                ldap_set_option($ldap_con, LDAP_OPT_REFERRALS, 0);
                ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);

                if(@ldap_bind($ldap_con, $ldap_dn, $ldap_password)) {

                    $filter = "(cn=".$mail_from.")";
                    $result = ldap_search($ldap_con,"DC=grouptech,DC=LOCAL",$filter) or exit(false);
                    $entries = ldap_get_entries($ldap_con, $result);

                    // return $entries[0]["cn"][0];exit;
                    $usuario=array(
                        "usuario"=>$entries[0]["cn"][0],
                        "email"=>$entries[0]["userprincipalname"][0]
                    );
                    // return $entries[0]["userprincipalname"][0];exit;
                    $usurio = Usuario::firstOrNew(['email' => $entries[0]["userprincipalname"][0]]);
                    // $usurio->nombres    = $entries[0]["cn"][0];
                    $usurio->nombre_corto_intranet    = $entries[0]["cn"][0];
                    $usurio->email      = $entries[0]["userprincipalname"][0];
                    $usurio->password_intranet   = Hash::make($password_from);
                    $usurio->domain     = explode('@',$entries[0]["userprincipalname"][0])[1];
                    $usurio->save();
                    // $request->session()->put('ldap',$entries[0]);
                    session()->put('username',$usurio);
                    return session()->all();exit;
                    return true;

                } else {
                    // return response()->json(["success"=>false],200);
                    return false;
                }




            }else{
                return false;
            }



        } catch (\Throwable $th) {
            return false;
        }


    }
    public static function sessionIntranet($userName)
    {
        // return $userName;exit;
        // try {
            $ldap_dn = "CN=test004,OU=Of_Usuarios,OU=SMARTVALUE_SOLUTION,DC=grouptech,DC=LOCAL";
            $ldap_password = 'Inicio23#';

            $ldap_con = ldap_connect("192.168.20.3",389);

            // return $ldap_con;exit;

            // ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
            ldap_set_option($ldap_con, LDAP_OPT_REFERRALS, 0);
            ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);

            if(@ldap_bind($ldap_con, $ldap_dn, $ldap_password)) {

                $filter = "(cn=".$userName.")";
                $result = ldap_search($ldap_con,"DC=grouptech,DC=LOCAL",$filter) or exit(false);
                $entries = ldap_get_entries($ldap_con, $result);

                if ($entries['count']===1) {
                    $usuario=array(
                        "usuario"=>$entries[0]["cn"][0],
                        "email"=>$entries[0]["userprincipalname"][0]
                    );

                    // return $entries[0]["userprincipalname"][0];exit;
                    $usurio = Usuario::firstOrNew(['email' => $entries[0]["userprincipalname"][0]]);
                    // $usurio->nombres    = $entries[0]["cn"][0];
                    $usurio->nombre_corto_intranet   = $entries[0]["cn"][0];
                    $usurio->email          = $entries[0]["userprincipalname"][0];
                    $usurio->estado         = 1;
                    $usurio->domain         = explode('@',$entries[0]["userprincipalname"][0])[1];

                    $usurio->save();

                    session()->put('username',$usuario);
                    // return session('username');exit;
                    return true;

                }else{
                    return false;
                }

            } else {
                // return response()->json(["success"=>false],200);
                return false;
            }

        // } catch (\Throwable $th) {
        //     return false;
        // }

    }
    public static function listarLdap($mailLdap, $passwordLdap, $dominio)
    {
        $ldap_dn = "CN=test004,OU=Of_Usuarios,OU=".$dominio.",DC=grouptech,DC=LOCAL";
        $ldap_password = 'Inicio23#';

        $ldap_con = ldap_connect("192.168.20.3",389);

        // return $ldap_con;exit;

        // ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ldap_con, LDAP_OPT_REFERRALS, 0);
        ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);

        if(@ldap_bind($ldap_con, $ldap_dn, $ldap_password)) {

            $filter = "(cn=".$mailLdap.")";
            $result = ldap_search($ldap_con,"DC=grouptech,DC=LOCAL",$filter) or exit(false);
            $entries = ldap_get_entries($ldap_con, $result);

            return $entries;

        } else {
            // return response()->json(["success"=>false],200);
            return false;
        }
    }
    public static function buscarUsuarioLdap($mailLdap, $domainLdap)
    {
        try {
            // $ldap_dn = "CN=test004,OU=Of_Usuarios,OU=okcomputer,DC=grouptech,DC=LOCAL";
            $ldap_dn = "CN=test004,OU=Of_Usuarios,OU=SMARTVALUE_SOLUTION,DC=grouptech,DC=LOCAL";
            $ldap_password = "Inicio23#";

            $ldap_con = ldap_connect("192.168.20.3",389);
            ldap_set_option($ldap_con, LDAP_OPT_REFERRALS, 0);
            ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
            $justthese = array("ou");
            $filter = "(userprincipalname=".$mailLdap.")";

            if(@ldap_bind($ldap_con, $ldap_dn, $ldap_password)) {
                $sr = ldap_search(
                    $ldap_con,
                    "DC=grouptech,DC=LOCAL",
                    $filter
                );
                $usurio = ldap_get_entries($ldap_con, $sr);
                // return json_decode(print_r($usurio[0])) ;exit;
                if ($usurio['count']>=1) {
                    $data = array("success"=>"encontrado","data"=>$usurio);
                    return $data;
                }else{
                    $data = array("success"=>"no encontrado","data"=>[]);
                    return $data;
                }
            }
        } catch (Exception $ex) {
            $data = array("success"=>"no encontrado","data"=>[]);
            return $data;
        }

    }
}
