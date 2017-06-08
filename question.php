<?php include 'database.php'; ?>
<?php
    //Set question number_format
    $number = (int) $_GET['n'];


    /*
    * Get question
    */
    $query = "SELECT * FROM questions WHERE question_number = $number";
    //Get resourcebundle_count
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

    $question = $result->fetch_assoc();

    /*
    * Get choices
    */
    $query = "SELECT * FROM choices WHERE question_number = $number";
    //Get resourcebundle_count
    $choices = $mysqli->query($query) or die($mysqli->error.__LINE__);



?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP Quizzer</title>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
  </head>
  <body>
    <header>
      <div class="container">
        <h1>PHP Quizzer</h1>
      </div>

      <main>
        <div class="container">
            <div class="current">
              question 1 of 5
            </div>
            <p class="question">
                <?php echo $question['text']; ?>
            </p>
            <form class="" action="process.php" method="post">
                <ul class="choices">
                    <?php while($row = $choices->fetch_assoc()): ?>
                      <li><input type="radio" name="choice" value="<?php echo $row['id'];?>"> <?php echo $row['text']; ?></li>

                    <?php endwhile; ?>

                </ul>
                <input type="Submit" name="" value="Submit">
            </form>
        </div>
      </main>
    </header>
    <footer>
      <div class="container">
        Copyright &copy; 2017, PHP Quizzer
      </div>
    </footer>
  </body>
</html>
