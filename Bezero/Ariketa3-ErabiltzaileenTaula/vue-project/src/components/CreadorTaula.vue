<script setup>
    defineProps(["data"]);
</script>

<template>
    <tr v-for="pertsona in data">
        <td>{{ pertsona.ID }}</td>
        <td>{{ pertsona.Izena }}</td>
        <td>{{ pertsona.Abizena }}</td>
        <td>{{ pertsona.NAN }}</td>
        <td>{{ pertsona.JaiotzeData }}</td>
        <td>{{ pertsona.Adina }}</td>
    </tr>
</template>