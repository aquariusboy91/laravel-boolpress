<template>
 <div class="container">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ boolpress.title }}</h5>
                        <p class="card-text">{{ boolpress.content }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Axios from "axios";
export default {
    name: 'Boolpress',
    props: ['id'],

    data() {
        return {
                boolpress: null,
           
        }
    },
      created(){
          Axios.get('http://127.0.0.1:8000/api/boolpress/' + this.id).then(
            (result) => {
              this.boolpress= result.data.results.data;
              
            });
     },
}

</script>

<style lang="scss">

</style>