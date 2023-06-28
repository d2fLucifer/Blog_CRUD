<?php

function validateComments($commentData)
{
    $errors = [];

    // Validate the comment body
    if (empty($commentData['comment-body'])) {
        $errors[] = 'Comment body is required';
    }

    // Add more validation rules if needed

    return $errors;
}
?>
