class Ministrant{
    constructor(id, month, plusScore, minusScore){
        this.id = id;

        //Month
        let monthIndex = month.toString();
        monthIndex = monthIndex.substr(5);
        monthIndex = Number(monthIndex);
        this.month = monthArr[monthIndex];

        this.plusScore = plusScore;
        this.minusScore = minusScore;
    }

    show(){
        let showText = "<li class='list-group-item list-group-item-action'><b>Id ministranta:</b> "+this.id+"</li>";
        showText += "<li class='list-group-item list-group-item-action'><b>Miesiąc:</b> "+this.month+"</li>";
        showText += "<li class='list-group-item list-group-item-action'><b>Punkty dodatnie:</b> "+this.plusScore+"</li>";
        showText += "<li class='list-group-item list-group-item-action'><b>Punkty ujemne:</b> "+this.minusScore+"</li>";

        return showText;
    }
}

let ministrantArr = ["","","",""];
let monthArr = ["styczen", "luty", "marzec", "kwiecien", "maj", "czerwiec", "lipiec", "sierpien", "wrzesieĹ", "pazdziernik", "listopad", "grudzien"];
let ministrant;
function ministrantSelect(ministrant){
    if(!ministrantArr[0]){
        document.getElementById(ministrant.id).style.background="#dc3545";
        document.getElementById(ministrant.id).style.color="#fff";
        ministrantArr[0] = ministrant.id;
    }
    else{
        document.getElementById(ministrantArr[0]).style.background="#fff";
        document.getElementById(ministrantArr[0]).style.color="#495057";
        document.getElementById(ministrant.id).style.background="#dc3545";
        document.getElementById(ministrant.id).style.color="#fff";
        ministrantArr[0] = ministrant.id;
    }
}

function monthSelect(month){
    if(!ministrantArr[1]){
        document.getElementById(month.id).style.background="#dc3545";
        document.getElementById(month.id).style.color="#fff";
        ministrantArr[1] = month.id;
    }
    else{
        document.getElementById(ministrantArr[1]).style.background="#fff";
        document.getElementById(ministrantArr[1]).style.color="#495057";
        document.getElementById(month.id).style.background="#dc3545";
        document.getElementById(month.id).style.color="#fff";
        ministrantArr[1] = month.id;
    }
}

function scoreInsert(){
    let plus = document.getElementById('plusScore').value;
    let minus = document.getElementById('minusScore').value;
    ministrantArr[2] = plus;
    ministrantArr[3] = minus;
}

function ministrantConfirmClick(){
    document.getElementById(`ministrantSelectListButton`).setAttribute(`aria-expanded`, false);
    document.getElementById(`ministrantSelectListButton`).className+=` collapsed`; 
    document.getElementById(`ministrantSelectList`).className=`mt-1 collapse`;
}

function monthConfirmClick(){
    document.getElementById(`monthSelectListButton`).setAttribute(`aria-expanded`, false);
    document.getElementById(`monthSelectListButton`).className+=` collapsed`; 
    document.getElementById(`monthSelectList`).className=`mt-1 collapse`;
}

function scoreConfirmClick(){
        scoreInsert();
        document.getElementById(`scoreSelectListButton`).setAttribute(`aria-expanded`, false);
        document.getElementById(`scoreSelectListButton`).className+=` collapsed`; 
        document.getElementById(`scoreSelectList`).className=`mt-1 collapse`;
}

function summaryAction(){
    if(ministrantArr[0]!="" && ministrantArr[1]!="" && ministrantArr[2]!="" && ministrantArr[3]!=""){
        ministrant = new Ministrant(ministrantArr[0], ministrantArr[1], ministrantArr[2], ministrantArr[3]);
        ministrantArr = ["","","",""];
        document.getElementById('summaryListContent').innerHTML=ministrant.show();
    }
}

function summaryConfirmClick(){
    let request = new XMLHttpRequest();
    let url = "./punktacja/change-score-database.php?";
    url += "id=" + ministrant.id;
    url += "&month=" + ministrant.month;
    url += "&plus=" + ministrant.plusScore;
    url += "&minus=" + ministrant.minusScore;
    request.open('GET', url, false);
    request.send();
    document.getElementById('panel').innerHTML = request.responseText;

    request = new XMLHttpRequest();
    request.open('GET', './punktacja/action-success.php?changed=true', false);
    request.send();
    document.getElementById('panel').innerHTML = request.responseText;
}