<template>
    <div>
        <b-table hover
          :items="agents"
          :fields="fields"
          :sort-by="sortBy"
          :sort-desc.sync="sortDesc"
          primary-key="a"
          sort-icon-left
          responsive="sm"
        >
            <template slot="top-row" slot-scope="{ fields }">
              <td v-for="field in fields" :key="field.key">
                <input v-if="field.key == 'prefecture'" v-model="newPrefecture">
                <input v-if="field.key == 'city'" v-model="newVille">
                <input v-if="field.key == 'password'" v-model="newPassword">
                <input type="button" v-if="field.key == 'agent'" value="Ajouter" v-on:click="newAgent">
              </td>
            </template>

            <template #thead-top="data">
              <b-tr>
                <b-th class="new-element">{{ newPrefecture }}</b-th>
                <b-th class="new-element">{{ newVille }}</b-th>
                <b-th class="new-element">{{ newPassword }}</b-th>
                <b-th class="new-element">{{ agentId }}</b-th>
                <b-th class="new-element"></b-th>
              </b-tr>
            </template>

            <template #cell(delete)="data">
              <a :href='"/database/" +  data.item.id + "/delete"'>Supprimer</a>
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
                  var nb = 1;
                  firebase.firestore().collection("agents/" + this.newPrefecture + "/" + this.newVille + "/").get().then((querySnapshot) => {
                        querySnapshot.forEach((doc) => {
                            nb++;
                        });
                        this.agentId = this.newPrefecture.substr(0, 3) + this.newVille.substr(0, 3) + "0" + nb.toString();
                        firebase.auth().createUserWithEmailAndPassword(this.agentId + "@mail.com", this.newPassword)
                           .catch(function (err) {
                             console.log(err)
                           });

                       firebase.firestore().collection("agents/" + this.newPrefecture + "/" + this.newVille + "/").add({
                           agent: this.agentId,
                           password: this.newPassword,
                       })

                       firebase.firestore().collection("agents/").add({
                           agent: this.agentId,
                           password: this.newPassword,
                           prefecture: this.newPrefecture,
                           city: this.newVille,
                       })

                        axios.post('/api/database/store', {password: this.newPassword, prefecture: this.newPrefecture, city: this.newVille, agent: this.agentId})
                            .then(
                                console.log("sucess")
                            ).catch(err => {
                            console.log(err)
                        })
                    });
              }
          }
        },
        data(){
            return {
                newPrefecture: '',
                newVille: '',
                newPassword: '',
                agentId: '',
                sortBy: 'agent',
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
                  {
                      key: 'delete',
                      label: 'SUPPRIMER'
                  },
                ],
            }
        },
    }
</script>
