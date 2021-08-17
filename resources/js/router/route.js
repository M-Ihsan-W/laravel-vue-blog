import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

// Import Component
import Home from '../pages/users/Home.vue';
import About from '../pages/users/About.vue';
import Post from '../pages/users/Posts.vue';
import PostCategory from '../pages/users/PostCategory.vue';
import DetailPost from '../pages/users/DetailPost.vue';
import PageNotFound from '../pages/users/PageNotFound.vue';
// Admin
import Register from '../pages/admin/Register.vue';
import Login from '../pages/admin/Login.vue';
import Dashboard from '../pages/admin/Dashboard.vue';
import Blog from '../pages/admin/Blog.vue';
import PostCreate from '../pages/admin/PostCreate.vue';
import PostUpdate from '../pages/admin/PostUpdate.vue';

const routes = [
  {
    name: 'home',
    path: '/',
    meta: {
      title: 'Blog | Home'
    },
    component: Home
  },
  {
    name: 'about',
    path: '/about',
    meta: {
      title: 'Blog | About'
    },
    component: About
  },
  {
    name: 'post',
    path: '/posts',
    meta: {
      title: 'Blog | Posts'
    },
    component: Post
  },
  {
    name: 'PostCategory',
    path: '/posts/category/:category?',
    meta: {
      title: 'Blog | Posts'
    },
    component: PostCategory,
    props: true,
  },
  {
    name: 'detail',
    path: '/posts/:slug',
    meta: {
      title: 'Blog | Posts'
    },
    props: true,
    component: DetailPost
  },
  {
    name: 'login',
    path: '/login',
    component: Login,
    meta: {
      title: 'Admin | Login',
    }
  },
  {
    path: '/register',
    component: Register,
    meta: {
      title: 'Admin | Register',
    }
  },
  {
    name: 'dashboard',
    path: '/admin/dashboard',
    component: Dashboard,
    meta: {
      title: 'Admin | Login',
    },
    beforeEnter: (to, from, next) => {
      axios.get('/api/authenticated').then(() => {
        next();
      }).catch(() => {
        return next({ name: 'login' });
      });
    }
  },
  {
    name: 'AdminBlog',
    path: '/admin/blog',
    component: Blog,
    meta: {
      title: 'Admin | Login',
    },
    beforeEnter: (to, from, next) => {
      axios.get('/api/authenticated').then(() => {
        next();
      }).catch(() => {
        return next({ name: 'login' });
      });
    }
  },
  {
    name: 'CreatePost',
    path: '/admin/blog/create',
    component: PostCreate,
    meta: {
      title: 'Admin | Login',
    },
    beforeEnter: (to, from, next) => {
      axios.get('/api/authenticated').then(() => {
        next();
      }).catch(() => {
        return next({ name: 'login' });
      });
    }
  },
  {
    name: 'UpdatePost',
    path: '/admin/blog/update/:id',
    component: PostUpdate,
    meta: {
      title: 'Admin | Login',
    },
    props: true,
    beforeEnter: (to, from, next) => {
      axios.get('/api/authenticated').then(() => {
        next();
      }).catch(() => {
        return next({ name: 'login' });
      });
    }
  },
  {
    path: '/*',
    component: PageNotFound
  }
];

const router = new VueRouter({
  mode: 'history',
  linkActiveClass: 'active',
  linkExactActiveClass: "exact-active",
  routes: routes
});

export default router;