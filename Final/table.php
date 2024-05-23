<?php
include 'database.php';

$query = "SELECT * FROM esp32_table_dht11_leds_record ORDER BY date DESC, time DESC LIMIT 6";
$result = mysqli_query($conexion, $query);

$average = 0;
if (mysqli_num_rows($result) > 0) {
    // Inicializar variables para calcular el promedio
    $sum = 0;
    $count = 0;

    // Mostrar la tabla HTML
    echo "<table class='table table-primary' style='border: 1px solid black;'>
            <thead>
              <tr>
              <th class='bg-info' scope='col' style='color: black; text-align: center;'>ID</th>
              <th class='bg-info' scope='col' style='color: black; text-align: center;'>Temperature</th>
              <th class='bg-info' scope='col' style='color: black; text-align: center;'>Humidity</th>
              <th class='bg-info' scope='col' style='color: black; text-align: center;'>Time</th>
              <th class='bg-info' scope='col' style='color: black; text-align: center;'>Date</th>
              </tr>
            </thead>
            <tbody>";

    while ($row = mysqli_fetch_assoc($result)) {
        // Acumular la temperatura y contar los registros
        $sum += $row['temperature'];
        $count++;

        echo "<tr>";
        echo "<td style='text-align: center;'>" . $row['id'] . "</td>";
        echo "<td style='text-align: center;'>" . $row['temperature'] . "</td>";
        echo "<td style ='text-align: center;'>" . $row['humidity'] . "</td>";
        echo "<td style ='text-align: center;'>" . $row['time'] . "</td>";
        echo "<td style ='text-align: center;'>" . $row['date'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";

    // Calcular el promedio de las temperaturas
    if ($count > 0) {
        $average = $sum / $count;
    }
}

// Devuelve el valor de $average
echo "<div id='average' style='display:none;'>$average</div>";
?>
