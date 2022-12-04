$.getJSON('php/get_user_data.php', (data) => {
    var login = data;
    $('#login').text(login);

    if(login == null) {
        window.location.href = '/index.html';
    }
    
})