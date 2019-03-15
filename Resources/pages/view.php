<?php
// CHANGE THESE SETTINGS IF DIFFERENT ENVIROMENT!!!!
//SAMPLE $conn = new PDO("mysql:host={YOUR HOST}:{YOUR PORT};dbname={YOUR DBNAME}", "{YOUR DB USERNAME}", "{YOUR DB PASSSWORD}");
$conn = new PDO("mysql:host=localhost:3308;dbname=scanApp", "root", "root");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Barcode Reader App</title>
  </head>
  <body>

    <div id="cFormView" class="table">
            <!-- Table Buttons -->
            <div id="btnsView">
            <a href="../../index.html"><input type="button" class= "btn" name="edit" value="Back"></a>
            <a href="scan.php"><input type="submit" class= "btn" name="scan" value="Scan"></a>
            <input type="text" id="searchInput" onkeyup="myFunction()" placeholder="Search..."><br />
            </div>

            <!-- Table Data -->
        <div class="wrap">

        <!-- PHP creates table with parsed HTML and collects data from DB via query -->
        <?php
        echo "<div id=\"container\" ><table id=\"invTable\">
        <thead>
        <tr>
        <th>Entry</th>
        <th>User</th>
        <th>Date/Time</th>
        </tr></thead><tbody id='searchTable'>";

// CHANGE "entries" IF DIFFERENT TABLE NAME!!!!
        $sql = "SELECT * FROM entries";

        foreach ($conn->query($sql) as $row) {
                print "<tr>";
                print "<td>" . $row['id'];
                print "<td>" . $row['user'];
                print "<td>" . $row['date'];
                print "</tr>";
                }

        echo "</tbody></table></div>";
            ?>

        </div>
<script>
        // Searches Text Input
        var $rows = $('#searchTable tr');
        $('#searchInput').keyup(function() {
        var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $rows.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });

</script>

    </div>

    <!-- Footer -->
    <footer>Tecnologik Webapp</footer>
</body>
</html>
