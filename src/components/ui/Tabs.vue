<template>
  <div class="dark md:container md:mx-auto">
    {{ theme.btn }}
    <slot />
  </div>
</template>

<script>
export default {
  name: 'Tabs',
  props: {
    theme: {
      type: [Object, String],
      default: function () {
        return {}
      },
    },
  },
  data() {
    return {
      count: 0,
    }
  },
}
</script>
