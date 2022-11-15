let scoreArray = [];
function addScore() {
    scoreInput = document.getElementById("scoreInput").value;
    scoreArray.push(scoreInput);
    alert(scoreInput + " added to scores.");
    console.log(scoreArray)
}

function displayAvg(scoreArray){
    sum = 0;
    let arrayLength = scoreArray.length;
    console.log(arrayLength)

    for (i = 0; i < arrayLength; i++) {
        sum += Number(scoreArray[i]);
        count = i+1;
        document.getElementById("scores").innerHTML += "Score " + count + ": " + scoreArray[i] + "<br>";
        console.log("sum " + count +": " + sum)
    }
    let avg = sum/arrayLength;
    document.getElementById("average").innerHTML = "Average: " + avg;
    document.getElementById("scoreInput").value = "";
}


