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

    //
    public function __construct($base_url)
    {
        $this->api_url = $base_url;
    }
    public function fetchPopularRepositories($date = null, $per_page = null, $language = null)
    {
        $this->api_url = $this->api_url . "?q=";
        if ($date) {
            $this->api_url = $this->api_url . "created:>$date";}
        if ($language) {
            $this->api_url .= "+language:$language";
        }
        if ($per_page) {
            $this->api_url .= "+per_page:$per_page";
        }
        $this->api_url .= "&sort=stars&order=desc";
        $context = stream_context_create([
            "http" => [
                "header" => "User-Agent: myTask", // Replace with your app name or identifier
            ],
        ]);

        $response = file_get_contents($this->api_url, false, $context);
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
