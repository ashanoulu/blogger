import bearer from '@websanova/vue-auth/drivers/auth/bearer'
import axios from '@websanova/vue-auth/drivers/http/axios.1.x'
import router from '@websanova/vue-auth/drivers/router/vue-router.2.x'


const config = {
    auth: bearer,
    http: axios,
    router: router,
    tokenDefaultName: 'token',
    tokenStore: ['localStorage'],
    /*rolesVar: 'role',*/
    registerData: {url: 'auth/register', method: 'POST', redirect: '/login'},
    loginData: {url: 'login', method: 'POST', redirect: '/home', fetchUser: true},
    logoutData: {url: 'logout', method: 'POST', redirect: '/login', makeRequest: true},
    fetchData: {url: 'user', method: 'GET', enabled: true},
    refreshData: {url: 'refresh', method: 'GET', enabled: true, interval:30 },
    authRedirect: { path: '/' },
    parseUserData(response){
        let data = response.data;
        console.log(data);
        data.refresh = response.refresh_token;
        localStorage.setItem("user", JSON.stringify(data));
        return data;
    }
}

export default config
