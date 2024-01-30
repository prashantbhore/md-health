@php
    if (Session::has('user')) {
        $user = Session::get('user');
        // $user = true;
        if (Session::has('MDMedicalProvider*%')) {
            $sender_type = 'medicalprovider';
        } elseif (Session::has('MDCustomer*%')) {
            $sender_type = 'customer';
        }
        $sender_id = $user->id;
        $conversation_id = Session::get('conversation_id');
    } else {
        $sender_id = false;
        // return redirect('/')->with('error', 'user session not found');
    }
    $cluster = env('PUSHER_APP_CLUSTER');
    $key = env('PUSHER_APP_KEY');
@endphp
{{-- <script>
    
</script> --}}
{{-- <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.11.0/dist/echo.js"></script>
<script >
    // import Echo from s'https://cdn.jsdelivr.net/npm/laravel-echo@1.11.0/dist/echo.js';
    // importScripts('https://js.pusher.com/7.0/pusher.worker.min.js');
    // import {Pusher} from "https://js.pusher.com/8.2.0/pusher.min.js";
    // import {Pusher} from 'https://js.pusher.com/7.0/pusher.min.js';

    // Pusher.logToConsole = true;

    // var pusher = new Pusher('0ec35c6ba255b31f9283', {
    // cluster: 'ap2'
    // });

    // var channel = pusher.subscribe('my-channel');
    // channel.bind('my-event', function(data) {
    // alert(JSON.stringify(data));
    // });

    // window.Pusher = Pusher;
    const key = "{{ $key }}";
    const cluster = "{{ $cluster }}";
    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: key,
        cluster: cluster,
        encrypted: true,
        forceTLS: true
    });

    // Assuming you have userId available in your Blade template
    let userId = "{{ $sender_id }}";
    console.log("pusher is on");
    if (userId != '') {
        window.Echo.private('user.' + userId)
            .listen('.newMessage', (e) => {
                // Trigger notification to the user
                alert('New message received!');
            });

    }
</script> --}}
{{-- <script type="text/javascript" src="{{ asset('front/assets/js/pusher.js') }}"></script> --}}
{{-- <script type="text/javascript" src="{{ asset('front/assets/js/echo.js') }}"></script> --}}
<script type='module'>
    import Echo from "{{ asset('front/assets/js/echo.js') }}";

    import {
        Pusher
    } from "{{ asset('front/assets/js/pusher.js') }}";

    const key = "{{ $key }}";
    const cluster = "{{ $cluster }}";

    // Ensure Pusher and Echo are loaded before using them

    window.Pusher = Pusher; // Expose Pusher globally
    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: key,
        cluster: cluster,
        encrypted: true,
        forceTLS: true
    });

    const userId = "{{ $sender_id }}";
    console.log("Pusher is loaded");

    if (userId !== '') {
        window.Echo.private('user.' + userId)
            .listen('.newMessage', (e) => {
                // Trigger notification to the user
                alert('New message received!');
            });
    }
</script>
