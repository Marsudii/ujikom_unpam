<?php 
    session_start();

include("../koneksi.php");
include("../proses.php");
include ('../view/header.php');


  
  if(!isset($_SESSION["username"])){
      echo'<script>
                alert("Mohon login dahulu !");
                window.location="../index.php";
             </script>';
      return false;
  }

  if($_SESSION["level"] != "admin"){
        echo'<script>
                alert("Maaf Anda Tidak Berhak Ke Halaman ini !");
                window.location="../'.$_SESSION["level"].'/";
             </script>';
        return false;
  }



  

    ?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta name="Vikkey" content="Vivek Gupta & IoTMonk">
      <meta http-equiv="Access-Control-Allow-Origin" content="*">
     
       <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

      <title>ESP</title></head>
      <body>
  
   
   <div class="center">
    <div align="center" class="form">
       <form action="" method="get">

      
          <br>
              <input type="text" id="ip" class="ip" placeholder="masukan token "></input>
              <br>
              <br>
              <br>
            
              <button type="button" id="D1-on" class="button button1" >D1 ON</button>
              <button type="button" id="D1-off" class="button button3" >D1 OFF</button>
              <br>
              <button type="button" id="D2-on" class="button button1" >D2 ON</button>
              <button type="button" id="D2-off" class="button button3" >D2 OFF</button>
              <br>
              <button type="button" id="D3-on" class="button button1" >D3 ON</button>
              <button type="button" id="D3-off" class="button button3" >D3 OFF</button>
              <br>
              <button type="button" id="D4-on" class="button button1" >D4 ON</button>
              <button type="button" id="D4-off" class="button button3" >D4 OFF</button>
              <br>
              <!--<textarea id="logger" class="ip" placeholder="LOGS" readonly></textarea> -->
        </form>
        <br><br>
     </div>
    </div>

    </body>
    <script>
        document.getElementById('D1-on').addEventListener('click', function() {
                var ip = document.getElementById('ip').value;
                var url = "http://api.thingspeak.com/update?api_key="+ ip + "&field1=1"
                $.getJSON(url, function(data) {
                    console.log(data);
                });
        });
        
        document.getElementById('D1-off').addEventListener('click', function() {
                var ip = document.getElementById('ip').value;
                var url = "http://api.thingspeak.com/update?api_key="+ ip + "&field1=0"
                $.getJSON(url, function(data) {
                    console.log(data);
                });
        });
        
        
        document.getElementById('D2-on').addEventListener('click', function() {
                var ip = document.getElementById('ip').value;
                var url = "http://api.thingspeak.com/update?api_key="+ ip + "&field2=1"
                $.getJSON(url, function(data) {
                    console.log(data);
                });
        });
        
        document.getElementById('D2-off').addEventListener('click', function() {
                var ip = document.getElementById('ip').value;
                var url = "http://api.thingspeak.com/update?api_key="+ ip + "&field2=0"
                $.getJSON(url, function(data) {
                    console.log(data);
                });
        });
        
        
        document.getElementById('D3-on').addEventListener('click', function() {
                var ip = document.getElementById('ip').value;
                var url = "http://api.thingspeak.com/update?api_key="+ ip + "&field3=1"
                $.getJSON(url, function(data) {
                    console.log(data);
                });
        });
        
        document.getElementById('D3-off').addEventListener('click', function() {
                var ip = document.getElementById('ip').value;
                var url = "http://api.thingspeak.com/update?api_key="+ ip + "&field3=0"
                $.getJSON(url, function(data) {
                    console.log(data);
                });
        });

         document.getElementById('D4-on').addEventListener('click', function() {
                var ip = document.getElementById('ip').value;
                var url = "http://api.thingspeak.com/update?api_key="+ ip + "&field4=1"
                $.getJSON(url, function(data) {
                    console.log(data);
                });
        });

          document.getElementById('D4-off').addEventListener('click', function() {
                var ip = document.getElementById('ip').value;
                var url = "http://api.thingspeak.com/update?api_key="+ ip + "&field4=0"
                $.getJSON(url, function(data) {
                    console.log(data);
                });
        });


        
    </script>
</html>

<?php

    include('../view/footer.php');
?>