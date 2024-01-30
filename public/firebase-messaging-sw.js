function requestPermission() {
  console.log('Requesting permission...');
  Notification.requestPermission().then((permission) => {
      if (permission === 'granted') {
          console.log('Notification permission granted.');
      }
  });
}
importScripts(
    "https://www.gstatic.com/firebasejs/10.0.0/firebase-app-compat.js"
);
importScripts(
    "https://www.gstatic.com/firebasejs/10.0.0/firebase-messaging-compat.js"
);

firebase.initializeApp({
    apiKey: "AIzaSyCi9vOusfNsRY2NgWUk8fDOjri9L8dALY8",
    authDomain: "sweedesinew.firebaseapp.com",
    databaseURL: "https://sweedesinew.firebaseio.com",
    projectId: "sweedesinew",
    storageBucket: "sweedesinew.appspot.com",
    messagingSenderId: "537186381446",
    appId: "1:537186381446:web:777955e71e5e61c8d62b07"
});

const messaging = firebase.messaging();

messaging.onBackgroundMessage(({ notification }) => {
    console.log("[firebase-messaging-sw.js] Received background message ");
    // Customize notification here
    const notificationTitle = notification.title;
    const notificationOptions = {
        body: notification.body,
    };

    if (notification.icon) {
        notificationOptions.icon = notification.icon;
    }

    self.registration.showNotification(notificationTitle, notificationOptions);
});