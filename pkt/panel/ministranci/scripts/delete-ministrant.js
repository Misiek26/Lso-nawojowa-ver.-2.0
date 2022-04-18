let ministrantDelete = [];
let ministrantDeleteId = "";

function ministrantDeleteSelect(ministrant){
    let firstnamePosition = ministrant.search("imie");
    let lastnamePosition = ministrant.search("nazwisko");
    
    let id = ministrant.slice(2,firstnamePosition);
    let firstname = ministrant.slice(firstnamePosition+4 ,lastnamePosition);
    let lastname = ministrant.slice(lastnamePosition+8);

    if(!ministrantDelete[0]){
        document.getElementById(ministrant).style.background="#dc3545";
        document.getElementById(ministrant).style.color="#fff";
        ministrantDelete[0] = id;
        ministrantDelete[1] = firstname;
        ministrantDelete[2] = lastname;
        ministrantDeleteId = ministrant;
    }
    else{
        document.getElementById(ministrant).style.background="#dc3545";
        document.getElementById(ministrant).style.color="#fff";
        document.getElementById(ministrantDeleteId).style.background="#fff";
        document.getElementById(ministrantDeleteId).style.color="#495057";
        ministrantDelete[0] = id;
        ministrantDelete[1] = firstname;
        ministrantDelete[2] = lastname;
        ministrantDeleteId = ministrant;
    }
}
function ministrantDeleteConfirmClick(){
    document.getElementById(`ministrantDeleteSelectListButton`).setAttribute(`aria-expanded`, false);
    document.getElementById(`ministrantDeleteSelectListButton`).className+=` collapsed`; 
    document.getElementById(`ministrantDeleteSelectList`).className=`mt-1 collapse`;
}

function summaryDeleteAction(){
    if(ministrantDeleteId != ""){
        let showText = "<li class='list-group-item list-group-item-action'><b>Id ministranta:</b> "+ministrantDelete[0]+"</li>";
        showText += "<li class='list-group-item list-group-item-action'><b>Imię:</b> "+ministrantDelete[1]+"</li>";
        showText += "<li class='list-group-item list-group-item-action'><b>Nazwisko:</b> "+ministrantDelete[2]+"</li>";
        document.getElementById('summaryDeleteListContent').innerHTML=showText;
    }
}

function summaryDeleteConfirmClick(){
    let request = new XMLHttpRequest();
    let url = "./ministranci/delete-ministrant-database.php?";
    url += "id=" + ministrantDelete[0];
    request.open('GET', url, false);
    request.send();
    document.getElementById('panel').innerHTML = request.responseText;
}