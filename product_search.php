<?php
    require_once "db.php";

    $result = [];

    if (isset($_GET['term']) && $_GET['term']) {
        $search = $_GET['term'];

        $sql = "SELECT * FROM `product` 
        where `name` LIKE '%".$search."%'";
        
        foreach ($conn->query($sql) as $row) {
            $result[] = [
                'id' => $row['id'],
                'value' => $row['name']
            ];
        }
    }

    // $result = [
    //     0 => [
    //         "id" => 3,
    //         "value" => "Turnik",
    //     ],
    //     1 => [
    //         "id" => 12,
    //         "value" => "Tennis koptok",
    //     ],
    // ];

    echo json_encode($result);
?>