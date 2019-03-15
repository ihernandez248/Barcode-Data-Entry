<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <title>Barcode Reader App</title>
    <script>
    window.onload = function() {
  document.getElementById("user").focus();
};
    </script>
  </head>
  <body>
    <!-- Main Menu Buttons -->
   <center>
       <div id="cFormL">
       <h2>Scan Mode:</h2>

        <div id="btns">
          <form action="scan.php" method="post">
            <label for="name">Click box below and scan ID:</label>

            <input onfocus="if(this.value == 'Scan Barcode') { this.value = ''; }"
                    onblur="if (this.value == '') { this.value = 'Scan Barcode'; }"
                   value= "Scan Barcode" type="text" class="input" name="user"  id="user">

        <div id="btnsView">
        <a href="../../index.html"><input type="button" class="btn" value="Back" name="submitButton"></a>
				<input type="submit" value="Submit" class="btn" id="submit" name="submitButton">
            </div>
      </form>
        </div>

       </div></center>
       <?php
               $isClicked = isset($_POST['submitButton']);

               if($isClicked){
               try{
                   // Pulls Form Data
                   $user = $_POST["user"];
                   $name = $_POST["name"];

                   // Establishes Connection
                   // CHANGE THESE SETTINGS IF DIFFERENT ENVIROMENT!!!!
                   //SAMPLE $conn = new PDO("mysql:host={YOUR HOST}:{YOUR PORT};dbname={YOUR DBNAME}", "{YOUR DB USERNAME}", "{YOUR DB PASSSWORD}");
                   $conn = new PDO("mysql:host=localhost:3308;dbname=scanApp", "root", "root");
                   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                   $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                   $dataReader == false;

                   if($dataReader == false){
                      // CHANGE "entries" IF DIFFERENT TABLE NAME!!!!
                      // SAMPLE $query = 'INSERT INTO {YOUR TABLE NAME}(user) VALUES(:user)';
                       $query = 'INSERT INTO entries(user) VALUES(:user)';
                       $statement = $conn->prepare($query);
                       $statement->bindValue(':user', $user);
                       $statement->execute();
                       }else{
                           echo "<script type='text/javascript'>alert('$message');</script>";
                   }
               }

                   // Final Connection Check
                   catch(PDOException $e){
                   echo $conn . "<br>ERROR:" . $e->getMessage();
                   echo 'Exception -> ';
                   var_dump($e->getMessage());
                   }
                 }

           ?>
    <!-- Footer -->
    <footer>Tecnologik Webapp</footer>
</body>

</html>
