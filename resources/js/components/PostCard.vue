<template>
    <div>
        <div v-for="(post, key ) in allPosts" class="card" style="width: 18rem;">
            <img class="card-img-top"  alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{post.title}}</h5>
                <p class="card-text">{{post.introduction}}</p>
                <router-link :to="{name: 'view-post', params:{post_id : post.id}}"><a href="#" class="btn btn-primary">Show more</a></router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PostCard",
        props: [
            'allPosts'
        ],

        data(){
            return {
                allPosts: [],
                models: {}
            }
        },

        watch: {
            allPosts: function (value) {
                this.allPosts = value;
            }
        },

        mounted() {
        },
        methods: {

        }
    }
</script>

<style scoped>

</style>
