<template>
  <div class="dark md:container md:mx-auto">
    <h1>runtime test twee</h1>
  </div>
</template>

<script>
export default {
  name: 'Message',
  props: {
    msg: String,
    default: '',
  },

  data() {
    return {
      count: 0,
    }
  },
}
</script>
<style>
@layer components {
  .btn-green {
  }
}
</style>
