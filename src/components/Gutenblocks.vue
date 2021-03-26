<template>
  <div class="guten--content">
    <runtime-gutenberg :template="content"></runtime-gutenberg>
  </div>
</template>

<script>
import RuntimeGutenberg from 'vue3-runtime-template'

export default {
  name: 'Gutenblocks',
  components: { RuntimeGutenberg },
  props: {
    content: {
      type: String,
      default: '',
    },
  },
  data() {
    return {
      count: 0,
    }
  },
}
</script>
