<template>
  <header>
    <nav>
      <h1>{{ $page.props.site.name }}</h1>
      <p>{{ $page.props.site.description }}</p>
      <ul>
        <li v-for="item in $page.props.primary_menu" :key="item.id">
          <inertia-link :href="item.link">{{ item.name }}</inertia-link>
        </li>
      </ul>
    </nav>
  </header>
</template>

<script>
export default {
  name: 'Header',
}
</script>
