<template>
  <div class="articleBoxItem mx-auto">
    <h2 v-if="existsTitle(title)" class="articleBoxItem__title f-en mb-4">
      {{ title }}
    </h2>
    <div class="articleBoxItem__text">
      <slot />
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from '@vue/composition-api'

export default defineComponent({
  props: {
    title: String,
  },
  setup() {
    const existsTitle = (title: string) => {
      return !!title
    }

    return {
      existsTitle,
    }
  },
})
</script>


<style lang="scss" scoped>
.articleBoxItem {
  max-width: 580px;
  &__title {
    font-size: 14px;
  }
  &__text {
    font-size: 14px;
    letter-spacing: 0.12em;
    line-height: 2;
  }
}
</style>
