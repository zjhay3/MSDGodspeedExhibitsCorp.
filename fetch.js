document.addEventListener("DOMContentLoaded", function() {
    fetch("php/fetch.php")
    .then(response => response.json())
    .then(data => {
        let table = document.getElementById("messageTable");
        table.innerHTML = data.map(row => `
            <tr>
                <td>${row.name}</td>
                <td>${row.email}</td>
                <td>${row.department}</td>
                <td>${row.message}</td>
                <td>${row.sent_at}</td>
            </tr>
        `).join("");
    })
    .catch(error => console.error("Error fetching data:", error));
});
