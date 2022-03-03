<template>
  <ul class="blogList grid grid-cols-3 md:grid-cols-2 xs:grid-cols-1 gap-12 xl:gap-8 lg:gap-6 md:gap-4">
    <blog-list-item v-for="post in posts" :key="post.id" :post="post" />
  </ul>
</template>

<script lang="ts">
import { defineComponent } from '@vue/composition-api'
import BlogListItem from '../molecules/BlogListItem.vue'

export default defineComponent({
  components: {
    BlogListItem
  },
  props: {
    posts: Array
  },
  setup() {
  },
})
</script>

<style lang="scss" scoped>
</style>
