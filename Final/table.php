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
    echo "<table class='table table-primary'>
            <thead>
              <tr>
                <th scope='col'>Temperature</th>
                <th scope='col'>Humidity</th>
                <th scope='col'>Time</th>
                <th scope='col'>Date</th>
              </tr>
            </thead>
            <tbody>";

    while ($row = mysqli_fetch_assoc($result)) {
        // Acumular la temperatura y contar los registros
        $sum += $row['temperature'];
        $count++;

        echo "<tr>";
        echo "<td>" . $row['temperature'] . "</td>";
        echo "<td>" . $row['humidity'] . "</td>";
        echo "<td>" . $row['time'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
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
