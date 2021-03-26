<template>
  <Layout>
    <h1>YES PAGE</h1>
    <Tabs>
      <Tab>This is a tab</Tab>
    </Tabs>
    <main class="row">
      <div class="c12">
        <Gutenblocks :content="content" />
      </div>
    </main>
  </Layout>
</template>

<script>
import Gutenblocks from '../components/Gutenblocks.vue'
import { nextTick } from 'vue'

export default {
  name: 'Page',
  props: ['title', 'content'],
  components: { Gutenblocks },
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
