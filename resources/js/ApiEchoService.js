import Echo from "laravel-echo";
import Pusher from "pusher-js";

const ApiEchoService = () => {
    console.log("ApiEchoService");
    window.Pusher = Pusher;
    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: '930f37be1409473afdc2',
        cluster: 'us2',
        forceTLS: true
    });
    var channel = window.Echo.channel('likes-status');
    channel.listen('.server.like', (data) => {
        console.log('LikesStatusChangeEvent');
        console.log(data);
    });
};

export default ApiEchoService;
