document.getElementById('show').onclick=function(){
    let request = new XMLHttpRequest();
    request.open('GET', './punktacja/show-score.php', false);
    request.send();
    document.getElementById('panel').innerHTML = request.responseText;
};

document.getElementById('insert').onclick=function(){
    let request = new XMLHttpRequest();
    request.open('GET', './punktacja/insert-score.php', false);
    request.send();
    document.getElementById('panel').innerHTML = request.responseText;
};

document.getElementById('change').onclick=function(){
    let request = new XMLHttpRequest();
    request.open('GET', './punktacja/change-score.php', false);
    request.send();
    document.getElementById('panel').innerHTML = request.responseText;
};

document.getElementById('move').onclick=function(){
    let request = new XMLHttpRequest();
    request.open('GET', './punktacja/move-year.php', false);
    request.send();
    document.getElementById('panel').innerHTML = request.responseText;
};

function back(){
    let request = new XMLHttpRequest();
    request.open('GET', './punktacja/show-score.php', false);
    request.send();
    document.getElementById('panel').innerHTML = request.responseText;
}