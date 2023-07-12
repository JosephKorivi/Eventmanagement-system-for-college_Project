<?php 
    // connecting to the database
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'project';

    // creating connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // condition to display 

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['user'];
        $pass = $_POST['pass'];
    }

    $sql = "select * from registration";
    $result = mysqli_query($conn, $sql);
    
    $num = mysqli_num_rows($result);
    // echo $num . '<br>';


    // if($name == 'admin' && $pass == 'admin') {
    //     echo "STUDENT NAME" . "     " . "EMAIL" . "     " . "YEAR" . "      " . "EVENTNAME";
    //     echo "<br>";
    //     while($row = mysqli_fetch_assoc($result)) {
    //         echo '<table>';
    //         if($num > 0) {
    //             echo '<tr>';
    //             echo "<td>" . $row['studentname'] . " " . $row['email'] . " " . $row['year'] . " " . $row['eventName'] . "</td> ";
    //             echo "</tr>";
    //             echo "<br>";
    //         }
    //         echo '</table>';
    //     }
    // }

    if($name == 'admin' && $pass == 'admin') {
        if($num > 0) {
            echo "<center>";
            echo "<table>";
            echo "<tr><th>STUDENT NAME</th><th>EMAIL</th><th>YEAR</th><th>EVENTNAME</th></tr>";
            // echo "<br>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['STUDENTNAME'] . "</td>";
                echo "<td>" . $row['EMAIL'] . "</td>";
                echo "<td>" . $row['YEAR'] . "</td>";
                echo "<td>" . $row['EVENTNAME'] . "</td>";
                echo "</tr>";
                echo "<br>";
            }
            echo "</table>";
            echo "</center>";
        }
    }

?>