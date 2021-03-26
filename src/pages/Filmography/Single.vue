<template>
  <Layout>
    <div>
      <h2>test</h2>
      <h1>{{ title }}</h1>
      <div v-html="content"></div>
    </div>
  </Layout>
</template>

<script>
export default {
  name: 'Default',
  props: ['title', 'content'],
  data() {
    return {}
  },
}
</script>
<style lang="scss" scoped></style>
