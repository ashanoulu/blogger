<template>
    <div class="container container-padding">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form>
                    <div class="form-group">
                        <label for="full-name">Full Name</label>
                        <input class="form-control" v-model="models.name" id="full-name" placeholder="Enter Full Name" type="text">
                        <div v-if="errors.name" ><span style="color: red">{{errors.name}}</span></div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input class="form-control" v-model="models.email" id="email" placeholder="Enter Email" type="email">
                        <div v-if="errors.email" ><span style="color: red">{{errors.email}}</span></div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" v-model="models.password" id="password" placeholder="Password" type="password">
                        <div v-if="errors.password" ><span style="color: red">{{errors.password}}</span></div>
                    </div>
                    <button @click.prevent="createAccount" class="btn btn-primary">Create My Account</button>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</template>

<script>
    // import router from "../routes";

    export default {
        name: "SignUp",
        mounted() {
        },
        data() {
            return {
                models:{
                    name:'',
                    email:'',
                    password:''
                },
                errors:{
                    name:'',
                    email:'',
                    password:''
                }
            }
        },
        methods: {
            createAccount(){
                let self = this;
                const redirectTo = "/login";
                self.axios.post("register", self.models).then(response =>{
                    if (response.data.token ){
                        this.swal('Success !', 'You have created your account successfully ').then(function (e) {
                            if (e.value){
                                location.replace(redirectTo);
                            }
                        });

                    } else {
                        self.errors.name = response.data.data.errors.validations.name[0];
                        self.errors.email = response.data.data.errors.validations.email[0];
                        self.errors.password = response.data.data.errors.validations.password[0];
                    }
                });
            }
        }

    }
</script>
