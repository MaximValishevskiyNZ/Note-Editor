<?php

$connection = require_once('../classes/connection.php');
$db = $connection->getNotes();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   <title>Note editor</title>
</head>
<body>
<div class="container mt-5">
<?php foreach($db as $note) { 
   if ($note['id'] == $_POST['id']) { ?>
      <form action="edit.connection.php" method="post">
         <input type="hidden" name='id' value= <?php echo $note['id'] ?>>
         <div class="mb-3">
            <label for="title" class="form-label">Note title</label>
            <input name = "title" type="text" class="form-control" id="title" placeholder="Enter the note's title" value = <?php echo "'" . $note['title'] . "'" ?>>
         </div>
         <div class="mb-3">
            <label for="text" class="form-label">Note description</label>
            <textarea name = "description" class="form-control" id="text" rows="3" placeholder="Enter the note's description" > <?php echo $note['description']?></textarea>
         </div>
         <button type="submit" class="btn btn-primary">SAVE</button>
      </form>  
 <?php  } } ?>

</body>
</html>
