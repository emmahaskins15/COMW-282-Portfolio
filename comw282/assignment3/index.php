<?php
if (file_exists('scores.txt')){
    $scores = file('scores.txt');
    $studentScores = array();
    $maxScores = array();
    $percentages = array();
    $count = 1;

    echo '<table border = "2"><thead style = "heavy"><tr>';
    echo '<th>';
    echo '<th>Student Score</th>';
    echo '<th>Possible Score</th>';
    echo '<th>Percentage</th>';
    foreach($scores as $k => $v){
        if ($k %2 == 0){
            $studentScores[] = $v;
         }
         else{
             $maxScores[] = $v;
         }
    }   

    for($i = 0; $i < 10; $i++){
        echo '<tr>';
        echo '<td>'.$count.'</td>';
        echo '<td>'.$studentScores[$i].'</td>';
        $var1 = $studentScores[$i];
        echo '<td>'.$maxScores[$i].'</td>';
        $var2 = $maxScores[$i];
        if ($var2 != 0)
            $var3 = ($var1/$var2)*100;
        $out = sprintf("%d", $var3);
        echo '<td>'.$out.'%</td>';
        $count++;
    }
}
// File not found
else
    echo '<scores.txt not found.>';
?>