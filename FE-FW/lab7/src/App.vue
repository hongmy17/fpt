<script setup>
import axios from "axios";
import { reactive } from "vue";

const newMajor = reactive({
  name: "",
  content: "",
});

const addMajor = async () => {
  try {
    const res = await axios.post("http://localhost:3000/majors", newMajor);
    console.log("Đã thêm thành công:", res.data);
    alert("Thêm chuyên ngành thành công!");

    newMajor.name = "";
    newMajor.content = "";
  } catch (err) {
    console.error("Lỗi khi thêm dữ liệu:", err);
  }
};
</script>

<template>
  <div class="container mt-5">
    <h2 class="mb-4">Thêm chuyên ngành</h2>
    <form @submit.prevent="addMajor" class="card p-4 shadow-sm">
      <div class="mb-3">
        <label class="form-label">Tên chuyên ngành</label>
        <input
          v-model="newMajor.name"
          class="form-control"
          placeholder="Nhập tên chuyên ngành"
          required
        />
      </div>

      <div class="mb-3">
        <label class="form-label">Nội dung</label>
        <textarea
          v-model="newMajor.content"
          class="form-control"
          placeholder="Nhập nội dung"
        ></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
  </div>
</template>
