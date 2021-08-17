<template>
  <div>
    <admin-header></admin-header>
    <admin-wrap>
      <admin-navigation></admin-navigation>
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Create New Post</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar"></span>
              This week
            </button>
          </div>
        </div>
        <form @submit.prevent="createPost" id="createPost">
          <div class="mb-3">
            <label for="creator" class="form-label">Creator</label>
            <input v-model="form.creator" type="text" name="creator" class="form-control" id="creator">
              <div class="invalid-feedback" v-if="errors.creator">
                {{ message }}
              </div>
          </div>
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input v-model="form.title" type="text" name="title" class="form-control" id="title" >
              <div class="invalid-feedback" v-if="errors.title">
                {{ message }}
              </div>
          </div>
          <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input v-model="form.category" type="text" name="category" class="form-control" id="category">
              <div class="invalid-feedback" v-if="errors.category">
                {{ message }}
              </div>
          </div>
          <div class="mb-3 d-flex justify-content-center">
            <img :src="imgPreview" class="img-fluid preview-img" alt="">
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input @change="loadImg" type="file" name="image" class="form-control" id="image">
              <div class="invalid-feedback" v-if="errors.image">
                {{ message }}
              </div>
          </div>
          <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <div class="invalid-feedback" v-if="errors.content">
              {{ message }}
            </div>
            <textarea v-model="form.content" class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
          </div>
          <div class="d-flex justify-content-end">
            <a href="/admin/posts" class="btn btn-dark">Cancel</a>
            <button type="submit" class="btn btn-primary mx-2">Submit</button>
          </div>
        </form>
      </main>
    </admin-wrap>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: null,
      errors: [],
      imgPreview: null,
      form: {
        creator: '',
        title: '',
        category: '',
        image: '',
        content: '',
      }
    }
  },
  mounted() {
    axios.get('/api/user').then((response) => {
      this.user = response.data;
    });
  },
  methods: {
    logout() {
      axios.post('/api/logout').then((response) => {
        this.$router.push({ name: 'login' });
      });
    },
    createPost() {
      let FormPost = document.getElementById('createPost');
      let formData = new FormData(FormPost);
      formData.append("image", this.form.image);
      axios.post(`/api/create/post`, formData)
      .then((response) => {
        // console.info(response);
        this.$router.push('/admin/blog');
      }).catch((error) => {
        this.errors = error.response.data.errors;
        // console.info(error.response);
      });
    },
    loadImg(e) {
      let files = e.target.files[0];
      this.imgPreview = URL.createObjectURL(files);
      this.form.image = files;
    },
  }
}
</script>

<style>
  .preview-img {
    height: 200px; 
    width: 450px; 
    object-fit: cover;
  }
</style>