<template>
    <div class="container container-padding">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form>
                    <div class="form-group">
                        <label for="title">Title<span style="color: red">*</span></label>
                        <input v-model="models.title" type="text" class="form-control" id="title" placeholder="Title ..">
                    </div>
                    <div class="form-group">
                        <label for="type">Category<span style="color: red">*</span></label>
                        <select @change="getAgeGroups" v-model="models.category" class="form-control" id="type">
                            <option value="" >--Select One --</option>
                            <option v-for="(category, key) in categories" :value="category.id">{{category.name}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="age-cat">Age Group<span style="color: red">*</span></label>
                        <select v-model="models.age_group" class="form-control" id="age-cat">
                            <option value="">--Select One --</option>
                            <option v-for="(age_group, key) in age_groups" :value="age_group.age_groups.id">{{age_group.age_groups.name}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="intro">Introduction<span style="color: red">*</span></label>
                        <textarea v-model="models.introduction" class="form-control" id="intro" rows="3" maxlength="500"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="desc">Full Description<span style="color: red">*</span></label>
                        <textarea v-model="models.description" class="form-control" id="desc" rows="10"></textarea>
                    </div>
                    <button class="btn btn-primary" @click.prevent="createBlogPost">Save Blog Post</button>
                    <button class="btn btn-success" @click.prevent="backToHome" >Back</button>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BlogAdd",
        mounted() {
            this.getCategories();
            this.setDataForEditMode();
        },
        data(){
            return{
                categories:[],
                age_groups:[],
                is_edit_mode: '',
                models: {
                    id:'',
                    title:'',
                    category:'',
                    age_group:'',
                    introduction:'',
                    description:'',
                },
                error: {
                    title:'',
                    type:'',
                    age:'',
                    introduction:'',
                    description:'',
                }
            }

        },
        methods: {
            getCategories(){
                let self = this;
                self.axios.get('categories').then(response=>{
                    if (response.data){
                        self.categories = response.data.data;
                    }
                });
            },

            setDataForEditMode(){
                let self = this;
                if (self.$route.params.post_id){
                    self.is_edit_mode = true;
                    self.axios.get('post/'+ this.$route.params.post_id + '/edit').then(response => {
                        if (response.data.data){
                            self.models = response.data.data[0];
                            this.getAgeGroups();
                        }
                    });
                }
            },

            createBlogPost(){
                let self = this;
                if (self.is_edit_mode){
                    self.axios.put('post/' + self.models.id, self.models).then(response=>{
                        if (response.data.data){
                            this.$swal('Successful !', 'Your idea has posted!').then(function (e) {
                                if (e.value){
                                    self.clearForm();
                                    self.backToHome();
                                }
                            });


                        } else {
                            this.$swal('Error !', 'Something went wrong, Please try again ');
                        }
                    });
                } else {
                    self.axios.post('new-post', self.models).then(response=>{
                        if (response.data.data){
                            this.$swal('Successful !', 'Your idea has posted!');
                            this.clearForm();
                        } else {
                            this.$swal('Error !', 'Something went wrong, Please try again ');
                        }
                    });
                }
            },

            backToHome(){
                location.replace('/home');
            },

            getAgeGroups(){
                let self = this;
                self.axios.get('age-groups' + '/' + self.models.category).then(response=>{
                    if (response.data){
                        self.age_groups = response.data.data;
                    }
                });
            },

            clearForm(){
                this.models.title = '';
                this.models.category = '';
                this.models.age_group = '';
                this.models.introduction = '';
                this.models.description = '';
                this.error = {};
                this.age_groups = [];
            }

        }
    }
</script>

<style scoped>

</style>
