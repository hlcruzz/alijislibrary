<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    try {
        $query = "SELECT
        periodicals.id as pk_id,
        GROUP_CONCAT(periodical_images.id SEPARATOR ',') AS images_id,
        periodicals.periodicalsTitle,
        periodicals.periodicalsType,
        periodicals.periodicalsCategory,
        periodicals.periodicalsAuthor,
        periodicals.periodicalsDesc,
        GROUP_CONCAT(periodical_images.image_url SEPARATOR '\n') AS images,
        DATE_FORMAT(periodicals.periodicalsDate, '%W, %M %d, %Y %h:%i:%s %p') AS periodicalsDate
        FROM periodicals
        INNER JOIN 
        periodical_images 
        ON 
        periodicals.id = periodical_images.periodical_id
        WHERE 
        periodicals.status = 1
        AND 
        periodical_images.status = 1
        GROUP BY pk_id
        ;";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($result);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}