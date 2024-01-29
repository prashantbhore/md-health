@php
    $user = Session::has('MDCustomer*%') ? Session::get('MDCustomer*%') : '';
    $medical = Session::has('MDMedicalProvider*%') ? Session::get('MDMedicalProvider*%') : '';
    if (Session::has('user')) {
        $user = Session::get('user');
        if (Session::has('MDMedicalProvider*%')) {
            $sender_type = 'medicalprovider';
        } elseif (Session::has('MDCustomer*%')) {
            $sender_type = 'customer';
        }
        $sender_id = $user->id;
        $conversation_id = Session::get('conversation_id');
    } else {
        return redirect('/')->with('error', 'user session not found');
    }
@endphp

<script type="module">
    import {
        initializeApp
    } from 'https://www.gstatic.com/firebasejs/10.7.2/firebase-app.js'
    import {
        getMessaging,
        getToken,
        onMessage,
    } from "https://www.gstatic.com/firebasejs/10.7.2/firebase-messaging.js";

    const firebaseConfig = {
        apiKey: "AIzaSyCi9vOusfNsRY2NgWUk8fDOjri9L8dALY8",
        authDomain: "sweedesinew.firebaseapp.com",
        databaseURL: "https://sweedesinew.firebaseio.com",
        projectId: "sweedesinew",
        storageBucket: "sweedesinew.appspot.com",
        messagingSenderId: "537186381446",
        appId: "1:537186381446:web:777955e71e5e61c8d62b07"
    };

    const medical ="{{ $medical }}";
    const user = "{{ $user }}";

    if(medical != '' || user != ''){

        const app = initializeApp(firebaseConfig);
    
        const messaging = getMessaging();
        const user_id = "{{ $sender_id }}";
        getToken(messaging, {
            vapidKey: 'BALWd3VwOcsTfiTfPPcVcVCUkMRVhGB88TVOhmIg2A9gNJzA6NJ_kltn9NxNSildp_8tARwffCERCxIbCWYCPyM'
        }).then((currentToken) => {
            if (currentToken) {
    
                console.log(currentToken);
                //  /api/
                navigator.sendBeacon(
                    `/setToken?fcm_token=${currentToken}&user_id=${user_id}`
                );
            } else {
                // Show permission request UI
                console.log('No registration token available. Request permission to generate one.');
                // ...
            }
        }).catch((err) => {
            console.log('An error occurred while retrieving token. ', err);
            // ...
        });
    
        onMessage(messaging, (payload) => {
            alert(payload.notification.title + " " + payload.notification.body);
            console.log('Message received. ', payload);
            // ...
        });
    }


 
</script>
