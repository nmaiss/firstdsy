<template>
    <div>
        <b-table hover :items="recensements" :fields="fields"></b-table>
    </div>
</template>

<script>
    import firebase from "firebase/app";
    import "firebase/firestore";

    var firebaseConfig = {
      apiKey: "AIzaSyBNy0ACkgptaPQTy__843Xjg3zXykSmP94",
      authDomain: "firstday-c4487.firebaseapp.com",
      databaseURL: "https://firstday-c4487-default-rtdb.europe-west1.firebasedatabase.app",
      projectId: "firstday-c4487",
      storageBucket: "firstday-c4487.appspot.com",
      messagingSenderId: "1071340845805",
      appId: "1:1071340845805:web:5d2e8b2eaa8734c20b6ae4"
    };

    const firebaseApp = firebase.initializeApp(firebaseConfig);
    const db = firebase.firestore();

    export default{
        data: function() {
             return {
                 fields: [
                   {
                     key: 'reference',
                     label: 'Référence',
                   },
                   {
                     key: 'horodateur',
                     label: 'Horodateur',
                   },
                   {
                     key: 'recensementDate',
                     label: 'Date de recensement',
                   },
                   {
                     key: 'childHour',
                     label: 'Heure de naissance',
                   },
                   {
                     key: 'childDate',
                     label: 'Date de naissance',
                   },
                   {
                     key: 'month',
                     label: 'Mois',
                   },
                   {
                     key: 'year',
                     label: 'Années',
                   },
                   {
                     key: 'prefecture',
                     label: 'Préfécture',
                   },
                   {
                     key: 'ville',
                     label: 'Ville',
                   },
                   {
                     key: 'fatherLastName',
                     label: 'Nom Père',
                   },
                   {
                     key: 'fatherFirstName',
                     label: 'Prénom Père',
                   },
                   {
                     key: 'motherLastName',
                     label: 'Nom Mère',
                   },
                   {
                     key: 'motherFirstName',
                     label: 'Prénom Mère',
                   },
                   {
                     key: 'childSexe',
                     label: 'Sexe',
                   },
                   {
                     key: 'childLastName',
                     label: 'Nom',
                   },
                   {
                     key: 'childFirstName',
                     label: 'Prénom',
                   },
                   {
                     key: 'childNames',
                     label: 'Prénoms secondaires',
                   },
                   

                 ],
                 recensements: [],
              }
          },
        mounted(){
            db.collection("children").get().then((querySnapshot) => {
                querySnapshot.forEach((doc) => {
                    this.recensements.push(doc.data());
                });
            });
        },
        props: ['agents'],
    }
</script>
