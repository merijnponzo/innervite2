<template>
  <Layout>
    <main v-if="loaded">
      {{ content }} {{ title }}
      <runtime-gutenberg :template="content"></runtime-gutenberg>
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
    return {
      loaded: false,
    }
  },
  mounted() {
    this.$nextTick(() => (this.loaded = true))
  },
}
</script>
