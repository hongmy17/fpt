<template>
  <div class="card">
    <img :src="product.imageUrl" class="card-img-top" alt="product image" />
    <div class="card-body">
      <h5 class="card-title">{{ product.name }}</h5>
      <p class="card-text">Giá: {{ product.price }} VND</p>
      <p class="card-text">Số lượng: {{ product.quantity }}</p>
      <p class="card-text">Danh mục: {{ product.category }}</p>
      <span
        class="badge"
        :class="{
          'bg-success': product.inStock,
          'bg-danger': !product.inStock,
        }"
      >
        {{ product.inStock ? "Còn hàng" : "Hết hàng" }}
      </span>
    </div>
  </div>
</template>

<script setup>
import { reactive } from "vue";
const product = reactive({
  id: 1,
  name: "Sản phẩm A",
  price: 100,
  quantity: 5,
  category: "Điện tử",
  inStock: false,
  description: "Mô tả A",
  imageUrl: "https://picsum.photos/id/1/300/300",
});
</script>
