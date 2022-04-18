function createMinistrant(){
    let firstname = document.getElementById('firstname').value;
    let lastname = document.getElementById('lastname').value;
    let login = document.getElementById('login').value;
    
    let request = new XMLHttpRequest();
    request.open('GET', './ministranci/create-ministrant-database.php?firstname='+firstname+'&lastname='+lastname+'&login='+login, false);
    request.send();
    document.getElementById('panel').innerHTML = request.responseText;
}
function loginChange(loginArrString){
    document.getElementById('loginError').innerHTML=" ";

    let loginArr = loginArrString.split(" ");
    let login = document.getElementById('login').value;

    for(let i=0; i<loginArr.length; i++){
        if(loginArr[i] == login){
            document.getElementById('loginError').innerHTML="Podany login już istnieje";
        }
    }
}