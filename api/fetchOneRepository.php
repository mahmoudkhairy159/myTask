<?php

include_once '../core/initialize.php';

$base_url = 'https://api.github.com/repositories';
$repository_id = isset($_GET['repository_id']) ? $_GET['repository_id'] : '170355508';
$repository = new Repository($base_url);
$repository->fetchOneRepository($repository_id);

$repository_item = array(
    'id' => $repository->getId(),
    'name' => $repository->getName(),
    'stars' => $repository->getStarsCount(),
    'description' => $repository->getDescription(),
    'language' => $repository->getLanguage(),
    'url' => $repository->getUrl(),
    'created_at' => $repository->getCreatedAt(),
);
echo "Repository_id: " . $repository_item['id'] . "<br>";
echo "Repository_name: " . $repository_item['name'] . "<br>";
echo "Stars: " . $repository_item['stars'] . "<br>";
echo "Description: " . $repository_item['description'] . "<br>";
echo "Language: " . $repository_item['language'] . "<br>";
echo "URL: " . $repository_item['url'] . "<br>";
echo "created_at: " . $repository_item['created_at'] . "<br>";
echo "<hr>";
