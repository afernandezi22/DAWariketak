<script setup>
const props = defineProps(["hasiera", "amaiera", "max"]);
const emit = defineEmits(['next', 'prev']);
</script>

<template>
    <button type="button" class="btn btn-outline-primary" :disabled="hasiera === 0" @click="emit('prev')">Previous</button>
    <button type="button" class="btn btn-primary" :disabled="amaiera >= max" @click="emit('next')">Next</button>
</template>