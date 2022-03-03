<template>
  <div>
    <heading1 :tag="'h1'" :tag2="'p'" class="text-center title1">
      <span>記事一覧を取得</span>
    </heading1>
    <blog-list :posts="state.posts" class="mt-28" />
  </div>
</template>

<script lang="ts">
import { defineComponent, reactive, useFetch, useContext } from '@nuxtjs/composition-api'
import Heading1 from '../components/molecules/Heading1.vue'
import BlogList from '../components/organisms/BlogList.vue'

export default defineComponent({
  name: 'IndexPage',
  components: {
    Heading1,
    BlogList
  },
  setup() {
    const { app } = useContext()
    const state = reactive({
      posts: [],
    })

    const { fetch, fetchState } = useFetch(async () => {
      state.posts = await app.$axios.get('/custom/v0/posts').then((res: any) => {
        return res.data
      })
    })

    fetch()

    fetchState

    return {
      state
    }
  }
})
</script>


<style lang="scss" scoped>
</style>
