$(document).ready(function(){

    var url = "/json/";

    //add or delete series from user series
    $('.addOrDelToMySeries').click(function() {
        $.get(url + 'addOrDel/' + $('.addOrDelToMySeries').data('showid'), function (data) {
            console.log(data);
            if(data.status == "added") {
                $('.addOrDelToMySeries').removeClass('btn-success').addClass('btn-danger').text(data.message);
            } else {
                $('.addOrDelToMySeries').removeClass('btn-danger').addClass('btn-success').text(data.message);
            }
        });
    });


});