function deletePostClick(postId){
    let id = postId.slice(2);

    if(confirm("Czy na pewno chcesz usunąć podany post?"));{
        window.location.href="posty/delete-post-database.php?id="+id;
    }
}