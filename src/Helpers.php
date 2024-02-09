<?php

function response($success, $data, $error){
    return [
        'success' => $success,
        'data' => $data,
        'error' => $error,
    ];
}