function editPostConfirmClick(postId){
    let id = postId.slice(2);
    window.location.href="posty/edit-post.php?id="+id;
}