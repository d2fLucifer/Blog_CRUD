<?php
include "path.php";
include_once ROOT_PATH . "/app/controllers/comments.php";

if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];

    // Fetch comments for the specified post ID
    $comments = selectAll('comments', ['post_id' => $post_id]);

    if ($comments) {
        foreach ($comments as $comment) {
            // Get the user details for the comment
            $user = selectOne('users', ['id' => $comment['user_id']]);

            // Output the comment details
            echo '<div class="comment">';
            echo '<h4>' . $user['username'] . '</h4>';
            echo '<p>' . $comment['body'] . '</p>';
            echo '</div>';
        }
    } else {
        // No comments found
        echo '<p>No comments yet.</p>';
    }
} else {
    // Invalid post ID
    echo '<p>Invalid post ID.</p>';
}
?>
