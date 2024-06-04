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

<body id="body" style="background-color: red;">
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
              <p class="infoSensor"><span class="reading">33</span> &deg;C</span></p>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Humidity</h3>
              <p class="infoSensor"><span class="reading">28</span> &percnt;</span></p>
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
            <table class='table table-primary'>
              <thead>
                <tr>
                  <th scope='col'>Temperature</th>
                  <th scope='col'>Humidity</th>
                  <th scope='col'>Time</th>
                  <th scope='col'>Date</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>33</td>
                  <td>28</td>
                  <td>11:17:15</td>
                  <td>2024-05-31</td>
                </tr>
                <tr>
                  <td>33</td>
                  <td>28</td>
                  <td>11:17:00</td>
                  <td>2024-05-31</td>
                </tr>
                <tr>
                  <td>33</td>
                  <td>28</td>
                  <td>11:16:45</td>
                  <td>2024-05-31</td>
                </tr>
                <tr>
                  <td>32</td>
                  <td>28</td>
                  <td>11:16:30</td>
                  <td>2024-05-31</td>
                </tr>
                <tr>
                  <td>32</td>
                  <td>28</td>
                  <td>11:16:15</td>
                  <td>2024-05-31</td>
                </tr>
                <tr>
                  <td>32</td>
                  <td>28</td>
                  <td>11:16:00</td>
                  <td>2024-05-31</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title-average">Average of Temperature</h5>
            <p class="card-text-promedio">32.5</span></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    setTimeout(function() {
      alert('Be careful with temperature');
    }, 1000);
  </script>
</body>

</html>
