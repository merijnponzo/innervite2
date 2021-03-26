<template>
  <Layout>
    <h1>Archive</h1>
    <main>
      <section class="wrap grid">
        <div class="c4" v-for="item in items">
          <inertia-link :href="item.link">
            <Visual
              :src="item.poster"
              :alt="`${item.title} Poster`"
              ratio="16x9"
            />
            <h3 class="fs__t toy">{{ item.title }}</h3>
          </inertia-link>
        </div>
      </section>
      <div class="mt-2">
        <inertia-link
          class="btn"
          :class="{ disabled: !pagination.prev_page }"
          :href="`/movies/page/${pagination.prev_page}`"
          preserve-scroll
          >Prev</inertia-link
        >
        <inertia-link
          class="btn"
          :class="{ disabled: pagination.next_page > pagination.total_pages }"
          :href="`/movies/page/${pagination.next_page}`"
          preserve-scroll
          >Next</inertia-link
        >
      </div>
    </main>
  </Layout>
</template>

<script>
export default {
  name: 'Filmography/Index',
  props: ['items', 'pagination'],
  data() {
    return {}
  },
}
</script>
