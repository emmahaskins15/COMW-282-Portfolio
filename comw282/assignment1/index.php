<?php
    // Section 1
    $name = "Emma Haskins";
    $assignment = "Web Assignment 1";
    
    echo "Name: $name";
    echo "<br>";
    echo "Assignment: $assignment";
    echo "<br>";
    echo "Date: " . date("F d, Y");
    echo "<br>";
    echo "PHP Version: " . phpversion();
    echo "<br>";

    echo "<br>";
    echo "<hr>";
    echo "<br>";

    // Section 2
    $day = date("d");
    echo "Calculation Example";
    echo "<br>";
    echo "Day of Month: $day";
    echo "<br>";
    for ($count = 1 ; $count <= 5 ; ++$count)
    {
        $product = $count * 7;
        echo "Day + $product = " . ($day + $product) . "<br>";
    }

    echo "<br>";
    echo "<hr>";
    echo "<br>";

    // Section 3
    $hour = date("H");
    $minute = date("i");
    if (6 < $hour && $hour <= 12){
        echo "Good Morning!  Hope you have a great day!";
    }
    elseif (12 < $hour && $hour <= 17){
        echo "It's a nice afternoon (hopefully). Enjoy your evening.";
    }
    elseif (17 < $hour && $hour <= 23 || $hour == 0 && $minute < 1){
        echo "Good Evening.  Enjoy the rest of your night.";
    }
    else{
        echo "What are you doing awake?";
    }
    echo "<br>";

    echo "<br>";
    echo "<hr>";
    echo "<br>";
?>