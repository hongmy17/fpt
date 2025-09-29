<template>
  <div class="container">
    <h2>Quản lý sản phẩm</h2>
    <!-- Dropdown Lọc sản phẩm -->
    <div class="mb-3">
      <label for="categoryFilter">Lọc theo danh mục</label>
      <select
        v-model="selectedCategory"
        class="form-select"
        id="categoryFilter"
      >
        <option value="">Tất cả</option>
        <option value="Electronics">Electronics</option>
        <option value="Accessories">Accessories</option>
      </select>
    </div>
    <!-- Tổng giá trị sản phẩm còn trong kho -->
    <div class="alert alert-info">
      Tổng giá trị hàng tồn kho: {{ totalStockValue }} VND
    </div>
    <!-- Danh sách sản phẩm -->
    <div class="row">
      <template
        v-for="product in filteredProducts"
        :key="product.id"
        class="product-template"
      >
        <div class="col-md-4">
          <div class="card">
            <img
              :src="product.imageUrl"
              class="card-img-top"
              alt="Product Image"
            />
            <div class="card-body">
              <h5 class="card-title">
                {{ product.name }} - {{ product.category }}
              </h5>
              <p v-if="product.inStock" class="text-success">Còn hàng</p>
              <p v-else class="text-danger">Hết hàng</p>
              <p>Giá: {{ product.price }} VND</p>
              <p>Mô tả: {{ product.description }}</p>
            </div>
          </div>
        </div>
      </template>
    </div>
  </div>
</template>
<script setup>
import { reactive, computed, ref } from "vue";
const selectedCategory = ref(""); // Lọc theo danh mục
const products = reactive([
  {
    id: 1,
    name: "Laptop",
    price: 15000000,
    quantity: 5,
    category: "Electronics",
    inStock: true,
    description: "Laptop thế hệ mới",
    imageUrl: "https://picsum.photos/id/1/150/150",
  },
  {
    id: 2,
    name: "Phone",
    price: 8000000,
    quantity: 12,
    category: "Electronics",
    inStock: true,
    description: "Điện thoại thông minh",
    imageUrl: "https://picsum.photos/id/2/150/150",
  },
  {
    id: 3,
    name: "Headphone",
    price: 2000000,
    quantity: 0,
    category: "Accessories",
    inStock: false,
    description: "Tai nghe chất lượng cao",
    imageUrl: "https://picsum.photos/id/3/150/150",
  },
]);

const totalStockValue = computed(() => {
  return products.reduce((total, product) => {
    return product.inStock ? total + product.price * product.quantity : total;
  }, 0);
});
// Lọc sản phẩm theo danh mục
const filteredProducts = computed(() => {
  if (!selectedCategory.value) {
    return products;
  }
  return products.filter(
    (product) => product.category === selectedCategory.value
  );
});
</script>
