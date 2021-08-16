<template>
  <main class="container mt-3" v-if="detailPost != null">
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
      <div class="col-md-6 px-0">
        <h1 class="display-4 fst-italic">{{ detailPost.title }}</h1>
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
            <h4 class="fst-italic">Archives</h4>
            <ol class="list-unstyled mb-0" v-for="item in category">
              <li><router-link :to="{ name: 'PostCategory', params: {category: item.category} }">{{ item.category }}</router-link></li>
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
}
</script>