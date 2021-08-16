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