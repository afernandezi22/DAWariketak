<script setup>
import { ref } from "vue";
import Ficha from './components/ficha.vue'
import Tabla from './components/tablaapi.vue'
var idtitulo = ref("");
const post = ref (null);
const filtrarporid = (iditem) => {
  console.log(iditem)
  if(iditem==""){

  }else{
    fetch ("https://thronesapi.com/api/v2/Characters/"+iditem)
    .then (result => result.json())
    .then (data => post.value=data);
    console.log(post)
  }
}
</script>

<template>
  <header>
    <div class="wrapper">
    </div>
  </header>
  <main>
    <h1>{{ idtitulo }}</h1>
    <Tabla @filtrarporid="filtrarporid"/>
    <Ficha  v-if="post"
      :key="post.id"
      :title="post.fullName"
      :id = "post.id"
      :titulo = "post.title"
      :familia = "post.family"
      :imageUrl = "post.imageUrl"/>
  </main>
</template>

<style scoped></style>
