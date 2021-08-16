<template>
  <div>
    <header-component></header-component>
    <main class="container mt-3">
      <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
          <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
          <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-md-6">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative mx-0">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-primary">World</strong>
              <h3 class="mb-0">Featured post</h3>
              <div class="mb-1 text-muted">Nov 12</div>
              <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="stretched-link">Continue reading</a>
            </div>
            <div class="col-auto d-none d-lg-block p-0">
              <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative mx-0">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-success">Design</strong>
              <h3 class="mb-0">Post title</h3>
              <div class="mb-1 text-muted">Nov 11</div>
              <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="stretched-link">Continue reading</a>
            </div>
            <div class="col-auto d-none d-lg-block p-0">
              <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
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
              <h4 class="fst-italic">Archives</h4>
              <ol class="list-unstyled mb-0" v-for="category in allCategory">
                <li><router-link :to="{ name: 'PostCategory', params: {category: category.category} }">{{ category.category }}</router-link></li>
              </ol>
            </div>

            <div class="p-4">
              <h4 class="fst-italic">Elsewhere</h4>
              <ol class="list-unstyled">
                <li><a href="#">GitHub</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Facebook</a></li>
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
  },
  data() {
    return {
      posts: [],
      allCategory: null,
    }
  },
  methods: {
    getDataByCategory() {
      axios.get(`/api/posts/category/${this.category}`).then((response) => {
        this.posts = response.data;
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
    img1() {
      return this.assetPath + "/images/main.jpg";
    },
  }
}
</script>
<style>
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