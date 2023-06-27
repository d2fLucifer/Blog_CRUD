<?php
include "path.php";
include_once ROOT_PATH . "/app/controllers/comments.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the required fields are submitted
    if (isset($_POST['post_id']) && isset($_POST['body']) && isset($_POST['user_id'])) {
        $post_id = $_POST['post_id'];
        $body = $_POST['body'];
        $user_id = $_POST['user_id'];

        // Create an array with the comment data
        $commentData = [
            'post_id' => $post_id,
            'body' => $body,
            'user_id' => $user_id,
            // Add any additional fields you have in your comments table
        ];

        // Insert the comment into the database
        $result = create('comments', $commentData);

        if ($result) {
            // Comment inserted successfully
            $response = [
                'status' => 'success',
                'message' => 'Comment added successfully.'
            ];
        } else {
            // Failed to insert comment
            $response = [
                'status' => 'error',
                'message' => 'Failed to add comment.'
            ];
        }
    } else {
        // Required fields are missing
        $response = [
            'status' => 'error',
            'message' => 'Required fields are missing.'
        ];
    }
} else {
    // Invalid request method
    $response = [
        'status' => 'error',
        'message' => 'Invalid request method.'
    ];
}

// Send the response as JSON
echo json_encode($response);
?>
