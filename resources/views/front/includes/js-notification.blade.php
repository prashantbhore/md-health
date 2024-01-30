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
@endphp
<script>
    import Echo from 'laravel-echo';

    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: process.env.MIX_PUSHER_APP_KEY,
        cluster: process.env.MIX_PUSHER_APP_CLUSTER,
        encrypted: true,
    });

    // Assuming you have userId available in your Blade template
    let userId = {{ Auth::guard('md_customer_registration')->user() }};
    if(userId){

    }else{
        userId = {{ Auth::guard('md_health_medical_providers_registers')->user() }};
    }
if(userId){
    window.Echo.private('user.' + userId->id)
        .listen('.newMessage', (e) => {
            // Trigger notification to the user
            alert('New message received!');
        });

}
</script>
