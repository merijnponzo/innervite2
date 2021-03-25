<template>
  <Layout>
<<<<<<< HEAD
    <h1>YES</h1>
    <main class="row">
      <div class="c12">
        <runtime-gutenberg :template="content"></runtime-gutenberg>
        <button class="btn">Test</button>
      </div>
=======
    <main v-if="loaded">
      {{ content }} {{ title }}
      <runtime-gutenberg :template="content"></runtime-gutenberg>
>>>>>>> ce5b66a743ac0551e7843469277ffa2291d6d6e6
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
<<<<<<< HEAD
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
=======
    this.$nextTick(() => (this.loaded = true))
  },
}
</script>
>>>>>>> ce5b66a743ac0551e7843469277ffa2291d6d6e6
