<?php

function errorResponse($errors){
    if(!is_array($errors)){
        $errors = array_column($errors->toArray(),0);
    }
    return response([
        'errors' => $errors
    ], 500);
}

