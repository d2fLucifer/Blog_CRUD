<?php
require('connect.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!function_exists('dd')) {
    function dd($value)
    {
        echo "<pre>", print_r($value, true), "</pre>";
    }
}

if (!function_exists('executeQuery')) {
    function executeQuery($sql, $data)
    {
        global $conn;
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            echo "Error in preparing statement: " . $conn->error;
            return false;
        }

        $values = array_values($data);
        $types = str_repeat('s', count($values));
        $stmt->bind_param($types, ...$values);
        $success = $stmt->execute();

        if (!$success) {
            echo "Error in executing statement: " . $stmt->error;
            return false;
        }

        return $stmt;
    }
}
// if (!function_exists('countRows')) {
// function countRows($table, $condition = [])
// {
//     global $pdo;

//     $sql = "SELECT COUNT(*) AS total FROM $table";
//     $params = [];

//     if (!empty($condition)) {
//         $sql .= " WHERE ";
//         $conditions = [];

//         foreach ($condition as $column => $value) {
//             $conditions[] = "$column = :$column";
//             $params[":$column"] = $value;
//         }

//         $sql .= implode(" AND ", $conditions);
//     }

//     $stmt = $pdo->prepare($sql);
//     $stmt->execute($params);
//     $result = $stmt->fetch(PDO::FETCH_ASSOC);

//     return $result['total'] ?? 0;
// }
// }
if (!function_exists('selectAll')) {
    function selectAll($table, $conditions = [])
    {
        global $conn;
        $sql = "SELECT * FROM $table"; // Use the input table parameter

        if (empty($conditions)) {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $posts = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $posts; // Return the fetched posts
        } else {
            $i = 0;
            $placeholders = [];
            $values = [];
            foreach ($conditions as $key => $value) {
                $placeholders[] = "$key = ?";
                $values[] = $value;
            }
            $sql .= " WHERE " . implode(" AND ", $placeholders);

            $stmt = executeQuery($sql, $conditions);
            $posts = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $posts; // Return the fetched posts
        }
    }
}

if (!function_exists('selectOne')) {
    function selectOne($table, $conditions)
    {
        global $conn;
        $sql = "SELECT * FROM $table"; // Use the input table parameter
        $placeholders = [];
        $values = [];

        foreach ($conditions as $key => $value) {
            $placeholders[] = "$key = ?";
            $values[] = $value;
        }

        $sql .= " WHERE " . implode(" AND ", $placeholders);
        $sql .= " LIMIT 1";

        $stmt = executeQuery($sql, $values);
        $result = $stmt->get_result();
        $post = $result->fetch_assoc();
        return $post;
    }
}

if (!function_exists('create')) {
    function create($table, $data)
    {
        global $conn;

        // Validate user_id exists in the users table
        if ($table === 'posts' && isset($data['user_id'])) {
            $user = selectOne('users', ['id' => $data['user_id']]);
            if (!$user) {
                echo "Error: Invalid user_id provided.";
                return false;
            }
        }

        $sql = "INSERT INTO $table SET";
        $placeholders = [];
        $values = [];
        foreach ($data as $key => $value) {
            $placeholders[] = "`$key` = ?";
            $values[] = $value;
        }   
        $sql .= " " . implode(", ", $placeholders);
        $stmt = executeQuery($sql, $values);
        if (!$stmt) {
            echo "Error in executing CREATE query: " . $conn->error;
            return false;
        }
        $id = $stmt->insert_id;
        return $id;
    }
}

if (!function_exists('update')) {
    function update($table, $id, $data)
    {
        global $conn;
        $columns = implode(' = ?, ', array_keys($data)) . ' = ?';
        $values = array_values($data);
        $values[] = $id;
        $sql = "UPDATE `$table` SET $columns WHERE id = ?";

        $stmt = executeQuery($sql, $values);

        if (!$stmt) {
            echo "Error in executing UPDATE query: " . $conn->error;
            return false;
        }

        return $stmt->affected_rows;
    }
}

if (!function_exists('deleteFromDatabase')) {
    function deleteFromDatabase($table, $id)
    {
        global $conn;

        // Delete posts associated with the user
        $postDeleteSql = "DELETE FROM posts WHERE user_id = ?";
        $stmt = executeQuery($postDeleteSql, ['user_id' => $id]);

        if (!$stmt) {
            echo "Error in executing DELETE query: " . $conn->error;
            return false;
        }

        // Delete the user
        $userDeleteSql = "DELETE FROM $table WHERE id = ?";
        $stmt = executeQuery($userDeleteSql, ['id' => $id]);

        if (!$stmt) {
            echo "Error in executing DELETE query: " . $conn->error;
            return false;
        }

        return true;
    }
}

if (!function_exists('getPublishedPost')) {
    function getPublishedPost()
    {
        global $conn;
        $sql = "SELECT posts.*, topics.name AS topic_name, users.username, users.image AS user_image 
                FROM posts 
                LEFT JOIN topics ON posts.topic_id = topics.id 
                LEFT JOIN users ON posts.user_id = users.id 
                WHERE posts.published = 1 
                ORDER BY posts.posted_time DESC";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $posts = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        return $posts;
    }
}


?>
