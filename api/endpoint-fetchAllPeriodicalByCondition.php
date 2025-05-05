<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $title = '%' . $_GET['title'] . '%';
    $titleQuery = $_GET['title'] == '' ? '' : '(periodicals.periodicalsTitle LIKE :title OR periodicals.periodicalsDesc LIKE :title)';

    $type = '%' . $_GET['type'] . '%';
    $typeQuery = $_GET['type'] == '' ? '' : 'periodicals.periodicalsType LIKE :type';

    $category = '%' . $_GET['category'] . '%';
    $categoryQuery = $_GET['category'] == '' ? '' : 'periodicals.periodicalsCategory LIKE :category';

    $conditions = [];

    // Collect only non-empty queries
    if ($titleQuery != '') {
        $conditions[] = $titleQuery;
    }
    if ($typeQuery != '') {
        $conditions[] = $typeQuery;
    }
    if ($categoryQuery != '') {
        $conditions[] = $categoryQuery;
    }

    // Join them with AND
    $checkInputs = '';
    if (!empty($conditions)) {
        $checkInputs = '(' . implode(' AND ', $conditions) . ') AND ';
    }

    $sortByQuery = ($_GET['sortBy'] == 'ASC') ? 'ASC' : 'DESC';

    try {
        $query = "SELECT
        periodicals.id as periodicals_id,
        periodicals.periodicalsTitle,
        periodicals.periodicalsType,
        periodicals.periodicalsCategory,
        periodicals.periodicalsAuthor,
        periodicals.periodicalsDesc,
        GROUP_CONCAT(periodical_images.id SEPARATOR ',') AS img_id,
        GROUP_CONCAT(periodical_images.image_url SEPARATOR '\n') AS images
        FROM
        periodicals
        INNER JOIN periodical_images ON periodicals.id = periodical_images.periodical_id
        WHERE
        $checkInputs
        periodicals.status = 1
        GROUP BY 
        periodicals_id
        ORDER BY 
        periodicals_id
        $sortByQuery
        ;";

        $stmt = $conn->prepare($query);

        if (!empty($_GET['title'])) {
            $stmt->bindParam(":title", $title);
        }
        if (!empty($_GET['type'])) {
            $stmt->bindParam(":type", $type);
        }
        if (!empty($_GET['category'])) {
            $stmt->bindParam(":category", $category);
        }

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($result);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}