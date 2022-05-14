$(document).ready(function () {

    Echo.channel('public-chat')
        .listen('.message-event', function (e) {
            addChat(e.message);
        });

    Echo.channel('public-chat')
        .listen('App\Events\MessageEvent', function (e) {
            addChat(e.message);
        });



    //add the message to the chat
    function addChat(message) {
        //get the date
        var date = new Date();
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var seconds = date.getSeconds();
        var timeString = hours + ":" + minutes + ":" + seconds;


        var chat =
            "<div class='row mt-5' >" +
            "<div class='col-md-12'>" +
            "<p class='f-10 text-center'>" + timeString + "  " + message + " </p>" +
            "</div>" +
            "</div>";

        $('#chat-messages').append(chat);
    }

    //Send a chat in the public chat
    $("#chat-submit").on("click", function (e) {
        var message = $("#chat-message").val();
        $(this).addClass('d-none');
        $("#loading-btn").removeClass('d-none');

        $.ajax({
            url: '/chat',
            type: 'POST',
            data: {
                message: message
            },
            success: function (data) {
                $("#chat-submit").removeClass('d-none');
                $("#loading-btn").addClass('d-none');
                $("#chat-message").val("");
            }
        });
    });

});