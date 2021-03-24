<template>
  <div class="dark md:container md:mx-auto">
    <h1>Tabs content {{ tabs }}</h1>
    <slot />
  </div>
</template>

<script>
export default {
  name: 'Tab',
  props: {
    tabs: Object,
    default: function () {
      return {}
    },
  },

  data() {
    return {
      count: 0,
    }
  },
}
</script>
