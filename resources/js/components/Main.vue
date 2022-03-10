<template>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col" v-for="(item,index) in boolpress" :key="index">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ item.title }}</h5>
                        <p class="card-text">{{ item.content }}</p>
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
     created(){
          Axios.get('http://127.0.0.1:8000/api/boolpress').then(
            (result) => {
              this.boolpress = result.data.results.data;
              console.log(this.boolpress)
            });
     },
 }

</script>





<style lang="scss" scoped>

</style>