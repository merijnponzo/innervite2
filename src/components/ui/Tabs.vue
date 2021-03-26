<template>
  <div :class="[theme.classnames]">
    <div class="tab__nav">
      <div v-for="(tab, t) in content">
        {{ tab.tabtitle }}
      </div>
    </div>
    <div class="tab__content">
      <div v-for="(tab, t) in content">
        <div v-html="tab.text" />
      </div>
    </div>
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
    content: {
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
