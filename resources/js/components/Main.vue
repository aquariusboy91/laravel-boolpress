<template>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col" v-for="(item, index) in boolpress" :key="index">
                <div class="card">
                    <img :src="'/storage/'+item.image" class="card-img-top" :alt="item.name">
                <div class="card-body">
                    <h5 class="card-title">{{ item.name }}</h5>
                    <p class="card-text">{{ item.description }}</p>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Axios from "axios";

 export default {
    name: "Main",
    data() {
        return {
            boolpress: null,
        }
    },
    created() {
      this.getBoolpress('http://127.0.0.1:8000/api/boolpress');
    },
     methods: {
          getBoolpress(){
          Axios.get().then(
            (result) => {
              this.boolpress = result.data.results.data;
            });
      }
     }
 }

</script>





<style lang="scss" scoped>

</style>