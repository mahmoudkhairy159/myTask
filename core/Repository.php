<?php

class Repository
{
    public $api_url;
    //repository properties
    private $id;
    private $name;
    private $description;
    private $url;
    private $stargazers_count;
    private $language;
    private $created_at;

    public function __construct($base_url)
    {
        $this->api_url = $base_url;
    }
    public function fetchPopularRepositories($creation_date = null, $stars = null, $per_page = null, $language = null)
    {
        $query_params = [];
        if (!empty($language)) {
            $query_params[] = "language:$language";
        }
        if (!empty($creation_date)) {
            $query_params[] = "created:>=$creation_date";
        }
        if (!empty($stars)) {
            $query_params[] = "stars:>$stars";
        }
        $query = http_build_query([
            'q' => implode(' ', $query_params),
            'sort' => 'stars',
            'order' => 'desc',
            'per_page' => $per_page,
        ]);
        $context = stream_context_create([
            "http" => [
                "header" => "User-Agent: myTask", // Replace with your app name or identifier
            ],
        ]);
        $response = file_get_contents("$this->api_url?$query", false, $context);
        $data = json_decode($response, true);
        $repositories = $data['items'];
        return $repositories;
    }

    public function fetchOneRepository($repository_id)
    {

        $this->api_url = $this->api_url . '/' . $repository_id;
        $context = stream_context_create([
            "http" => [
                "header" => "User-Agent: myTask", // Replace with your app name or identifier
            ],
        ]);
        $response = file_get_contents($this->api_url, false, $context);
        $data = json_decode($response, true);
        if ($data) {
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->stargazers_count = $data['stargazers_count'];
            $this->description = $data['description'];
            $this->language = $data['language'];
            $this->url = $data['url'];
            $this->created_at = $data['created_at'];
        } else {
            echo "Failed to fetch data from GitHub API.";
        }
    }

    //properties getters
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getDescription()
    {
        return $this->description;

    }
    public function getStarsCount()
    {
        return $this->stargazers_count;

    }
    public function getUrl()
    {
        return $this->url;
    }
    public function getLanguage()
    {
        return $this->language;
    }
    public function getCreatedAt()
    {
        return $this->created_at;
    }
}
