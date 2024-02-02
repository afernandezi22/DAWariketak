<script setup>
const props = defineProps(["id", "name", "type", "ability", "imageURL", "index"]);
const emit = defineEmits(["ezabatu"]);
</script>

<template>
    <tr>
        <td>{{ id }}</td>
        <td>{{ name }}</td>
        <td>{{ type }}</td>
        <td>{{ ability }}</td>
        <td><img :src="imageURL"></td>
        <td><button type="button" class="btn btn-danger btn-sm" @click="emit('ezabatu', index)"> X </button></td>
    </tr>
</template>