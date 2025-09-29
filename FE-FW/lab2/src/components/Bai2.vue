<template>
  <div class="container">
    <h1>Quản lý thông tin người dùng với reactive()</h1>
    <form @submit.prevent="submitForm">
      <label>Tên: <input v-model="user.name" required /></label><br />
      <label>Tuổi: <input type="number" v-model="user.age" required /></label
      ><br />
      <label>Email: <input v-model="user.email" required /></label><br />
      <button type="submit">Cập nhật</button>
    </form>
    <p>Tên: {{ user.name }}</p>
    <p>Tuổi: {{ user.age }}</p>
    <p>Email: {{ user.email }}</p>
  </div>
</template>
<script setup>
import { reactive } from "vue";
const user = reactive({
  name: "",
  age: null,
  email: "",
});
const submitForm = () => {
  if (user.name && user.email) {
    alert("Thông tin hợp lệ");
  } else {
    alert("Vui lòng nhập đầy đủ thông tin");
  }
};
</script>
