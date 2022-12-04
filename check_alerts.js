$.getJSON('php/alerts.php', (data) => {
    var alert_html = '';

    if(data != null) {
        
        alert_html  += '<div class="alert alert-warning alert-dismissible fade show" role="alert">' +
        data +
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

        $('body').append(alert_html);
    }
});

