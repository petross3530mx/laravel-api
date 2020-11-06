<?php
namespace App\Services;

use Response;

class Formatter
{
  /*
  Function to get predefined formatted request
  */
  public static function getResponse($data, $pagination = false, $errors = false, $count=0 , $status = 200 ){
    $response = [
      'success' => $data ? true : false,
      'data' => $data ? $data : null,
    ];

    if($pagination){
      $pagination->per_page = sizeof($data) ?? 0;
      $response['pagination'] = (object)[
        'total' => sizeof($data) ?? 0,
        'count' => $count ?? 0,
        'perPage' => $pagination->limit,
        'currentPage' =>$pagination->page,
        'totalPages' =>  intval(ceil($count/$pagination->limit))
      ];
    }
    
    if($errors){
      $response['errors'] = $errors;
    }

    $status_code = $data ? $status : '404';

    return Response::json($response, $status_code);
  }

  /*
  Function to get paginations params 
  */
  public static function formatEloquent($default_limit, $request){
    $limit = intval($request->limit) ? intval($request->limit) : $default_limit;

    $page = intval($request->page) ? intval($request->page) : 1;

    $skip = ($page-1) * $limit;

    return (object)compact('limit', 'skip', 'page');  
  }

}
