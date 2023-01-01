<template>
<div class="container container-padding">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <PostCard v-bind:allPosts="all_posts"></PostCard>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
</template>

<script>
    import PostCard from "./PostCard";
    export default {
        components: {PostCard},
        mounted() {
            this.user_id = this.getUserId();
            this.getAllPosts();
        },
        data(){
            return {
                user_id: '',
                all_posts : [],
            }
        },
        methods: {
            getAllPosts(){
                let self = this;
                if (self.$route.params.user_id){
                    self.axios.get('posts/' + self.user_id).then(response=>{
                        if (response.data.data){
                            self.all_posts = response.data.data;
                        }
                    });
                } else {
                    self.axios.get('posts').then(response=>{
                        if (response.data.data){
                            self.all_posts = response.data.data;
                        }
                    });
                }

            }
        }
    }
</script>

<style scoped>

</style>
