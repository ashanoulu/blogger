<template>
    <div>
        <div class="container container-padding">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <label>Blog By: <span>{{models.name}}</span></label><br>
                    <label>Title: <span>{{models.title}}</span></label><br>
                    <label>Category: <span>{{models.category}}</span></label><br>
                    <label>Age Group: <span>{{models.age_group}}</span></label><br>
                    <label>Introduction: </label><p>{{models.introduction}}</p><br>
                    <label>Description: </label><p>{{models.description}}</p><br>
                    <button v-if="loggedInUserId == models.user" class="btn btn-warning"><a :href="'/edit-post/' + models.id">Edit</a>

                    </button>
                    <button v-if="loggedInUserId == models.user" @click="deletePost" class="btn btn-danger">Delete</button>
                    <button class="btn btn-primary">Back</button>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ViewPost",
        created: function() {
            this.id = this.$route.params.post_id;
            this.loggedInUserId = this.getUserId();
        },
        mounted() {
            this.getPost();
        },
        data(){
            return {
                loggedInUserId: '',
                models: {
                    title:'',
                    category:'',
                    age_group:'',
                    introduction:'',
                    description:'',
                    id:'',
                    user:'',
                    name:''
                },
            }
        },
        methods: {
            getPost(){
                let self = this;
                self.axios.get('post/'+ this.$route.params.post_id).then(response => {
                    if (response.data.data){
                        self.models = response.data.data[0];
                    }
                });
            },

            deletePost(){
                let self = this;
                self.axios.delete('post/'+ this.models.id).then(response => {
                    if (response.data.data){
                        this.$swal('Successful !', 'You have successfully removed your idea.').then(function (e) {
                            if (e.value){
                                location.replace('/home');
                            }
                        })
                    }
                });
            }
        }
    }
</script>

<style scoped>

</style>
