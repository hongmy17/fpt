<script setup>
import HelloWorld from "./components/HelloWorld.vue";
import Bai3 from "./components/Bai3.vue";
import Bai4 from "./components/Bai4.vue";
</script>

<template>
  <Bai3 />
  <Bai4 />
</template>

<style scoped>
.logo {
  height: 6em;
  padding: 1.5em;
  will-change: filter;
  transition: filter 300ms;
}
.logo:hover {
  filter: drop-shadow(0 0 2em #646cffaa);
}
.logo.vue:hover {
  filter: drop-shadow(0 0 2em #42b883aa);
}
</style>
