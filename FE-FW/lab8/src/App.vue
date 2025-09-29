<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";

const majors = ref([]);

const getMajors = async () => {
  try {
    const res = await axios.get("http://localhost:3000/majors");
    majors.value = res.data;
  } catch (err) {
    console.error("Lỗi khi lấy dữ liệu:", err);
  }
};

const deleteMajor = async (id) => {
  if (confirm("Bạn có chắc muốn xóa chuyên ngành này?")) {
    try {
      await axios.delete(`http://localhost:3000/majors/${id}`);
      getMajors();
    } catch (err) {
      console.error("Lỗi khi xóa:", err);
    }
  }
};

onMounted(() => {
  getMajors();
});
</script>

<template>
  <div class="container mt-4">
    <h2 class="mb-4">Quản lý chuyên ngành</h2>

    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tên</th>
          <th>Nội dung</th>
          <th style="width: 100px">Hành động</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="major in majors" :key="major.id">
          <td>{{ major.id }}</td>
          <td>{{ major.name }}</td>
          <td>{{ major.content }}</td>
          <td>
            <button
              class="btn btn-danger btn-sm"
              @click="deleteMajor(major.id)"
            >
              Xóa
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
