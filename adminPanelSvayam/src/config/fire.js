import firebase from 'firebase';

var firebaseConfig = {
        apiKey: "AIzaSyDhMAKiFRdHDeHAZ6QXCpZwA9VEK6n0dfQ",
        authDomain: "svayamcab-abe84.firebaseapp.com",
        databaseURL: "https://svayamcab-abe84-default-rtdb.firebaseio.com",
        projectId: "svayamcab-abe84",
        storageBucket: "svayamcab-abe84.appspot.com",
        messagingSenderId: "764585313001",
        appId: "1:764585313001:web:111189ef7a9ab51457a678",
        measurementId: "G-N616QWSCGE"
    };
const fire = firebase.initializeApp(firebaseConfig);

export default fire;