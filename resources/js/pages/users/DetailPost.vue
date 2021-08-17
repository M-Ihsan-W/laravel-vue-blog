<template>
  <main class="container mt-3" v-if="detailPost != null">
    <div class="text-white rounded bg-dark">
      <div class="img-cover p-4 p-md-5 mb-4" :style="{ 'background-image': 'url(' + mainimage + ')' }">
        <div class="col-md-6 px-0">
          <h1 class="display-4 fst-italic post-title">{{ detailPost.title }}</h1>
        </div>
      </div>
    </div>

    <div class="row g-5">
      <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">{{ detailPost.title }}</h3>
        <article class="blog-post" v-html="detailPost.content"></article>
      </div>

      <div class="col-md-4">
        <div class="position-sticky" style="top: 2rem;">
          <div class="p-4 mb-3 bg-light rounded">
            <h4 class="fst-italic">About</h4>
            <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>
          </div>

          <div class="p-4">
            <h4 class="fst-italic">Category</h4>
            <ol class="list-unstyled mb-0" v-for="item in category">
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
</template>
<script>
export default {
  props: ['slug'],
  mounted() {
    this.getDataBySlug();
    this.getCategory();
  },
  data() {
    return {
      detailPost: null,
      category: null,
    }
  },
  methods: {
    getDataBySlug() {
      axios.get(`/api/posts/${this.slug}`).then((response) => {
        this.detailPost = response.data[0];
      });
    },
    getCategory() {
      axios.get(`/api/posts/category`).then((response) => {
        this.category = response.data;
      });
    }
  },
  computed: {
    assetPath() {
      return process.env.ASSET_PATH || "";
    },
    mainimage() {
      return this.assetPath + `/images/${this.detailPost.image}`;
    },
  },
}
</script>
<style>
:root {
  --clr-yellow: #FFC107;
  --clr-black: #202020;
}
.img-cover {
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
  height: 400px;
}
.post-title {
  text-shadow: 0px 0px 2px var(--clr-black);
}
</style>