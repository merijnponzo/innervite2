<template>
  <main>
    <Header />
    <slot></slot>
    <Footer />
  </main>
</template>

<script>
import Header from './Header.vue'
import Footer from './Footer.vue'

export default {
  name: 'Layout',
  components: {
    Header,
    Footer,
  },
}
</script>
