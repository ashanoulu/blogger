import Login from "./components/Login";
import Posts from "./components/Posts";
import SignUp from "./components/SignUp";
import BlogAdd from "./components/BlogAdd";
import ViewPost from "./components/ViewPost";


export const routes = [
    {
        path: '/sign-up',
        name: 'sign-up',
        meta: {layout: 'sign-up'},
        component: SignUp
    },
    {
        path: '/',
        name: 'sign-up',
        meta: {layout: 'sign-up'},
        component: SignUp
    },
    {
        path: '/login',
        name: 'login',
        meta: {layout: 'login'},
        component: Login
    },
    {
        path: '/home',
        name: 'home',
        meta: {layout: 'home'},
        component: Posts
    },
    {
        path: '/my-posts/:user_id',
        name: 'home',
        meta: {auth : true, layout: 'home'},
        component: Posts
    },
    {
        path: '/new-post',
        name: 'blog-add',
        meta: {auth : true, layout : 'blog-add'},
        component: BlogAdd
    },
    {
        path: '/view-post/:post_id',
        name: 'view-post',
        meta: {auth : true, layout : 'view-post'},
        component: ViewPost
    },
    {
        path: '/edit-post/:post_id',
        name: 'blog-add',
        meta: {auth : true, layout : 'blog-add'},
        component: BlogAdd
    },
];

