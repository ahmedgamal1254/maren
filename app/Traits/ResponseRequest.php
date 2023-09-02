<?php
namespace App\Traits;

use Illuminate\Http\Request;

trait ResponseRequest
{
    public function make_response($data,$status){
        return response([
            "success" => $status == 200 ? true:false,
            "status"=>$status,
            "data" => $data,
        ]);
    }
}

?>
