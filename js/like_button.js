function like_button(story_id, username, status) {
    // construct the url with parameters
    var url = "likeUpdate.php?storyId=" + story_id + "&username=" + username + "&status=" + status;
    console.log(url); // debug

    // do the fetch
    fetch(url, {credentials: 'include'})
        .then(response => response.text())
        .then(success)
}

function success(a) {
    window.location.href = "index.php";
}




