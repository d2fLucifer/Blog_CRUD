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
function create($table, $data)
{
    global $conn;
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
        echo "Error in executing INSERT query: " . $conn->error;
        return false;
    }

    $id = $stmt->insert_id;
    return $id;
}


function update($table, $id, $data)
{
    global $conn;
    $sql = "UPDATE $table SET";
    $placeholders = [];
    $values = [];

    foreach ($data as $key => $value) {
        $placeholders[] = "$key = ?";
        $values[] = $value;
    }

    $sql .= " " . implode(", ", $placeholders);
    $sql .= " WHERE id = ?";
    $values[] = $id;
    
    $stmt = executeQuery($sql, $values);
    return $stmt->affected_rows;
}
function delete($table, $id)
{
    global $conn;
    $sql = "DELETE FROM $table WHERE id = ?";
    
    $stmt = executeQuery($sql, ['id'=> $id] );
    return $stmt->affected_rows;
}



$id = delete('users', 9);
dd($id);
