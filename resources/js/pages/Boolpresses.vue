<template>
 <div>
      <div class="container-fluid">
          <div class="row">
              <div class="col">
                  <h1>POSTS</h1>
              </div>
          </div>
          <Main :cards="cards"></Main>
      </div>
  </div>
</template>

<script>
import Main from '../components/Main.vue';
import Axios from "axios";
export default {
    name: 'Boolpresses',
    components: {
      Main,
    },
     data() {
        return {
            cards: {
                boolpress: null,
            }
           
        }
    },
     created(){
          Axios.get('http://127.0.0.1:8000/api/boolpress').then(
            (result) => {
              this.cards.boolpress= result.data.results.data;
              
            });
     },

}
</script>

<style>

</style>