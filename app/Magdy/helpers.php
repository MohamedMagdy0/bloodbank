<?php
// namespace App\magdy\myclasses;


function responseJson($status,$message,$data=null){

    $response = [
        'status' => $status ,
        'message' => $message ,
        'data' => $data ,
    ] ;
    return response()->json($response);
}


// function smsMisr($to,$message){

//    $url = "https://smsmisr.com/api/wepapi/?" ;
//    $push_payload = array(
//     'username' => "*****" ,
//     'password' => "*****" ,
//     'language' => "2" ,
//     'sender' => "bloodbank" ,
//     'mobile' => "2" , $to ,
//     'message' =>  $message ,
//    );

//    $rest = curl_init();
//    curl_setopt($rest,CURLOPT_URL,$url.http_build_query($push_payload));
//    curl_setopt($rest,CURLOPT_POST,1);

//    curl_setopt($rest,CURLOPT_POSTFIELDS,$push_payload);
//    curl_setopt($rest,CURLOPT_SSL_VERIFYPEER,TRUE); // disable ssl never do it online

//    curl_setopt($rest,CURLOPT_HTTPHEADER,
//     array(
//         "Content-Type" => "application/x-www-form-urlencoded"
//     ));

//     curl_setopt($rest, CURLOPT_RETURNTRANSFER,1);  // BY  magdy to stop outputting result
//     $response = curl_exec($rest) ;
//     return $response ;


// }
