document.getElementById('create').onclick=function(){
    let request = new XMLHttpRequest();
    request.open('GET', './ministranci/create-ministrant.php', false);
    request.send();
    document.getElementById('panel').innerHTML = request.responseText;
};

document.getElementById('reset').onclick=function(){
    let request = new XMLHttpRequest();
    request.open('GET', './ministranci/reset-password.php', false);
    request.send();
    document.getElementById('panel').innerHTML = request.responseText;
};

document.getElementById('delete').onclick=function(){
    let request = new XMLHttpRequest();
    request.open('GET', './ministranci/delete-ministrant.php', false);
    request.send();
    document.getElementById('panel').innerHTML = request.responseText;
};
