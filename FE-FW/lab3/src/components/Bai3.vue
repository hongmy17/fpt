<template>
  <div class="container mt-5">
    <h2>Danh sách sản phẩm</h2>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Ảnh</th>
          <th scope="col">Tên</th>
          <th scope="col">Giá</th>
          <th scope="col">Tình trạng</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="({ id, name, price, inStock, image }, index) in products"
          :key="id"
        >
          <th scope="row">{{ index + 1 }}</th>
          <td>
            <img :src="image" alt="Product Image" width="50" height="50" />
          </td>
          <td>{{ name }}</td>
          <td>{{ price }} VND</td>
          <td>
            <span v-if="inStock" class="badge bg-success">Còn hàng</span>
            <span v-else class="badge bg-danger">Hết hàng</span>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { reactive } from "vue";
const products = reactive([
  {
    id: 1,
    name: "Laptop",
    price: 15000000,
    quantity: 5,
    category: "Electronics",
    inStock: true,
    image: "https://picsum.photos/id/1/300/300",
  },
  {
    id: 2,
    name: "Phone",
    price: 8000000,
    quantity: 12,
    category: "Electronics",
    inStock: true,
    image: "https://picsum.photos/id/2/300/300",
  },
  {
    id: 3,
    name: "Headphone",
    price: 2000000,
    quantity: 0,
    category: "Accessories",
    inStock: false,
    image: "https://picsum.photos/id/3/300/300",
  },
]);
</script>
