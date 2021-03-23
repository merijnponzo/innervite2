<template>
  <div class="dark md:container md:mx-auto" v-if="loaded">
    <h2>This is a page template</h2>
    <h1 class="text-xl">{{ title }}</h1>
    <div v-html="content"></div>
    <h4>RUntime from here</h4>
    <v-runtime-template :template="content"></v-runtime-template>
  </div>
</template>

<script>
import VRuntimeTemplate from 'vue3-runtime-template'
import Message from '../Message.vue'
export default {
  name: 'Page',
  props: ['title', 'content'],
  components: { Message, VRuntimeTemplate },
  data() {
    return {
      loaded: false,
    }
  },
  mounted() {
    console.log('page is mounted?')
    console.log(this.props)
    this.$nextTick(() => (this.loaded = true))
  },
}
</script>
<style lang="scss">
html {
  background: red;
}
</style>
