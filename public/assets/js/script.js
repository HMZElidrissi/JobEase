$(document).ready(function () {
    $('#searchBtn').click(function () {
        var keywords = $('#keywords').val();
        var location = $('#location').val();
        var company = $('#company').val();

        $.ajax({
            type: 'GET',
            url: '?route=search',
            data: {
                keywords: keywords,
                location: location,
                company: company
            },
            success: function (data) {
                $('#results').html(data);
            }
        });
    });
});