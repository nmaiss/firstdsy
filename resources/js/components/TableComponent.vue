<template>
    <div>
        <b-table hover
          :items="agents"
          :fields="fields"
          :sort-by="sortBy"
          :sort-desc.sync="sortDesc"
          primary-key="a"
        >
            <template slot="top-row" slot-scope="{ fields }">
              <td v-for="field in fields" :key="field.key">
                <input v-if="field.key == 'prefecture'" v-model="newPrefecture">
                <input v-if="field.key == 'city'" v-model="newVille">
                <input v-if="field.key == 'password'" v-model="newPassword">
                <input type="button" v-if="field.key == 'agent'" value="Ajouter" v-on:click="newAgent">
              </td>
            </template>
        </b-table>
    </div>
</template>

<script>
    import firebase from "firebase/app";
    import "firebase/firestore";

    var firebaseui = require('firebaseui');


    export default{
        props: ['agents'],
        methods: {
          newAgent: function (event){
              if (this.newPassword != '' && this.newPassword != '' && this.newPrefecture != ''){
                  this.agentId = this.newPrefecture.substr(0, 3) + this.newVille.substr(0, 3) + "01"
                  firebase.auth().createUserWithEmailAndPassword(this.agentId + "@mail.com", this.newPassword)
                     .catch(function (err) {
                       console.log(err)
                     });
                  axios.post('/api/database/store', {password: this.newPassword, prefecture: this.newPrefecture, city: this.newVille, agent: this.agentId})
                      .then(
                          console.log("sucess")
                      ).catch(err => {
                      console.log(err)
                  })
              }
          }
        },
        data(){
            return {
                newPrefecture: '',
                newVille: '',
                newPassword: '',
                agentId: '',
                sortBy: 'prefecture',
                sortDesc: true,
                fields: [
                  {
                    key: 'prefecture',
                    label: 'PREFECTURE',
                    sortable: true
                  },
                  {
                    key: 'city',
                    label: 'VILLE',
                    sortable: true
                  },
                  {
                    key: 'password',
                    label: 'MOT DE PASSE',
                    sortable: true,
                  },
                  {
                    key: 'agent',
                    label: 'AGENT',
                    sortable: true,
                  },
                ],
            }
        },
    }
</script>
