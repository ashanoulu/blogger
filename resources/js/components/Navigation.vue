<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
                </li>
                <li v-if="!user_id" class="nav-item">
                    <a class="nav-link" href="login">Login</a>
                </li>
<!--                <li class="nav-item dropdown">-->
<!--                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                        Dropdown-->
<!--                    </a>-->
<!--                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
<!--                        <a class="dropdown-item" href="#">Action</a>-->
<!--                        <a class="dropdown-item" href="#">Another action</a>-->
<!--                        <div class="dropdown-divider"></div>-->
<!--                        <a class="dropdown-item" href="#">Something else here</a>-->
<!--                    </div>-->
<!--                </li>-->
                <li v-if="!user_id" class="nav-item">
                    <a class="nav-link" href="sign-up">Sign up</a>
                </li>
                <li v-if="user_id" class="nav-item">
                    <a class="nav-link" href="new-post">Add New Post</a>
                </li>
                <li v-if="user_id" class="nav-item">
                    <a class="nav-link" :href="'/my-posts/' + user_id">My Posts</a>
                </li>
            </ul>
            <span v-if="user_id" class="navbar-text">
                    Hi {{name}}
            </span>
            <span v-if="user_id">
                    <button @click="logOut">Log Out</button>
            </span>
        </div>
    </nav>
</template>

<script>
    export default {
        name: "Navigation",
        mounted() {
            this.name = this.getUserName();
            this.user_id = this.getUserId();
        },
        data(){
            return {
                name: '',
                user_id:''
            }
        },
        methods: {
            logOut(){
                this.$auth.logout({
                    makeRequest: true,
                    success() {
                        console.log('success ' + this.context);
                    },
                    error() {
                        console.log('error ' + this.context);
                    }
                })
            }
        }
    }
</script>

<style scoped>

</style>
