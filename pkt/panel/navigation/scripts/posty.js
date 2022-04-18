document.getElementById('site-title').innerHTML="Zarządzanie postami";

let menu = "<h5 class='ml-4'>Menu</h5>";
menu += "<li class='list-group-item list-group-item-action' id='create'>Utwórz post</li>";
menu += "<li class='list-group-item list-group-item-action' id='edit'>Edytuj post</li>";
menu += "<li class='list-group-item list-group-item-action' id='delete'>Usuń post</li>";

document.getElementById('menuLeft').innerHTML = menu;