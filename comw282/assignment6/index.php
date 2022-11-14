<!DOCTYPE html>
<html lang="en">
<head>
    <title>First JavaScript Page</title>
    <meta charset="utf-8">
    <!-- <link href="css/styles.css" rel="stylesheet" type="text/css"> -->
    <script type="text/javascript"> 
            let version = 1.0; 
    </script> 
</head>
<body>
    <div class="col-33%">
        <div class="row">
            <noscript>Scripts disabled.</noscript>
            <p>Name: Emma Haskins</p>
            <p>Assignment: Web Assignment 6</p>
            <p id="date"></p>
            <p id="version"></p>
        </div>
        <hr>
        <div class="row">
            <p>Calculation Example:</p>
            <p id="dayCalc"></p>
        </div>
        <hr>
        <div class="row">
            <p id="greeting"></p>
        </div>
        <!-- Start JavaScript -->
        <script language="Javascript1.1"> version = 1.1; </script> 
        <script language="Javascript1.2"> version = 1.2; </script> 
        <script language="Javascript1.3"> version = 1.3; </script> 
        <script language="Javascript1.4"> version = 1.4; </script> 
        <script language="Javascript1.5"> version = 1.5; </script> 
        <script language="Javascript1.6"> version = 1.6; </script> 
        <script language="Javascript1.7"> version = 1.7; </script> 
        <script language="Javascript1.8"> version = 1.8; </script> 
        <script language="Javascript1.9"> version = 1.9; </script>
        <script type="text/javascript">
            // Get time elapsed in seconds
            const timeElapsed = Date.now();
            // Convert time elapsed into Date format
            const todaysDate = new Date(timeElapsed);
            // Format to short dateStyle: %m/%d/%Y
            todaysDateAsShortDate = new Intl.DateTimeFormat('en-US',{dateStyle:'short'}).format(todaysDate);
            // Write to 'date' HTML element
            document.getElementById("date").innerHTML = "Date:" + todaysDateAsShortDate;
            document.getElementById("version").innerHTML = "Javascript version: " + version;

            // Get day of month
            let dayNumeric = todaysDate.getDate();
            // Write to dayCalc element
            document.getElementById("dayCalc").innerHTML = "Day of month: " + dayNumeric + "<br>";
            for (i = 7; i <= 35; i += 7) {
                let dayCalc = dayNumeric + i;
                document.getElementById("dayCalc").innerHTML += "Day + " + i + " = " + dayCalc + "<br>";
            }

            // Get hour and minute values
            let hour = todaysDate.getHours();
            let minute = todaysDate.getMinutes();
            // Assign value to greeting based on time of day
            let greeting;
            if (6 < hour && hour <= 12) {
                greeting = "Good Morning!  Hope you have a great day!";
            }
            else if (12 < hour && hour <= 17){
                greeting = "It's a nice afternoon (hopefully). Enjoy your evening.";
            }
            else if (17 < hour && hour <=23 || hour == 0 && minute < 1) {
                greeting = "Good Evening.  Enjoy the rest of your night.";
            }
            else {
                greeting = "What are you doing awake?";
            }
            document.getElementById("greeting").innerHTML = greeting;
        </script>
        <!-- End JavaScript -->


        </div>
    </div>
</body>
</html>