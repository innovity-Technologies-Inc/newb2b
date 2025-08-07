importScripts('https://www.gstatic.com/firebasejs/9.6.10/firebase-app-compat.js');
importScripts('https://www.gstatic.com/firebasejs/9.6.10/firebase-messaging-compat.js');

firebase.initializeApp({
    apiKey: "AIzaSyDpyz07yb81sAJlZgWY-9KkF6-R9-8brM8",
    authDomain: "b2b-ecommerce-30f6a.firebaseapp.com",
    projectId: "b2b-ecommerce-30f6a",
    messagingSenderId: "464746571964",
    appId: "1:464746571964:web:484200847c66ae2f7d88b9",
});

const messaging = firebase.messaging();

messaging.onBackgroundMessage(function(payload) {
    console.log('[firebase-messaging-sw.js] Background message received:', payload);

    self.registration.showNotification(payload.notification.title, {
        body: payload.notification.body
    });

    // Optional: send to Laravel backend
    fetch('/store-notification', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
            title: payload.notification.title,
            body: payload.notification.body
        })
    });
});
