<template>
  <div class="dark md:container md:mx-auto">
    <h2>test</h2>
    <h1 class="text-xl">{{ page.post_title }}</h1>
    <div v-html="page.post_content"></div>
  </div>
</template>

<script>
export default {
  name: 'Default',
  props: ['page'],
  data() {
    return {
      loaded: false,
    }
  },
  mounted() {
    this.$nextTick(() => (this.loaded = true))
  },
}
</script>
<style lang="scss">
html {
  background: red;
}
</style>
