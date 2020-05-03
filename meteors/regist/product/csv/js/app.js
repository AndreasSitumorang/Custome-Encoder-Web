var fruits = ["Apple", "Grape", "Cherry"];
const colors = ["#e1e1f1", "#c1c1c1", "#484848"];
var bgColorIdx = -1;
function randomizeFruit(elementId) {
var fruitIdx = Math.floor(Math.random() * fruits.length);
var element = $("#" + elementId);
element.text(fruits[fruitIdx]);
}
function changeBackground(){
++bgColorIdx;
if(bgColorIdx == colors.length){
bgColorIdx = 0;
}
$("body").css("background", colors[bgColorIdx]);
}
var Apple= 0;
var Grape= 0;
var Cherry= 0;

function vote0(){
    Apple++;
    document.getElementById("vote-0").innerHTML = Apple;
}


function vote1(){
    Grape++;
    document.getElementById("vote-1").innerHTML = Grape;
}

function vote2(){
    Cherry++;
    document.getElementById("vote-2").innerHTML = Cherry;
}


function loadFruit(increase){
    const seq = getNextFruitSeq(increase);
    const url = "json/" + seq + ".json";
    console.log("url " + url);
    $.ajax({
    url: url,
    success: function(data){
    renderFruit(data);}
    });
}






function renderFruit(data){
    console.log(JSON.stringify(data));
    $("#picture").attr("src", data.image);
    $("#name").text(data.name);
    $("#latin").text(data.latin);
    $("#color").text(data.color);
    }
    function getNextFruitSeq(increase){
    if(increase){
    ++fruitSeq;
    } else {
    --fruitSeq;
    }
    if(fruitSeq > 4){
    fruitSeq = 1;
    }
    if(fruitSeq == 0){
    fruitSeq = 4;
    }
    return(fruitSeq);
    }