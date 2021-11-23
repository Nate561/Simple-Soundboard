<?php?>

</php>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Tate Sounds</title>
    <link rel="shortcut icon" type="image/x-icon" href="./icons/favicon.ico" />
    <!-- Apple stuff -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link rel="apple-touch-icon" sizes="180x180" href="./icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./icons/favicon-16x16.png">
    <link rel="manifest" href="./icons/site.webmanifest">
    <script src="./inc/js/jquery-3.3.1.min.js"></script>
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
      crossorigin="anonymous"
    />
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
      integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
      crossorigin="anonymous"
    ></script>
    <!-- <link rel="stylesheet" type="text/css" href="./inc/css/bttn.css" /> -->
    <link rel="stylesheet" type="text/css" href="./inc/css/sb.css" />
     <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/balloon-css/0.5.0/balloon.min.css"
    />
    <link
      href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAANCAIAAAAAAA4w7QBrZFwAWVlKAA8PDgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAERAREQEREBEREQABAQABEREREAAAABEREREREAARERERERETIxERERERERVVERERERERBQUBERERERAwMDARERERFQRUABEREREVQEBAERERERUEBAARERERFUBAQBEREREVBAQAERERERVFRUARERERFQQEABERERERVVABERHvewAA8UcAAPgPAAD+PwAA/j8AAP4/AAD8HwAA+A8AAPgPAAD4DwAA+A8AAPgPAAD4DwAA+A8AAPgPAAD8HwAA"
      rel="icon"
      type="image/x-icon"
    />
  </head>

  <body class='bg-dark'>
    <nav  class="navbar navbar-expand-lg navbar-dark bg-dark shadow sticky-top justify-content-center text-light">
      <image src="./icons/dave.png" 
        alt="logo" class="logo" />
      <h1>
        TATE SOUNDS
      </h1>
      <image src="./icons/dave.png" 
        alt="logo" class="logo" />
    </nav>

    <div id="soundboard" class="container" style="padding:10px">
            
    </div>

    <script type="text/javascript">
      var sounds = [];
      var playOnlyOneSoundAtATime = true;
      var row = $('<div \>')
              .addClass("row")
              .addClass("top-buffer");

      var column = $('<div \>')
              .addClass("col");
      $.ajax({
        url: "./inc/json/soundboard.json", // Add link to your JSON file here
        dataType: "json",
        type: "get",
        cache: false,
        success: function(data) {
          $(data.files).each(function(index, value) {
            var thisSound = {
              audioName: value.name,
              artistName: value.artist,
              mp3: value.mp3
            };
            sounds.push(thisSound);
          });
        }
      }).done(function() {
        sounds.map(file => {
          $("#soundboard").append(function() {
            
            var thisButton = $("<button />")
              .addClass("btn btn-danger btn-block btn-xlarge")
              .data("sound", "./"+file.mp3)
              .text(file.audioName);
              return row.clone().append(column.clone().append(thisButton))                                                     
            
          });
        });
        $("#soundboard").on("click", "button", function() {
          //Play sound in data-sound attribute
          var thisSound = $(this).data("sound");
          var thisAudio = new Audio(thisSound);
          thisAudio.play();                
         });
      });
    </script>

    <footer class="footer bg-dark">
      <footer class="pt-4 my-md-5 pt-md-5 border-top">
  
        <div class="row text-center">
          <div class="col-md">
            <p>Site Created By Nathan Eckberg, in honnor of Dave Tate!</p>               
            <p>LIVE | LEARN | PASS ON</p>
          </div>
        </div>        
      </footer>
    </footer>
    <!-- <p>
      View the
      <a href="https://github.com/digitalcolony/Simple-Soundboard"
        >Simple Soundboard Repo</a
      >
      on GitHub.
    </p> -->

  </body>
</html>
