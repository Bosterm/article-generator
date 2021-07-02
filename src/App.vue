<template>
  <div id="app">
    <Essay/>
  </div>
</template>

<script>
import Essay from './components/Essay.vue'

export default {
  name: 'App',
  components: {
    Essay
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
