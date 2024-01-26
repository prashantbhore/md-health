@php
    $user = Session::get('user');
    if (Session::has('MDMedicalProvider*%')) {
        $sender_type = 'medicalprovider';
    } elseif (Session::has('MDCustomer*%')) {
        $sender_type = 'customer';
    }
    $sender_id = $user->id;
@endphp

<!-- Insert this script at the bottom of the HTML, but before you use any Firebase services -->
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
        getDocs
    } from 'https://www.gstatic.com/firebasejs/10.7.2/firebase-firestore.js'
    import {
        getMessaging,
        getToken,
        onMessage,
        // onBackgroundMessage
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

    const app = initializeApp(firebaseConfig);
    const db = getFirestore(app);

    ///////////////////////////////////////push notifications////////////////////////////////

    // Get registration token. Initially this makes a network call, once retrieved
    // subsequent calls to getToken will return from cache.
    const messaging = getMessaging();
    getToken(messaging, {
        vapidKey: 'BALWd3VwOcsTfiTfPPcVcVCUkMRVhGB88TVOhmIg2A9gNJzA6NJ_kltn9NxNSildp_8tARwffCERCxIbCWYCPyM'
    }).then((currentToken) => {
        if (currentToken) {
            // Send the token to your server and update the UI if necessary
            // ...
            console.log(currentToken);
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
        console.log('Message received. ', payload);
        // ...
    });

    ///////////////////////////////////////push notifications////////////////////////////////

    const docId = '';
    let messagesArray = [];
    let documentIds = [];
    let lastMessageTimestamp = 0; // Track the timestamp of the last processed message


    const textarea = document.getElementById('productstext');
    const sendButton = document.getElementById('sendMessageButton');

    // Add event listener to send button
    sendButton.addEventListener('click', sendMessage);

    // Add event listener to handle enter key press in textarea
    textarea.addEventListener('keydown', function(event) {
        if (event.key === 'Enter' && !event.shiftKey) { // Check if Enter key is pressed without Shift key
            event.preventDefault(); // Prevent default Enter behavior (line break in textarea)
            sendMessage(); // Call sendMessage function
        }
    });
    
    // Function to send message
    async function sendMessage() {
        const text = textarea.value.trim(); // Get the text from the textarea and remove leading/trailing whitespace
        if (text === '') {
            return; // Do nothing if the textarea is empty
        }

        const timestampInSeconds = Math.floor(Date.now() / 1000);

        // Get current day of the week (e.g., "Monday", "Tuesday", etc.)
        const daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        const currentDayOfWeek = daysOfWeek[new Date().getDay()];

        // Get current time in 24-hour format (HH:MM)
        const currentTime = new Date().toLocaleTimeString('en-US', {
            hour12: false
        });

        try {
            const docRef = await addDoc(collection(db, "messages"), {
                sender_id: "{{ $sender_id }}",
                sender_type: "{{ $sender_type }}",
                text: text,
                timestamp: timestampInSeconds,
                dayOfWeek: currentDayOfWeek,
                currentTime: currentTime
            });
            console.log("Document written with ID: ", docRef.id);
            // Optionally, you can clear the textarea after sending the message
            textarea.value = ''; // Clear the textarea
        } catch (error) {
            console.error("Error adding document: ", error);
        }
    }


    // try {
    //     const querySnapshot = await getDocs(collection(db, 'messages'));
    //     querySnapshot.forEach((doc) => {
    //         // Process data and decide whether to send notifications
    //         const messageData = doc.data();
    //         messagesArray.push(messageData); // Store data in the array

    //         // Update UI with new message
    //         updateUIWithMessage(messageData)
    //     });
    // } catch (error) {
    //     console.error('Error fetching data from Firestore:', error);
    // }

    try {
        let messages = [];
        const querySnapshot = await getDocs(collection(db, 'messages'));
        querySnapshot.forEach((doc) => {
            const messageData = doc.data();
            // const messageTimestamp = doc.id;
            // const documentId = doc.id;
            messages.push(doc.data());
            documentIds = querySnapshot.docs.map(doc => doc.id);
            // console.log(messageTimestamp,lastMessageTimestamp) // Assuming you have a timestamp field in your Firestore document
            // if (messageTimestamp == lastMessageTimestamp) {
            // Process only new messages
            messagesArray.push(messageData);
            updateUIWithMessage(messageData);
            // lastMessageTimestamp = messageTimestamp; // Update last message timestamp
            // }
        });
        console.log(messages.length)
        console.log(messages[messages.length - 1].text);
        messagesArray.forEach((data) => {
            console.log(data.timestamp);
        });
    } catch (error) {
        console.error('Error fetching data from Firestore:', error);
    }


    const fetchDataFromFirestore = async () => {
        try {
            const querySnapshot = await getDocs(collection(db, 'messages'));
            let newDoc = [];
            let messageData = [];
            querySnapshot.forEach((doc, index) => {
                messageData.push(doc.data());
                // const messageTimestamp = doc.id;
                // const documentId = doc.id;
                newDoc = querySnapshot.docs.map(doc => doc.id);
                // documentIds.forEach((lastDocId ,index)=>{
                //     console.log("start",lastDocId, " end",doc.id);
                //     if(lastDocId !== doc.id){
                // messagesArray.push(messageData);
                //         // updateUIWithMessage(messageData);
                //     }
                // });

                // documentIds = querySnapshot.docs.map(doc => doc.id);
                // console.log(messageTimestamp,lastMessageTimestamp) // Assuming you have a timestamp field in your Firestore document
                // if (messageTimestamp == lastMessageTimestamp) {
                // Process only new messages


                // lastMessageTimestamp = messageTimestamp; // Update last message timestamp
                // }
            });
            // console.log(newDoc.length," ",documentIds.length)
            if (newDoc.length === documentIds.length) {

            } else {
                console.log('not-same');


                messageData.sort((a, b) => a.timestamp - b.timestamp);
                messagesArray.sort((a, b) => a.timestamp - b.timestamp);
                console.log("Sorted array2:", messageData);
                console.log("Sorted array1:", messagesArray);
                let updatedArraylength = parseInt(newDoc.length) - parseInt(documentIds.length);

                const timestampsInArray1 = new Set(messagesArray.map(item => item.timestamp));

                // Filter array2 to get objects whose timestamp is not in array1
                const objectsNotInArray1 = messageData.filter(item => !timestampsInArray1.has(item.timestamp));

                console.log("Objects in array2 not present in array1:", objectsNotInArray1);

                objectsNotInArray1.forEach((data) => {
                    messagesArray.push(data);
                    updateUIWithMessage(data);
                })


                // console.log(updatedArraylength);
                // for (let i = 1; i <= updatedArraylength; i++) {
                // console.log("document_list_lenght: ", (documentIds.length - 1) + i, "message_list_lenght: ",
                // messageData.length);
                // messageData.forEach((data,index) => {
                //     console.log(data.timestamp+" "+documentIds[index]);
                // });
                // documentIds.push(newDoc[(documentIds.length - 1) + i]);
                // console.log((documentIds.length - 1) + i);
                // console.log(messageData[(documentIds.length - 2) + i].text);
                // messagesArray.push(messageData[(documentIds.length - 2) + i]);
                // updateUIWithMessage(messageData[(documentIds.length - 2) + i]);
                // }

                // Create a map from array2 using timestamps as keys
                // const timestampMap = new Map(messageData.map(item => [item.timestamp, item.text]));

                // Find the extra timestamp and corresponding text from array2
                // const extraTimestamps = messagesArray.filter(item => !timestampMap.has(item.timestamp));

                // Output the extra timestamps and corresponding texts
                // extraTimestamps.forEach(item => {
                //     console.log("Extra timestamp:", item.timestamp);
                //     console.log("Corresponding text:", item.text);
                // });
            }
            documentIds = newDoc;
        } catch (error) {
            console.error('Error fetching data from Firestore:', error);
        }

    };


    // Send notification using Firebase Cloud Messaging

    // Construct notification payload
    // onBackgroundMessage(messaging, (payload) => {
    //     console.log('[firebase-messaging-sw.js] Received background message ', payload);
    //     // Customize notification here
    //     const notificationTitle = 'Background Message Title';
    //     const notificationOptions = {
    //         body: 'Background Message body.',
    //         icon: '/firebase-logo.png'
    //     };

    //     self.registration.showNotification(notificationTitle,
    //         notificationOptions);
    // });


    // Fetch data from Firestore periodically
    setInterval(fetchDataFromFirestore, 600);



    function updateUIWithMessage(messageData) {
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
        dayTime.innerHTML = `<p class="mb-0 card-p1">${messageData.dayOfWeek+" "+messageData.currentTime}</p>`;

        messageDiv.appendChild(messageCard);
        messageDiv.appendChild(dayTime);

        // Append the messageDiv to a container in your UI
        const container = document.getElementById('messages-container');
        container.appendChild(messageDiv);
    }
</script>
