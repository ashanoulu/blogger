<template>
    <div class="container container-padding">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input v-model="models.email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <div v-if="error.email" class=""><span style="color: red">{{error.email}}</span></div>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input v-model="models.password" type="password" class="form-control" id="password" placeholder="Password">
                        <div v-if="error.password" ><span style="color: red">{{error.password}}</span></div>
                    </div>
                    <button type="submit" class="btn btn-primary" @click.prevent="login">Submit</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SignUp",
        mounted() {
            if (localStorage.getItem("user")) {
                if(localStorage.getItem("token") == null){
                    localStorage.removeItem('user')
                }else{
                    this.$router.push({ name: "home" });
                }
            }
        },
        data(){
            return{
                models: {
                    email: '',
                    password: ''
                },
                error:{
                    email : '',
                    password: ''
                }
            }
        },
        methods: {
            login(){
                this.$auth.login({
                    params: {
                        email: this.models.email,
                        password: this.models.password
                    },
                    success: function(response) {
                        const redirectTo = "add-new-blog";
                        localStorage.setItem("user", JSON.stringify(response.data.user));
                        let t = setTimeout(
                            () => this.$router.push({ path: redirectTo }),
                            50000
                        );
                        clearTimeout(t);
                    },
                    error: function(error) {
                        console.log(error);
                    },
                    rememberMe: true,
                    fetchUser: true
                });

            },
            log() {
                let response = '';
                let data = response.data;
                if (response.data.status == 'success') {

                }else {
                    this.error.email = data.error;
                    this.error.password = data.error;
                }
            }
        }

    }
</script>

<style scoped>

</style>
