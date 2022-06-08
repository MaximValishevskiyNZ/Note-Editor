<?php

session_start();
$emptyMessage = '';
if (isset($_SESSION['empty'])) {
   $emptyMessage = 'Your title or description is empty';
   unset($_SESSION['empty']);
}
$connection = require_once 'classes/connection.php';
$notes = $connection->getNotes();

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   <title>Document</title>
</head>

<body>
   <header class="navbar  bg-primary">
      <div class="container">
         <h1 class="text-white">myNote</h1>
      </div>
   </header>
   <div class="container">
      <form action="includes/create.php" method="post">
         <p class="text-warning"><?php echo $emptyMessage ?></p>
         <div class="mb-3">
            <label for="title" class="form-label">Note title</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="Enter the note's title">
         </div>
         <div class="mb-3">
            <label for="text" class="form-label">Note description</label>
            <textarea name="description" class="form-control" id="text" rows="5"
               placeholder="Enter the note's description"></textarea>
         </div>
         <button type="submit" class="btn btn-primary">SAVE</button>
      </form>

      <?php foreach($notes as $note) { ?>
      <div style='padding: 10px' class='card mt-5 mb-5'>
         <h3>
            <?PHP echo $note['title']?>
         </h3>
         <p>
            <?PHP echo $note['description']?>
         </p>
         <p>
            <?PHP echo $note['create_date']?>
         </p>
         <div style="display:flex; justify-content:right">
            <form action="includes/delete.php" method="post">
               <button type="submit" class='btn btn-danger' name='id' value=<?php echo $note['id'] ?>>DELETE</button>
            </form>
            <form action="includes/edit.php" method="post">
               <button style="margin-left: 10px" type="submit" class='btn btn-primary' name='id'
                  value=<?php echo $note['id'] ?>>EDIT</button>
            </form>

         </div>
      </div>
      <?php } ?>
   </div>
</body>

</html>