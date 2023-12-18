

document.getElementById('loadMore').addEventListener('click', function () {
  
     // AJAX request to fetch more users

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Parse the JSON response
            var response = JSON.parse(xhr.responseText);

            // Append the new users to the list
            var userList = document.getElementById('userList');
            response.users.forEach(function (user) {
                var li = document.createElement('li');
                li.textContent = user.username + ' - ' + user.email;
                userList.appendChild(li);
            });
        }
    };

    // Make the AJAX request to the fetchMoreUsers endpoint
    
    xhr.open('GET', 'index.php?route=fetchMoreUsers', true);
    xhr.send();
});