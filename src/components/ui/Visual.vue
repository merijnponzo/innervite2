<template>
  <div class="visual">
    <div class="wrap" :class="'ra-' + ratio"><img :src="src" /></div>
  </div>
</template>

<script>
export default {
  name: 'Visual',
  props: {
    src: {
      type: String,
      default: '',
    },
    ratio: {
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
