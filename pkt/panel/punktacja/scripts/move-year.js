function moveYear(){
    let request = new XMLHttpRequest();
    request.open('GET', './punktacja/move-year.php?move=true', false);
    request.send();
    document.getElementById('panel').innerHTML = request.responseText;

    request = new XMLHttpRequest();
    request.open('GET', './punktacja/action-success.php?moved=true', false);
    request.send();
    document.getElementById('panel').innerHTML = request.responseText;
};