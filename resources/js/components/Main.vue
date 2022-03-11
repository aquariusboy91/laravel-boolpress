<template>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col" v-for="(item,index) in cards.boolpress" :key="index">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ item.title }}</h5>
                        <p class="card-text">{{ item.content }}</p>
                    </div>
                    <router-link class="btn btn-info" 
            :to="{ name: 'boolpress', params: { id: item.id } }">
            View</router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

 export default {
    name: "Main",
    props: ['cards']
 }

</script>





<style lang="scss" scoped>

</style>