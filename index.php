<?php
    include "functions.php";

    $connection = new Connection;

    if ( isset( $_POST['submit'] ) ) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $age = $_POST['age'];
        $homeTown = $_POST['homeTown'];
        $job = $_POST['job'];

        $connection->insertData( $firstName, $lastName, $age, $homeTown, $job );
        //echo 'inserted';
    }

?>


<?php include "header.php"; ?>

  <div class="container">
      
      <form class="needs-validation" action="" method="POST" validate>
    
                <h2 class="display-4">
                    Ajax Form
                </h2>
    
    
    
            <div class="form-row">
                <div class="col-md-4 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" name="firstName" id="firstName" value="" required>
                <div class="valid-tooltip">
                    Looks good!
                </div>
                </div>
                <div class="col-md-5 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" value="" required>
                <div class="valid-tooltip">
                    Looks good!
                </div>
                </div>
            </div>


            <div class="form-row">


                <div class="col-md-3 mb-3">
                <label for="age">Age</label>
                <input type="number" class="form-control" id="age" name="age" required>
                <div class="invalid-tooltip">
                    Please provide a valid age.
                </div>
                </div>


                <div class="col-md-3 mb-3">
                <label for="homeTown">Home Town</label>
                <input type="text" class="form-control" id="homeTown" name="homeTown" required>
                <div class="invalid-tooltip">
                    Please provide a valid city.
                </div>
                </div>



            </div>

            <div class="form-row">
                <div class="col-md-3 mb-3">
                <label for="job">Job</label>
                <input type="text" class="form-control" id="job" name="job" required>
                <div class="invalid-tooltip">
                    Please provide a valid job.
                </div>
                </div>
            </div>


            <button class="btn btn-primary" name="submit" type="submit">Submit</button>

        </form>
        <br>
        <a href="result.php" target="_blank" class="btn btn-primary">View Data</a>


  </div>





<?php include "footer.php"; ?>