<template>
    <div class="main-div">
        <Header>
        <navigation></navigation>
            </Header>
        <router-view></router-view>
        <Footer></Footer>

    </div>

</template>

<script>
    import Navigation from "../components/Navigation";
    import Footer from "../components/Footer";

    export default {
        name: "App",
        components: {Footer, Navigation}
    }
</script>
<style>
.main-div{position: relative;}
    .footer{position:fixed;
    bottom:0px;
    }

    .container-padding{padding-bottom : 60px;}
</style>
