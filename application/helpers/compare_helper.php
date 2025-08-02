<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('compare_base64'))
{    
    function compare_base64($que_base64,$ans_base64,$id,$type)
    {
        if($type=='Excel')
        {
            $url="http://localhost:9090/CompareService/compareExcel";
        }
        else
        {
            $url="http://localhost:9090/CompareService/CompareWord";
        }


        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url ,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_TIMEOUT => 500,
          CURLOPT_POSTFIELDS => "{\n\"base64Question\":\"$que_base64\",\n\"base64Answer\":\"$ans_base64\",\n\"id\":\"$id\"\n}",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: application/json"
          ),
        ));

        $result = curl_exec($curl);
        $response = json_decode($result);
        curl_close($curl);
        if($response) {
        	return $response;
        } 
        else 
        {            
            return FALSE;
        }
    }   
}