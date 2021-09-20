var channel = Echo.channel('comment-channel');
channel.listen('.comment-event', function(data) {
    alert(JSON.stringify(data));
});