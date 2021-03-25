<template>
  <div class="dark md:container md:mx-auto">
    <h1>Tabs! {{ tabs }}</h1>
    <pre>
    {{ theme }}
    </pre>
    <slot />
  </div>
</template>

<script>
export default {
  name: 'Tabs',
  props: {
    tabs: {
      type: Object,
      default: function () {
        return {}
      },
    },
    theme: {
      type: Object,
      default: function () {
        return ''
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
