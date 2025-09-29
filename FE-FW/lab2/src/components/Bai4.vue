<script setup>
import { ref } from "vue";
const isActive = ref(false);
const fontSize = ref(16);
</script>

<template>
  <div class="container">
    <h1 :class="{ active: isActive }" :style="{ fontSize: fontSize + 'px' }">
      Văn bản có thể thay đổi
    </h1>
    <button @click="isActive = !isActive">Bật/Tắt màu chữ</button>
    <label
      >Chọn kích thước chữ:
      <input type="number" v-model="fontSize" />
    </label>
    <p v-if="fontSize < 10 || fontSize > 50">Kích thước không hợp lệ!</p>
  </div>
</template>

<style scoped>
.active {
  color: red;
}
</style>
