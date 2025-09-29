<template>
  <h1>{{ greeting }}</h1>
  <button :title="buttonTitle" @click="changeGreeting">Click to change</button>
</template>

<script setup>
import { ref } from "vue";

const greeting = ref("Xin chao ban");
const buttonTitle = ref("Nhan de thay doi tin");

const changeGreeting = () => {
  greeting.value = "Hello world";
  buttonTitle.value = "Loi chao da duoc cap nhat";
};
</script>
