document.getElementById('site-title').innerHTML="Zarządzanie ministrantami";

let menu = "<h5 class='ml-4'>Menu</h5>";
menu += "<li class='list-group-item list-group-item-action' id='create'>Dodaj ministranta</li>";
menu += "<li class='list-group-item list-group-item-action' id='reset'>Zresetuj hasło</li>";
menu += "<li class='list-group-item list-group-item-action' id='delete'>Usuń ministranta</li>";

document.getElementById('menuLeft').innerHTML = menu;