<?php
  //variable for tracking the row we're on
  $counter = 0;
  // Grabbing all the files out of the members directory
  // NOTE: Resize all photos on Members page. Looks horrible on small screens.
  $files = scandir('members/');
  foreach ($files as $file) {
    if ($file != "." && $file != ".." && $file != "README.md") {
      $curfile = file("members/$file");

      if ($counter%2==0){
              echo "<div class='row'>";
      }
      //Add Photo
      echo "<div class='col-md-2'>
              <img src='assets/img/$file.jpg' class='img-responsive'>
            </div>";
      // Member Name
      echo "<div class='col-md-4'>
            <div class='list-group'>
            <a href='$curfile[3]' class='list-group-item'>
            <h4 class='list-group-item-heading'>";
      echo $curfile[0];
      echo "<small>".$curfile[1]."</small>
            </h4>";

      // Join date
      if (strlen($curfile[2]) > 1){
      echo "<p class='list-group-item-text'>
              Member since: ".$curfile[2]."</p>";
      }else{
        echo "<p class='list-group-item-text'></p>";
      }
      

      // LinkedIn
      if (strlen($curfile[3]) > 1){
        echo "<p class='list-group-item-text'>
            ".$curfile[3]."</p>";
        //echo "<p class='list-group-item-text'><a href='$curfile[3]'>LinkedIn</a></p>";
      }else{
        echo "<p class='list-group-item-text'></p>";
      }

      // Email 
      echo "<p class='list-group-item-text'>
              Email: ".$curfile[4]."</p>";

      // Skills
      if (strlen($curfile[5]) > 1){
      echo "<p class='list-group-item-text'>
              Can Help With: ".$curfile[5]."</p>";
      }else{
        echo "<p class='list-group-item-text'></p>";
      }

      echo "</a>";
      echo "</div>";
      echo "</div>";
      $counter += 1;
      if ($counter%2==0){
              echo "</div></br>";
      }
    }
  }
?>
