<template>
  <div class="container mt-4">
    <h2>Thêm sách mới vào thư viện</h2>
    <form @submit.prevent="addBook">
      <div class="mb-3">
        <label for="bookTitle" class="form-label">Tiêu đề</label>
        <input
          type="text"
          :value="bookTitle"
          @input="bookTitle = $event.target.value"
          class="form-control"
          id="bookTitle"
          placeholder="Nhập tiêu đề"
        />
      </div>
      <div class="mb-3">
        <label for="bookAuthor" class="form-label">Tác giả</label>
        <input
          type="text"
          :value="bookAuthor"
          @input="bookAuthor = $event.target.value"
          class="form-control"
          id="bookAuthor"
          placeholder="Nhập tác giả"
        />
      </div>
      <div class="mb-3">
        <label for="bookCategory" class="form-label">Thể loại</label>
        <select
          :value="bookCategory"
          @change="bookCategory = $event.target.value"
          class="form-select"
          id="bookCategory"
        >
          <option value="" disabled>Chọn thể loại</option>
          <option value="1">Tiểu thuyết</option>
          <option value="2">Phi hư cấu</option>
          <option value="3">Khoa học</option>
          <option value="4">Lịch sử</option>
          <option value="5">Phát triển bản thân</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="bookQuantity" class="form-label">Số lượng</label>
        <input
          type="number"
          :value="bookQuantity"
          @input="bookQuantity = $event.target.value"
          class="form-control"
          id="bookQuantity"
          placeholder="Nhập số lượng"
          @keyup.enter.prevent="addBook"
        />
      </div>
      <button type="submit" class="btn btn-primary">Thêm sách</button>
    </form>

    <div v-if="books.length" class="mt-4">
      <h3>Danh sách sách</h3>
      <ul class="list-group">
        <li
          v-for="book in books"
          :key="book.id"
          class="list-group-item d-flex justify-content-between align-items-center"
        >
          <div>
            <h5>{{ book.title }}</h5>
            <p>Tác giả: {{ book.author }}</p>
            <p>Thể loại: {{ book.category }}</p>
            <p>Số lượng: {{ book.quantity }}</p>
          </div>
          <div>
            <button @click="deleteBook(book.id)" class="btn btn-danger">
              Xóa
            </button>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
const bookTitle = ref("");
const bookAuthor = ref("");
const bookCategory = ref("");
const bookQuantity = ref(1);
const books = ref([]);
const categories = {
  1: "Tiểu thuyết",
  2: "Phi hư cấu",
  3: "Khoa học",
  4: "Lịch sử",
  5: "Phát triển bản thân",
};
const addBook = () => {
  if (
    !bookTitle.value ||
    !bookAuthor.value ||
    !bookCategory.value ||
    !bookQuantity.value
  ) {
    return;
  }
  const newBook = {
    id: Date.now(),
    title: bookTitle.value,
    author: bookAuthor.value,
    category: categories[bookCategory.value],
    quantity: bookQuantity.value,
  };
  books.value.push(newBook);
  // Clear the input fields
  bookTitle.value = "";
  bookAuthor.value = "";
  bookCategory.value = "";
  bookQuantity.value = 1;
};

const deleteBook = (id) => {
  if (confirm("Bạn có chắc chắn muốn xóa sách này không?")) {
    books.value = books.value.filter((book) => book.id !== id);
  }
};
</script>
