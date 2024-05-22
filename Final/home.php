<!DOCTYPE HTML>
<html>

<head>
  <title>RECSASI INFO</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="icon" href="data:,">
  <link href="styles.css" rel="stylesheet">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body style="background-color: #5a57ff;">
  <header>
    <nav class="Titulote">
      <span class="navbar-brand">RECSASI</span>
    </nav>
  </header>

  <main>
    <div class="cards">
      <div class="row">
        <div class="col-4">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Temperature</h3>
              <p class="infoSensor"><span class="reading"><span id="ESP32_01_Temp"></span> &deg;C</span></p>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Humidity</h3>
              <p class="infoSensor"><span class="reading"><span id="ESP32_01_Humd"></span> &percnt;</span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer>
    <p><span>Status Read Sensor DHT11 : </span><span id="ESP32_01_Status_Read_DHT11"></span></p>
  </footer>

  <div class="container-fluid table-container">
    <div class="row">
      <div class="col-md-7">
        <div class="table-responsive">
          <div id="dataTable">
            <?php
            include './table.php';
            ?>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title-average">Average of Temperature</h5>
            <p class="card-text-promedio">Aquí van los datos adicionales...</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.getElementById("ESP32_01_Temp").innerHTML = "NN";
    document.getElementById("ESP32_01_Humd").innerHTML = "NN";
    document.getElementById("ESP32_01_Status_Read_DHT11").innerHTML = "NN";

    Get_Data("esp32_01");

    setInterval(myTimer, 5000);

    function myTimer() {
      Get_Data("esp32_01");
    }

    function Get_Data(id) {
      if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
      } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          const myObj = JSON.parse(this.responseText);
          if (myObj.id == "esp32_01") {
            document.getElementById("ESP32_01_Temp").innerHTML = myObj.temperature;
            document.getElementById("ESP32_01_Humd").innerHTML = myObj.humidity;
            document.getElementById("ESP32_01_Status_Read_DHT11").innerHTML = myObj.status_read_sensor_dht11;
            updateTable();
          }
        }
      };
      xmlhttp.open("POST", "getdata.php", true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("id=" + id);
    }

    function updateTable() {
      if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
      } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("dataTable").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "table.php", true);
      xmlhttp.send();
    }
  </script>
</body>

</html>