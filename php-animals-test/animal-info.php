<?php
  if (!isset($_POST['id'])) {
    echo "You need to specify a drinker. Please <a href='all-drinkers.php'>try again</a>.";
    die();
  }
  $id = $_POST['id'];
  // In production code, you might want to "cleanse" the $drinker string
  // to remove potential hacks before doing something with it (e.g.,
  // passing it to the DBMS).  That said, using prepared statements
  // (see below for details) can prevent SQL injection attack even if
  // $drinker contains potentially malicious character sequences.
?>

<html>
<head><title>Animal Information: </title></head>
<body>

<h1>Animal Information: </h1>
<?php
  try {
    // Including connection info (including database password) from outside
    // the public HTML directory means it is not exposed by the web server,
    // so it is safer than putting it directly in php code:
    $myPDO = new PDO('pgsql:host=localhost;dbname=animals');
  } catch (PDOException $e) {
    print "Error connecting to the database: " . $e->getMessage() . "<br/>";
    die();
  }
  try {
    // One could construct a parameterized query manually as follows,
    // but it is prone to SQL injection attack:
    // $st = $dbh->query("SELECT address FROM Drinker WHERE name='" . $drinker . "'");
    // A much safer method is to use prepared statements:
    $st = $myPDO->prepare("SELECT pet_owner_number FROM Pet_listing WHERE id=?");
    $st->execute(array($id));
    if ($st->rowCount() == 0) {
      die('There is no animal with this name and breed in the database.');
    } else if ($st->rowCount() > 1) {
      die('Something is wrong --- there are ' . $count . ' animals with the same id ' . $id . ' in the database.');
    }
    $myrow = $st->fetch();
    echo "Pet Owner Number: ", $myrow['pet_owner_number'];
    echo "<br/>\n";
    /**echo "Beer(s) liked: ";
    $st = $myPDO->prepare("SELECT beer FROM Likes WHERE drinker=?");
    $st->execute(array($drinker));
    $count = 0;
    foreach ($st as $myrow) {
      $count++;
      if ($count > 1) {
        echo(", ");
      }
      echo $myrow['beer'];
    }
    if ($count == 0) {
      echo "none";
    }
    echo "<br/>\n";
    echo "Bar(s) frequented: ";
    $st = $myPDO->prepare("SELECT bar, times_a_week FROM Frequents WHERE drinker=?");
    $st->execute(array($drinker));
    $count = 0;
    foreach ($st as $myrow) {
      $count++;
      if ($count > 1) {
        echo(", ");
      }
      echo $myrow['bar'], " (", $myrow['times_a_week'], " time(s) a week)";
    }
    if ($count == 0) {
      echo "none";
    }
    echo "<br/>\n";
  } catch (PDOException $e) {
    print "Database error: " . $e->getMessage() . "<br/>";
    die();
  }**/
?>
Go <a href='all-animals.php'>back</a>
<!-- or <a href='edit-drinker.php?drinker=<?= $id ?>'>edit</a> the information.-->
</body>
</html>
