<template>
  <div class="content relative">
    <div class="content__inner mx-auto px-16 xl:px-12 md:px-8 xs:px-4">
      <Header />
      <Nuxt />
      <Footer />
    </div>
  </div>
</template>

<script>
import { defineComponent } from '@vue/composition-api'
import Header from '../components/organisms/Header.vue'
import Footer from '../components/organisms/Footer.vue'

export default defineComponent({
  components: {
    Header,
    Footer
  },
  setup() {

  },
})
</script>

<style lang="scss" scoped>
.content {
  background: #FBFBFB;
  min-height: 100vh;
  padding: 100px 0 204px;
  &__inner {
    max-width: 1280px;
  }
}

</style>
