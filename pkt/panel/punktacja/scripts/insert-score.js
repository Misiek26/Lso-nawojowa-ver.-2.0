class ScoreQuery{
    constructor(id, firstname, lastname, plusScore, minusScore){
        this.id = id;
        this.firstname = firstname;
        this.lastname = lastname;
        this.plusScore = plusScore;
        this.minusScore = minusScore;
    }
}

let queryArr=[];
let monthName;

function monthClick(month){
    monthName = month.id;
    let request = new XMLHttpRequest();
    request.open('GET', './punktacja/insert-score.php?set=true&month=' + month.id, false);
    request.send();
    document.getElementById('panel').innerHTML = request.responseText;
};

function insertScore(){
    let tableScore = document.getElementById('insertScoreTable');
    let rows = tableScore.firstChild.childNodes;
    for(let i=1; i<rows.length; i++){
        let id = rows[i].childNodes[0].textContent;
        let firstname = rows[i].childNodes[1].textContent;
        let lastname = rows[i].childNodes[2].textContent;
        let plusScore = rows[i].childNodes[3].firstChild.value;
        let minusScore = rows[i].childNodes[4].firstChild.value;

        let query = new ScoreQuery(id, firstname, lastname, plusScore, minusScore);

        queryArr.push(query);
    }

    for(let i=0; i<queryArr.length; i++){
        request = new XMLHttpRequest();
        let url = "./punktacja/update-score.php?month=" + monthName + "&id="+ queryArr[i].id+"&plus="+queryArr[i].plusScore+"&minus="+queryArr[i].minusScore;
        request.open('GET', url, false);
        request.send();
    }

    request = new XMLHttpRequest();
    request.open('GET', './punktacja/action-success.php?inserted=true', false);
    request.send();
    document.getElementById('panel').innerHTML = request.responseText;
}