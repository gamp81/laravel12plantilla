<template>
  <div class="flex items-center justify-center space-x-4 p-4 border rounded-lg bg-gray-100">
    <button
      @click="decrementar"
      class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition-colors"
    >
      -
    </button>
    <span class="text-2xl font-bold text-gray-800">hola{{ count }}</span>
    <button
      @click="incrementar"
      class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition-colors"
    >
      +
    </button>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const count = ref(0);

const incrementar = () => {
  count.value++;
};

const decrementar = () => {
  if (count.value > 0) {
    count.value--;
  }
};
</script>

<style scoped>
/* Estilos opcionales para el componente */
</style>