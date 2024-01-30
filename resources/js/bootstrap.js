/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

// import axios from 'axios';
// window.axios = axios;

// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */
 
import Echo from 'laravel-echo'

    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: '0ec35c6ba255b31f9283',
        cluster: 'ap2',
        forceTLS: true
    });

    var channel = Echo.channel('my-channel');
    channel.listen('.my-event', function(data) {
        alert(JSON.stringify(data));
    });
// window.Pusher = Pusher;
 
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

// const userId = "{{ Auth::guard('md_customer_registration')->user()->id }}";

// window.Echo.private('user.' + userId)
//             .listen('.newMessage', (e) => {
//                 // Trigger notification to the user
//                 alert('New message received!');
//             });
