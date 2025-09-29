<script setup>
const props = defineProps({
  message: String,
  count: Number,
});

const emit = defineEmits(["childEvent"]);
const notifyParent = () => {
  emit("childEvent", "Hello world");
};
</script>

<template>
  <h2>Component con</h2>
  <button class="btn btn-warning" @click="notifyParent">Click</button>
  <p class="text-success">{{ message }}</p>
  <p class="text-danger">Count: {{ count }}</p>
</template>
