<?php

namespace App\Models;
class Api
{

    public static function responseApi($error, $code, $message, $content):array{
        $response =[];
        if($error) {
            $response['success'] = false;
            $response['code'] = $code;
            $response['message'] = $message;
        }else{
                $response['success'] = true;
                $response['code'] = $code;
                $content == null?  $response['message']= $message: $response['data'] = $content;
            }
        return $response;
        }




}
