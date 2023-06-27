<?php
function validateComments($comments)
{
    $errors = array();
    if (empty($comments['post_id'])) {
        array_push($errors, 'Post ID is required');
    }
    if (empty($comments['user_id'])) {
        array_push($errors, 'User ID is required');
    }
    if (empty($comments['body'])) {
        array_push($errors, 'Comment body is required');
    }

    // You can add additional validation rules for the comments if needed
    
    return $errors;
}
?>
