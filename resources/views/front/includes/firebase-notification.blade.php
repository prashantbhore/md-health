@php
    if (Session::has('user')) {
        $user = Session::get('user');
        if (Session::has('MDMedicalProvider*%')) {
            $sender_type = 'medicalprovider';
        } elseif (Session::has('MDCustomer*%')) {
            $sender_type = 'customer';
        }
        $sender_id = $user->id;
        $conversation_id = '41';
    } else {
        return redirect('/')->with('error', 'user session not found');
    }
@endphp

<script type="module">
    import {
        initializeApp
    } from 'https://www.gstatic.com/firebasejs/10.7.2/firebase-app.js'
    import {
        getAnalytics
    } from 'https://www.gstatic.com/firebasejs/10.7.2/firebase-analytics.js'
    import {
        getAuth
    } from 'https://www.gstatic.com/firebasejs/10.7.2/firebase-auth.js'
    import {
        getFirestore,
        collection,
        addDoc,
        getDocs,
        query,
        where
    } from 'https://www.gstatic.com/firebasejs/10.7.2/firebase-firestore.js'
    import {
        getMessaging,
        getToken,
        onMessage,
        // onBackgroundMessage
    } from "https://www.gstatic.com/firebasejs/10.7.2/firebase-messaging.js";
    // import {
    //     onBackgroundMessage
    // } from "https://www.gstatic.com/firebasejs/10.7.2/firebase-functions.js";

    const firebaseConfig = {
        apiKey: "AIzaSyCi9vOusfNsRY2NgWUk8fDOjri9L8dALY8",
        authDomain: "sweedesinew.firebaseapp.com",
        databaseURL: "https://sweedesinew.firebaseio.com",
        projectId: "sweedesinew",
        storageBucket: "sweedesinew.appspot.com",
        messagingSenderId: "537186381446",
        appId: "1:537186381446:web:777955e71e5e61c8d62b07"
    };

    const app = initializeApp(firebaseConfig);
    const db = getFirestore(app);

    

    ///////////////////////////////////////push notifications////////////////////////////////

    // Get registration token. Initially this makes a network call, once retrieved
    // subsequent calls to getToken will return from cache.
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

    // Send notification using Firebase Cloud Messaging


    // Construct notification payload
    // onBackgroundMessage((payload) => {
    //     console.log(
    //         '[firebase-messaging-sw.js] Received background message ',
    //         payload
    //     );
    //     // Customize notification here
    //     const notificationTitle = 'Background Message Title';
    //     const notificationOptions = {
    //         body: 'Background Message body.',
    //         icon: '/firebase-logo.png'
    //     };

    //     self.registration.showNotification(notificationTitle, notificationOptions);
    // });

    ///////////////////////////////////////push notifications////////////////////////////////

    const docId = '';
    let messagesArray = [];
    let documentIds = [];
    let lastMessageTimestamp = 0;
    const textarea = document.getElementById('productstext');
    const sendButton = document.getElementById('sendMessageButton');

    sendButton.addEventListener('click', sendMessage);

    textarea.addEventListener('keydown', function(event) {
        if (event.key === 'Enter' && !event.shiftKey) {
            event.preventDefault();
            sendMessage();
        }
    });


    async function sendMessage() {
        const text = textarea.value.trim();
        if (text === '') {
            return;
        }

        const timestampInSeconds = Math.floor(Date.now() / 1000);

        const daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        const currentDayOfWeek = daysOfWeek[new Date().getDay()];

        const currentDate = new Date();
        const hours = currentDate.getHours().toString().padStart(2, '0');
        const minutes = currentDate.getMinutes().toString().padStart(2, '0');
        const currentTime = `${hours}:${minutes}`;

        try {
            const docRef = await addDoc(collection(db, "messages"), {
                sender_id: "{{ $sender_id }}",
                sender_type: "{{ $sender_type }}",
                text: text,
                timestamp: timestampInSeconds,
                day_of_week: currentDayOfWeek,
                current_time: currentTime,
                conversation_id: "{{ $conversation_id }}"
            });
            console.log("Document written with ID: ", docRef.id);
            textarea.value = '';
        } catch (error) {
            console.error("Error adding document: ", error);
        }
    }

    try {

        const querySnapshot = await getDocs(query(collection(db, 'messages'), where('conversation_id', '==',
            '{{ $conversation_id }}')));
        querySnapshot.forEach((doc) => {
            const messageData = doc.data();
            documentIds = querySnapshot.docs.map(doc => doc.id);
            messagesArray.push(messageData);
        });

        messagesArray.sort((a, b) => a.timestamp - b.timestamp);
        messagesArray.forEach((data) => {
            console.log(data);
            updateUIWithMessage(data);
        });


    } catch (error) {
        console.error('Error fetching data from Firestore:', error);
    }


    const fetchDataFromFirestore = async () => {
        try {
            const querySnapshot = await getDocs(collection(db, 'messages'), where('conversation_id', '==',
                '{{ $conversation_id }}'));
            let newDoc = [];
            let messageData = [];
            querySnapshot.forEach((doc, index) => {

                messageData.push(doc.data());
                newDoc = querySnapshot.docs.map(doc => doc.id);
            });

            if (newDoc.length === documentIds.length) {

            } else {
                console.log('not-same');

                messageData.sort((a, b) => a.timestamp - b.timestamp);
                messagesArray.sort((a, b) => a.timestamp - b.timestamp);
                console.log("Sorted array2:", messageData);
                console.log("Sorted array1:", messagesArray);
                let updatedArraylength = parseInt(newDoc.length) - parseInt(documentIds.length);

                const timestampsInArray1 = new Set(messagesArray.map(item => item.timestamp));

                const objectsNotInArray1 = messageData.filter(item => !timestampsInArray1.has(item.timestamp));

                // let newMessage = '';

                objectsNotInArray1.forEach((data) => {
                    messagesArray.push(data);
                    updateUIWithMessage(data);
                    // newMessage = data.text;
                    // sendRequestToShowNotifications(data);
                });

            }
            documentIds = newDoc;
        } catch (error) {
            console.error('Error fetching data from Firestore:', error);
        }

    };

    setInterval(fetchDataFromFirestore, 6000);

    function sendRequestToShowNotifications(data) {

        // if (data.sender_id != "{{ $sender_id }}") {
        const senderId = "New Message From" + `${data.sender_id}`;

        navigator.sendBeacon(
            `/send/notification?title=${senderId}&body=${data.text}`
        );
    }


    function updateUIWithMessage(messageData) {

        if (messageData.sender_id == "{{ $sender_id }}") {

            const messageOtherDiv = document.createElement('div');
            messageOtherDiv.classList.add('self-msg-div', 'mb-4');
            messageOtherDiv.innerHTML = `<p class = "bg-light card-p1 text-end" >${messageData.text}</p>`;
            messageOtherDiv.innerHTML +=
                `<p class = "mb-0 card-p1 text-end" >${messageData.day_of_week + " " + messageData.current_time}</p>`;
            const otherContainer = document.getElementById('messages-container');
            otherContainer.appendChild(messageOtherDiv);
            otherContainer.scrollTop = otherContainer.scrollHeight;
        } else {

            const messageDiv = document.createElement('div');
            messageDiv.classList.add('person-message-div', 'mb-4');

            const messageCard = document.createElement('div');
            messageCard.classList.add('treatment-card', 'df-start', 'w-100', 'mb-1');

            const cardBody = document.createElement('div');
            cardBody.classList.add('d-flex', 'align-items-center', 'justify-content-evenly', 'gap-4');

            const image = document.createElement('img');
            image.src = '{{ asset('front/assets/img/Memorial.svg') }}';
            image.alt = '';

            const messageText = document.createElement('div');
            messageText.classList.add('trmt-card-body', 'pe-4');
            messageText.innerHTML = `<h5 class="mb-0 text-end card-p1">${messageData.text}</h5>`;

            cardBody.appendChild(image);
            cardBody.appendChild(messageText);
            messageCard.appendChild(cardBody);

            const dayTime = document.createElement('div');
            dayTime.classList.add('day-time');
            dayTime.innerHTML = `<p class="mb-0 card-p1">${messageData.day_of_week+" "+messageData.current_time}</p>`;

            messageDiv.appendChild(messageCard);
            messageDiv.appendChild(dayTime);

            const container = document.getElementById('messages-container');
            container.appendChild(messageDiv);
            container.scrollTop = container.scrollHeight;
            // sendRequestToShowNotifications(messageData);
        }
    }
</script>
