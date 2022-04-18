document.getElementById('create').onclick=function(){
    window.location.href="posty/create-post.php";
};

document.getElementById('edit').onclick=function(){
    let request = new XMLHttpRequest();
    request.open('GET', './posty/edit-post-list.php', false);
    request.send();
    document.getElementById('panel').innerHTML = request.responseText;
};

document.getElementById('delete').onclick=function(){
    let request = new XMLHttpRequest();
    request.open('GET', './posty/delete-post.php', false);
    request.send();
    document.getElementById('panel').innerHTML = request.responseText;
};
