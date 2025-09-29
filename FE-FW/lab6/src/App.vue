<script setup>
import axios from "axios";
import { onMounted, reactive } from "vue";

const state = reactive({});

const getMajor = () => {
  return axios
    .get("http://localhost:3000/majors")
    .then((res) => (state.majors = res.data))
    .catch((err) => console.error(err));
};

onMounted(() => {
  getMajor();
});
</script>

<template>
  <div class="container">
    <div class="row">
      <div class="col-4" v-for="major in state.majors">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ major.name }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
            <p class="card-text">
              {{ major.content }}
            </p>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
