<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
  </head>
  <body>
     <nav class="navbar navbar-expand-lg bg-body-tertiary bg-info">
  <div class="container">
    <a class="navbar-brand" href="#">Ostad</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Student</a>
        </li>
       
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    <div class="container">
      <div class="card">
       

        <!-- Form submits to the same page by default -->
        <form method="post">
          <h3>Student Name: <span><input type="text" name="studentName" placeholder="" required></span></h3>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">sl</th>
                <th scope="col">Subject</th>
                <th scope="col">Obtain Marks</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Javascript</td>
                <td><input type="text" name="marks[]" required /></td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>PHP</td>
                <td><input type="text" name="marks[]" required /></td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Laravel</td>
                <td><input type="text" name="marks[]" required /></td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>Git</td>
                <td><input type="text" name="marks[]" required /></td>
              </tr>
              <tr>
                <th scope="row">5</th>
                <td>MySql DB</td>
                <td><input type="text" name="marks[]" required /></td>
              </tr>
            </tbody>
          </table>

          <button type="submit" name="submit" class="btn btn-primary">Create Result</button>
        </form>
      </div>

      
     
    </div>
    <!-- Result Section (out of the form) -->
    <div class="container">
      <div class="card">
         <?php
      if (isset($_POST['submit'])) {

            $marks = $_POST['marks'];
            $studentName = $_POST['studentName'];
            $subjects = ['Javascript', 'PHP', 'Laravel', 'Git', 'MySql DB'];
            $hasInvalidMarks = false;

             // Validate range
            foreach ($marks as $mark) {
              if ($mark < 0 || $mark > 100) {
                $hasInvalidMarks = true;
                break;
              }
            }
                   // Display an error message if there are invalid marks
            if ($hasInvalidMarks) {
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              
                    <strong>Hey!</strong> Mark range is invalid!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }else{
                  function CreateResult($marks,$studentName, $subjects) {
          if($marks > 100){
            echo "Invalid Mark Input";
          }elseif($marks < 0){
               echo "Invalid Mark Input";
          }
        
          $subjects = ['Javascript', 'PHP', 'Laravel', 'Git', 'MySql DB'];
          $totalMarks = array_sum($marks);
          $average = $totalMarks / count($marks);

          //Result Status
          $resultStatus = 'Passed';
            foreach($marks as $mark) {
              if ($mark < 33) {
                $resultStatus = "Failed";
                break;
              }
            }
          
    

          echo "<h3 class='mt-4 '>Name Of Student: {$studentName}</h3>";
          echo "<h3 class='mt-4'>Result:<span class=''>{$resultStatus}</span></h3>";
          echo "<h3 class='mt-4'>Subject Wise Marks/Grade</h3>";
          echo "<table class='table table-bordered mt-3'>";
          echo "<thead><tr><th scope='col'>Subject</th><th scope='col'>Marks</th><th scope='col'>Grade</th></tr></thead>";
          echo "<tbody>";

          // Display individual subjects and marks
          foreach ($marks as $index => $mark) {
            echo "<tr>";
              echo "<td>{$subjects[$index]}</td>";
              echo "<td>{$mark}</td>";
              echo "<td>";
                      switch (true) {
                        case ($mark >= 80):
                            echo "A+";
                            break;
                        case ($mark >= 70):
                            echo "A";
                            break;
                        case ($mark >= 60):
                            echo "A-";
                            break;
                        case ($mark >= 50):
                            echo "B";
                            break;
                        case ($mark >= 40):
                            echo "C";
                            break;
                        case ($mark >= 33):
                            echo "D";
                            break;
                        default:
                            echo "F";
                            break;
                      }
                    
              echo "</td>";
                        
            echo "</tr>";
          }

          // Display total and average
          echo "<tr><td><strong>Total Marks</strong></td><td><strong>{$totalMarks}</strong></td></tr>";
          echo "<tr>";

              echo "<td><strong>Average Marks</strong></td>";
              echo " <td><strong>{$average}</strong></td>";
              echo " <td>";
                       switch (true) {
                        case ($average >= 80):
                            echo "A+";
                            break;
                        case ($average >= 70):
                            echo "A";
                            break;
                        case ($average >= 60):
                            echo "A-";
                            break;
                        case ($average >= 50):
                            echo "B";
                            break;
                        case ($mark >= 40):
                            echo "C";
                            break;
                        case ($average >= 33):
                            echo "D";
                            break;
                        default:
                            echo "F";
                            break;
                      }
                    
              echo "</td>";
          
          echo "</tr>";
          
          echo "</tbody>";
          echo "</table>";
        }

    
        CreateResult($marks,$studentName,$subjects);
            } 
      
      }
      ?>
      </div>
    </div>
    <div class="container">
      <div class="footer">
          <p>&copy; <?php echo date("Y")?> All Rights Reserved.</p>
      </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
