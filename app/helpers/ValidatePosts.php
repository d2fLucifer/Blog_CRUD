<?php
function validatePosts($posts)
{
    $errors = array();
    if (empty($posts['title'])) {
        array_push($errors, 'Title is required');
    }
    if (empty($posts['slug'])) {
        array_push($errors, 'Slug is required');
    }
    if (empty($posts['topic_id'])) { // Update the field name here
        array_push($errors, 'Topic is required');
    }
    if (empty($posts['body'])) {
        array_push($errors, 'Body is required');
    }
    
    $existingPosts = selectOne('posts', ['title' => $posts['title']]);
    if ($existingPosts) {
        array_push($errors, 'Post with title already exists');
    }
    return $errors;
}

?>
