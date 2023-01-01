export default {
    methods: {
        getLoggedInUser() {
            let self = this;
            self.axios.get('/user').then(response => {
                localStorage.setItem("user", JSON.stringify(response.data.data));
            });

            return localStorage.getItem("user");
        },

        getUserId(){
            let self = this;
            let user = JSON.parse(self.getLoggedInUser());
            return user.id;
        },

        getUserName(){
            let self = this;
            let user = JSON.parse(self.getLoggedInUser());
            return user.name;
        }

    }
}
