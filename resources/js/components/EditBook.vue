<template>
  <div>
    <h1>Edit Book</h1>
    <form @submit.prevent="updateBook">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Book Title:</label>
            <input type="text" class="form-control" v-model="book.title">
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Book Author:</label>
              <input type="text" class="form-control" v-model="book.author">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Book Description:</label>
              <textarea class="form-control" v-model="book.description" rows="5"></textarea>
            </div>
          </div>
        </div><br />
        <div class="form-group">
          <button class="btn btn-primary">Update Book</button>
        </div>
    </form>
  </div>
</template>

<script>
    export default {

      data() {
        return {
          book: {}
        }
      },
      created() {
        let url = `/books/${this.$route.params.id}`;
        this.axios.get(url).then((response) => {
            this.book = response.data;
        });
         },
      methods: {
        updateBook() {
          let url= `/books/${this.$route.params.id}`;
          this.axios.post(url, this.book).then((response) => {
            this.$router.push({name: 'dashboard'});
          });
        }
      }
    }
</script>