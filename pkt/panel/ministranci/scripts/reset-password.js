let ministrantPassword = [];
let ministrantPasswordId = "";

function ministrantPasswordSelect(ministrant){
    let firstnamePosition = ministrant.search("imie");
    let lastnamePosition = ministrant.search("nazwisko");
    
    let id = ministrant.slice(2,firstnamePosition);
    let firstname = ministrant.slice(firstnamePosition+4 ,lastnamePosition);
    let lastname = ministrant.slice(lastnamePosition+8);

    if(!ministrantPassword[0]){
        document.getElementById(ministrant).style.background="#dc3545";
        document.getElementById(ministrant).style.color="#fff";
        ministrantPassword[0] = id;
        ministrantPassword[1] = firstname;
        ministrantPassword[2] = lastname;
        ministrantPasswordId = ministrant;
    }
    else{
        document.getElementById(ministrant).style.background="#dc3545";
        document.getElementById(ministrant).style.color="#fff";
        document.getElementById(ministrantPasswordId).style.background="#fff";
        document.getElementById(ministrantPasswordId).style.color="#495057";
        ministrantPassword[0] = id;
        ministrantPassword[1] = firstname;
        ministrantPassword[2] = lastname;
        ministrantPasswordId = ministrant;
    }
}
function ministrantPasswordConfirmClick(){
    document.getElementById(`ministrantPasswordSelectListButton`).setAttribute(`aria-expanded`, false);
    document.getElementById(`ministrantPasswordSelectListButton`).className+=` collapsed`; 
    document.getElementById(`ministrantPasswordSelectList`).className=`mt-1 collapse`;
}

function summaryPasswordAction(){
    if(ministrantPasswordId != ""){
        let showText = "<li class='list-group-item list-group-item-action'><b>Id ministranta:</b> "+ministrantPassword[0]+"</li>";
        showText += "<li class='list-group-item list-group-item-action'><b>Imię:</b> "+ministrantPassword[1]+"</li>";
        showText += "<li class='list-group-item list-group-item-action'><b>Nazwisko:</b> "+ministrantPassword[2]+"</li>";
        document.getElementById('summaryPasswordListContent').innerHTML=showText;
    }
}

function summaryPasswordConfirmClick(){
    let request = new XMLHttpRequest();
    let url = "./ministranci/reset-password-database.php?";
    url += "id=" + ministrantPassword[0];
    request.open('GET', url, false);
    request.send();
    document.getElementById('panel').innerHTML = request.responseText;
}