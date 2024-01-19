<script setup>
    defineProps({
        title: String,
        id: Number,
        body: {
            type: String,
            default: "Sin descripción"
        },
        colorText: String,
    });

    const emit = defineEmits(['cambairFavoritoNombre']);
</script>

<template>
    <div class="card">
        <div clas="card-body">
            <h5 class="card-title" :class="`text-${colorText}`">{{ id }} - {{ title }}</h5>
            <p>{{ body }}</p>
            <button
                @click="emit('cambiarFavoritoNombre', title)"
                class="btn btn-outline-primary"
            >Fav ❤️</button>
        </div>
    </div>
</template>