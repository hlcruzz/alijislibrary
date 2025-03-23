<?php
include "../lib/connection.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];

    try {
        $stmt = $conn->prepare("SELECT feedbacks_id,feedbacks_reply_msg FROM feedbacks_reply WHERE feedbacks_id = :id;");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            echo json_encode($result);
        } else {
            echo 0;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
