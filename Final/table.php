<?php
include 'database.php';

// Traer solo 6 registros de la base de datos y ordenarlos por fecha y hora
$query = "SELECT * FROM esp32_table_dht11_leds_record ORDER BY date DESC, time DESC LIMIT 6";
$result = mysqli_query($conexion, $query);

if (mysqli_num_rows($result) > 0) {
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
        echo "<tr>";
        echo "<td>" . $row['temperature'] . "</td>";
        echo "<td>" . $row['humidity'] . "</td>";
        echo "<td>" . $row['time'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "No hay datos en la tabla.";
}
?>
