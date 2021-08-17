<template>
  <div>
    <header-component></header-component>
    <main class="container mt-3">
      <div class="mb-4 text-white rounded bg-dark">
        <div class="hero-image p-4 p-md-5" :style="{ 'background-image': 'url(' + heroImage + ')' }">
          <div class="col-md-6 px-0">
            <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
            <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
          </div>
        </div>
      </div>

      <div class="row mb-2">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
          Popular Post
        </h3>
        <div class="col-md-6" v-for="post in popularPost">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative mx-0">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-success" v-text="post.category"></strong>
              <h3 class="mb-0" v-text="post.title"></h3>
              <div class="mb-1 text-muted" v-text="post.updated_at.substring(0, 10)"></div>
              <p class="mb-auto" v-html="post.content">.</p>
              <router-link :to="'/posts/' + post.slug" class="stretched-link">Continue reading</router-link>
            </div>
            <div class="col-12 d-none d-lg-block p-0">
              <img class="popular-content" :src="'/images/' + post.image">
            </div>
          </div>
        </div>
      </div>

      <div class="row g-5">
        <div class="col-md-8">
          <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Recent Post
          </h3>
          <div class="row mb-2">
            <div class="col-md-12" v-for="post in posts">
              <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative mx-0">
                <div class="col-7 p-4 d-flex flex-column position-static">
                  <strong class="d-inline-block mb-2 text-primary">{{ post.category }}</strong>
                  <h3 class="mb-0">{{ post.title }}</h3>
                  <div class="mb-1 text-muted">{{ post.updated_at.substring(0, 10) }}</div>
                  <p class="card-text mb-auto" v-html="post.content"></p>
                  <router-link :to="'/posts/' + post.slug" class="stretched-link">Continue reading</router-link>
                </div>
                <div class="col-5 d-none d-lg-block p-0">
                  <img class="content-img" :src="'/images/' + post.image">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="position-sticky" style="top: 2rem;">
            <div class="p-4 mb-3 bg-light rounded">
              <h4 class="fst-italic">About Me</h4>
              <p class="mb-0">Saya masih pemula mohon bimbingannya :)</p>
            </div>

            <div class="p-4">
              <h4 class="fst-italic">Category</h4>
              <ol class="list-unstyled mb-0" v-for="item in allCategory">
                <li><router-link class="category" :to="{ name: 'PostCategory', params: {category: item.category} }">{{ item.category }}</router-link></li>
              </ol>
            </div>

            <div class="p-4">
              <h4 class="fst-italic">Elsewhere</h4>
              <ol class="list-unstyled">
                <li><a class="category" href="https://github.com/M-Ihsan-W/laravel-vue-blog.git"><i class="bi bi-github"></i> GitHub</a></li>
                <li><a class="category" href="#"><i class="bi bi-twitter"></i> Twitter</a></li>
                <li><a class="category" href="#"><i class="bi bi-facebook"></i> Facebook</a></li>
              </ol>
            </div>
          </div>
        </div>
      </div>

    </main>
    <footer-component></footer-component>
  </div>
</template>
<script>
export default {
  props: ['category'],
  watch:{
    $route (to, from){
      this.getDataByCategory();
    }
  },
  mounted() {
    this.getDataByCategory();
    this.getCategory();
    this.getPopularPost();
  },
  data() {
    return {
      posts: [],
      allCategory: null,
      popularPost: null,
    }
  },
  methods: {
    getDataByCategory() {
      axios.get(`/api/posts/category/${this.category}`).then((response) => {
        this.posts = response.data;
      });
    },
    getPopularPost() {
      axios.get('/api/posts/popular').then((response) => {
        this.popularPost = response.data;
      });
    },
    getCategory() {
      axios.get(`/api/posts/category`).then((response) => {
        this.allCategory = response.data;
      });
    }
  },
  computed: {
    assetPath() {
      return process.env.ASSET_PATH || "";
    },
    heroImage() {
      return this.assetPath + "/images/main.jpg";
    },
  }
}
</script>
<style>
body {
  background-color: #fff !important;
}
.hero-image {
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
}
.content-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.stretched-link {
  text-decoration: none;
  color: #202020;
}
.stretched-link:hover {
  text-decoration: none;
  color: #999;
}
</style>