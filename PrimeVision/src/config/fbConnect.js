// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

import { getDatabase, ref } from "firebase/database";

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyDq1TMTAjALWu12H5Twq-IrSOHkVH_ZN3o",
  authDomain: "pradeep-vision.firebaseapp.com",
  databaseURL: "https://pradeep-vision-default-rtdb.firebaseio.com",
  projectId: "pradeep-vision",
  storageBucket: "pradeep-vision.appspot.com",
  messagingSenderId: "145945500467",
  appId: "1:145945500467:web:2e9956502c9ce26102fc46"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
export const db = getDatabase(app);

export function getDbRef (path) {
    // Path like user/Pradeep/Mobile
    return ref(db, path);
}