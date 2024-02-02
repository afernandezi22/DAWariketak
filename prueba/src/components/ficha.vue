<script setup>
    defineProps({
        title: String,
        id: Number,
        titulo: {
            type: String,
            default: "Sin descripcion",
        },
        familia: {
            type: String,
            default: "Sin descripcion",
        },
        imageUrl: String,
    })
</script>

<template>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ id }} - {{ title }}</h5>
            <img :src="imageUrl"/>
            <p>{{ titulo }}</p>
            <p>{{ familia }}</p>
        </div>
    </div>
</template>