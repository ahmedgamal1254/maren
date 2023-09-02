<?php
namespace App\Traits;

use Illuminate\Http\Request;

trait CheckRequest
{
    public function check_request($request,$route,array $params=[],$route_redirct,$params_redirect=[]){
        $referer = $request->server('HTTP_REFERER');

        if ($referer !== route($route,$params)){
            return redirect()->route($route_redirct,$params_redirect);
        }
    }
}

?>
