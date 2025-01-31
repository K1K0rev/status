<template>
  <HeaderComponent />

</template>

<script>
import axios from 'axios';
import { defineAsyncComponent } from "vue";

export default {
  data() {
    return {
      users: []
    };
  },

  components: {
    HeaderComponent: defineAsyncComponent(() => import("./components/Header.vue"))
  },

  mounted() {
    axios.get('/api/users')
      .then(response => {
        this.users = response.data;
      })
      .catch(error => {
        console.error("Ошибка загрузки данных", error);
      });
  }
};
</script>