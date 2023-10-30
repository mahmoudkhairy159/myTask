document.addEventListener("DOMContentLoaded", function() {
    var form = document.getElementById("filterForm");
    var tableBody = document.querySelector("#repositoryTable tbody");
    // Define a function to update the table
    function updateTable(language, creation_date, stars, per_page) {
        // Use AJAX to fetch data from the PHP file with filters
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "../myTask/api/fetchPopularRepositories.php?language=" + language + "&creation_date=" + creation_date + "&stars=" + stars + "&per_page=" + per_page, true);
        xhr.setRequestHeader("Content-Type", "application/json");

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var repositories = JSON.parse(xhr.responseText);
                tableBody.innerHTML = "";

                if (repositories.error) {
                    tableBody.innerHTML = "<tr><td colspan='7'>" + repositories.error + "</td></tr>";
                } else {
                    var count = 1;
                    repositories.forEach(function(repo) {
                        var row = document.createElement("tr");
                        row.innerHTML = `
                                  <td>${count++}</td>
                                  <td>${repo.id}</td>
                                  <td>${repo.name}</td>
                                  <td>${repo.stargazers_count}</td>
                                  <td>${repo.language}</td>
                                  <td><a href="${repo.url}" target="_blank">Link</a></td>
                                  <td>DATE(${repo.created_at}</td>
                              `;
                        tableBody.appendChild(row);
                    });
                }
            }
        };

        xhr.send();
    }

    // Call the updateTable function on page load
    updateTable("", "", "1", "10");

    form.addEventListener("submit", function(event) {
        event.preventDefault();
        var language = document.getElementById("language").value;
        var creation_date = document.getElementById("creation_date").value;
        var stars = document.getElementById("stars").value;
        var per_page = document.getElementById("per_page").value;
        updateTable(language, creation_date, stars, per_page);
    });
});