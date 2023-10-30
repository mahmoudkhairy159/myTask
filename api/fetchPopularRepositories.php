<?php

include_once '../core/initialize.php';
$language = isset($_GET['language']) ? $_GET['language'] : null;
$creation_date = isset($_GET['creation_date']) ? $_GET['creation_date'] : null;
$stars = isset($_GET['stars']) ? (int) $_GET['stars'] : 1;
$per_page = isset($_GET['per_page']) ? $_GET['per_page'] : 10;
$repository = new Repository(base_url);
$repositories = $repository->fetchPopularRepositories($creation_date, $stars, $per_page, $language);
if ($repositories) {
    // Convert the data to JSON
    $response = json_encode($repositories);

    // Set the Content-Type header to JSON
    header('Content-Type: application/json');

    // Return the JSON response
    echo $response;
} else {
    echo json_encode(['error' => 'No Data Found']);
}
