<template>
  <div class="dark md:container md:mx-auto">
    <div class="grid lg:grid-cols-3 gap-8">
      <div>1</div>
      <!-- ... -->
      <div>9</div>
    </div>
    <h1>Vue {{ msg }}</h1>
    <button class="btn btn-green">Button bitch</button>
    <div class="bg-white dark:bg-gray-800 pa-6 my-1">
      <h1 class="blue-gray-900 dark:text-white text-blue-light">
        Dark mode is here!
      </h1>
      <p class="text-gray-600 dark:text-gray-300">Lorem ipsum...</p>
      <div class="pt-6 bg-gray-50 text-6xl">pt-6 where is the padding</div>
      <div class="pr-4 bg-gray-50">pr-4</div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'HelloWorld',

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
