  document.addEventListener("DOMContentLoaded", function() {
      // Use AJAX to fetch data from the PHP file
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "../myTask/api/fetchPopularRepositories.php", true);
      xhr.setRequestHeader("Content-Type", "application/json");

      xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
              var repositories = JSON.parse(xhr.responseText);
              var tableBody = document.querySelector("#repositoryTable tbody");

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
                                <td><a href="${repo.url}" target="_blank">Link</a></td>
                                <td>DATE(${repo.created_at}</td>
                            `;
                      tableBody.appendChild(row);
                  });
              }
          }
      };

      xhr.send();
  });