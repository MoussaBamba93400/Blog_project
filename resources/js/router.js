import { createWebHistory, createRouter } from "vue-router";
import Home from './pages/Home.vue';
import Login from './pages/Login.vue';
import Register from './pages/Register.vue';
import Comment from './pages/Comment.vue';



const routes = [
    {
        path: '/',
        name: "Home",
        component: Home
    },  
    {
        path: '/login',
        name: "Login",
        component: Login
    },
    {
        path: '/register',
        name: "Register",
        component: Register
    },
    {
        path: '/comment',
        name: "Comment",
        component: Comment
    },
    
];

const router = createRouter({
    history: createWebHistory(),
    routes
});


export default router;