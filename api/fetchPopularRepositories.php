<?php

include_once '../core/initialize.php';

$date = "2019-01-10";
$per_page = 10;
$language = "php"; // Change this to your desired programming language or remove it for no language filter.
$repository = new Repository(base_url);
$repositories = $repository->fetchPopularRepositories($date, $per_page, $language);
if ($repositories) {
    // Convert the data to JSON
    $response = json_encode($repositories);

    // Set the Content-Type header to JSON
    header('Content-Type: application/json');

    // Return the JSON response
    echo $response;
} else {
    echo json_encode(['error' => 'Failed to fetch data from GitHub API']);
}
// if ($repositories) {

//     echo "Top $limit Popular Repositories created after $date";

//     foreach ($repositories as $repo) {
//         echo "Repository_id: " . $repo['id'] . "<br>";
//         echo "Repository_name: " . $repo['name'] . "<br>";
//         echo "Stars: " . $repo['stargazers_count'] . "<br>";
//         echo "Description: " . $repo['description'] . "<br>";
//         echo "Language: " . $repo['language'] . "<br>";
//         echo "URL: " . $repo['url'] . "<br>";
//         echo "created_at: " . $repo['created_at'] . "<br>";
//         echo "<hr>";
//     }
// } else {
//     echo "Failed to fetch data from GitHub API.";
// }
