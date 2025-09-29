<script setup>
import { ref } from "vue";
import ChildComponent from "./components/ChildComponent.vue";

const msgFromChild = ref("");
const returnFromChild = (msg) => {
  msgFromChild.value = msg;
};
</script>

<template>
  <ChildComponent
    message="test"
    :count="10"
    @childEvent="returnFromChild"
  ></ChildComponent>

  <p class="test-success">{{ msgFromChild }}</p>
</template>
