<template>
  <div class="card">
    <img :src="product.imageUrl" class="card-img-top" alt="product image" />
    <div class="card-body">
      <h5 class="card-title">{{ product.name }} - {{ product.category }}</h5>
      <p v-if="product.quantity > 10" class="text-success">Số lượng lớn</p>
      <p v-else-if="product.quantity > 0" class="text-warning">
        Số lượng vừa phải
      </p>
      <p v-else class="text-danger">Hết hàng</p>
      <p>Giá: {{ product.price }} VND</p>
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
