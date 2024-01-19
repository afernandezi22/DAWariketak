<!-- Logika -->
<script setup>
  import ButtonCounter from './components/ButtonCounter.vue';
  import BlogPost from './components/BlogPost.vue';
  import Paginate from './components/Paginate.vue';
  const name = 'Vue js';
  import {ref} from "vue";
  const posts = ref([]);
  const postXPage = 10;
  const inicio = ref(0);
  const fin = ref(postXPage);

  fetch('https://jsonplaceholder.typicode.com/posts')
    .then(response => response.json())
    .then(data => {
      console.log(data)
      posts.value = data;
    })
    .catch(error => {
      console.error('Error al cargar los datos:', error);
  });

  const favorito = ref('');
  const cambiarFavorito = (title) => {
    favorito.value = title;
  }

  const next = () => {
      inicio.value += postXPage;
      fin.value += postXPage;
  }
  const prev = () => {
      inicio.value -= postXPage;
      fin.value -= postXPage;
  }
</script>

<!-- HTML kodea -->
<template>
  <h1>Hello {{name}}</h1>
  <div class="container">
    <h1>Nire lehenengo proiektua</h1>
    <p><b>Favorito: </b>{{ favorito }}</p>
    <Paginate
      @next = "next"
      @prev = "prev"
      :inicio = "inicio"
      :fin = "fin"
      :maxLength = "posts.length"
    />
    <br><br>
    <ButtonCounter />
    <ButtonCounter />
    <ButtonCounter />
    <br><br>
    <BlogPost
      v-for="post in posts.slice(inicio, fin)"
      :key="post.id"
      :title="post.title"
      :id="post.id"
      :body="post.body"
      @cambiarFavoritoNombre="cambiarFavorito"
      class="mb-2">
    </BlogPost>
  </div>
</template>

<!-- Estiloak. CSS -->
<style>
  h1{
    color: red;
  }
</style>