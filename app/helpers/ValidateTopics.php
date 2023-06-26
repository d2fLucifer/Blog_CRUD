<?php

function validateTopic($user)
{
    
    $errors = array();
    if(!empty($topic['name']))
    {
        array_push($errors,'name is required');
    }
    
    $existingTopic =selectOne('topics',['name'=>$user['name']]);
    if(isset($existingTopic))
    {
        array_push($errors,'Name already exits');
    }
    return $errors;
}
// function validateLogin($user)
// {
    
//     $errors = array();
//     if(empty($user['username']))
//     {
//         array_push($errors,'Username is required');
//     }
    
//     if(empty($user['password']))
//     {
//         array_push($errors,'password is required');
//     }
 
//     return $errors;
// }