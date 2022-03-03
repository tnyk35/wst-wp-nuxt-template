<template>
  <div>
    <p class="title">
      <nuxt-link :to="'/'" class="title__link f-en">記事一覧</nuxt-link>
    </p>
    <article-box :post="state.post" class="mt-2" />
    <link-box :post="state.post" />
  </div>
</template>

<script lang="ts">
import { defineComponent, reactive, useFetch, useContext } from '@nuxtjs/composition-api'
import Heading1 from '../../components/molecules/Heading1.vue'
import LinkBox from '../../components/organisms/LinkBox.vue'
import ArticleBox from '../../components/organisms/ArticleBox.vue'

export default defineComponent({
  components: {
    Heading1,
    LinkBox,
    ArticleBox,
  },
  setup() {

    const { app, route } = useContext()
    const state = reactive({
      post: {},
    })

    const { fetch, fetchState } = useFetch(async () => {
      state.post = await app.$axios.get(`/custom/v0/posts/${route.value.params.id}`).then((res: any) => {
        return res.data
      })
    })

    fetch()

    fetchState

    return {
      state,
    }
  },
})
</script>

<style lang="scss" scoped>
.title {
  font-size: 16px;
  letter-spacing: 0.12em;
  @apply font-bold text-center;
  &__link {
    text-decoration: none;
  }
}
</style>
