<template>
  <Layout>
    <main class="row">
      <div class="c12">
        <runtime-gutenberg :template="content"></runtime-gutenberg>
        <button class="btn">Test</button>
      </div>
    </main>
  </Layout>
</template>

<script>
import RuntimeGutenberg from 'vue3-runtime-template'
import { nextTick } from 'vue'

export default {
  name: 'Page',
  props: ['title', 'content'],
  components: { RuntimeGutenberg },
  data() {
    return {}
  },
  mounted() {
    // this.$nextTick(() => (this.loaded = true))
  },
}
</script>
<style lang="scss">
.content {
  width: 100%;
  display: block;
}
</style>
