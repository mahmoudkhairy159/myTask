<!DOCTYPE html>
<html>
<head>
    <title>GitHub Repositories</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../myTask/css/myStyle.css" rel="stylesheet">
</head>
<body>

    <?php include '../myTask/includes/html/header.php' ?>

    <div class="main">
    <form id="filterForm">
        <label for="language">Language:</label>
        <input type="text" id="language" name="language">
        
        <label for="date">Date (YYYY-MM-DD):</label>
        <input type="text" id="date" name="date">
        
        <input type="submit" value="Filter">
    </form>
    <?php include '../myTask/includes/html/repositoriesTable.php' ?>
    </div>

    <?php include '../myTask/includes/html/footer.php' ?>
    

<script src="../myTask/js/fetchPopularRepositories.js"></script>
<script>
        document.addEventListener("DOMContentLoaded", function() {
            var form = document.getElementById("filterForm");
            var tableBody = document.querySelector("#repositoryTable tbody");
            
            function updateTable() {
                var language = document.getElementById("language").value;
                var date = document.getElementById("date").value;
                
                // Use AJAX to fetch data from the PHP file with filters
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "github_data.php?language=" + language + "&date=" + date, true);
                xhr.setRequestHeader("Content-Type", "application/json");
                
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var repositories = JSON.parse(xhr.responseText);
                        tableBody.innerHTML = "";
                        
                        if (repositories.error) {
                            tableBody.innerHTML = "<tr><td colspan='7'>" + repositories.error + "</td></tr>";
                        } else {
                            repositories.forEach(function(repo) {
                                var row = document.createElement("tr");
                                row.innerHTML = `
                                    <td>${repo.id}</td>
                                    <td>${repo.name}</td>
                                    <td>${repo.stargazers_count}</td>
                                    <td>${repo.description}</td>
                                    <td>${repo.language}</td>
                                    <td><a href="${repo.url}" target="_blank">${repo.url}</a></td>
                                    <td>${repo.created_at}</td>
                                `;
                                tableBody.appendChild(row);
                            });
                        }
                    }
                };
                
                xhr.send();
            }
            
            form.addEventListener("submit", function(event) {
                event.preventDefault();
                updateTable();
            });
        });
    </script>
</body>