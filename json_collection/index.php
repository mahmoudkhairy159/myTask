{
	"info": {
		"_postman_id": "47a2ecd1-6964-4aed-98ba-0f92f7ca6970",
		"name": "New Collection",
		"schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json",
		"_exporter_id": "12184491"
	},
	"item": [
		{
			"name": "fetch popular repositories",
			"request": {
				"method": "GET",
				"header": [],
				"url": {
					"raw": "http://localhost/myTask/api/fetchPopularRepositories.php",
					"protocol": "http",
					"host": [
						"localhost"
					],
					"path": [
						"myTask",
						"api",
						"fetchPopularRepositories.php"
					]
				}
			},
			"response": []
		},
		{
			"name": "fetch one repository",
			"request": {
				"method": "GET",
				"header": []
			},
			"response": []
		}
	]
}