<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Teams List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f4f4f4;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        input[type="text"] {
            padding: 8px;
            width: 300px;
            margin: 10px 0;
        }
    </style>
    <script>
        // Search Functionality
        function searchTeams() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("teamsTable");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) {
                tr[i].style.display = "none";
                td = tr[i].getElementsByTagName("td");
                for (var j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                            break;
                        }
                    }
                }
            }
        }
    </script>
</head>
<body>

<h1>Football Teams List</h1>

<!-- Search Box -->
<input type="text" id="searchInput" onkeyup="searchTeams()" placeholder="Search for teams..">

<?php
// Connection details
$host = getenv('DB_HOST');
$dbname = getenv('DB_NAME');
$user = getenv('DB_USER');
$password = getenv('DB_PASSWORD');

$dsn = "pgsql:host=$host;dbname=$dbname";

try {
    // Connect to PostgreSQL database
    $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    // Fetch data from the football_teams table
    $stmt = $pdo->query("SELECT * FROM football_teams");
    $teams = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Start of table
    echo "<table id='teamsTable'>";
    echo "<tr><th>Team ID</th><th>Team Name</th><th>City</th><th>Country</th><th>Established Year</th><th>Stadium</th></tr>";

    // Display the teams in the table
    foreach ($teams as $team) {
        echo "<tr>
                <td>{$team['team_id']}</td>
                <td>{$team['team_name']}</td>
                <td>{$team['city']}</td>
                <td>{$team['country']}</td>
                <td>{$team['established_year']}</td>
                <td>{$team['stadium']}</td>
              </tr>";
    }

    echo "</table>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

</body>
</html>
