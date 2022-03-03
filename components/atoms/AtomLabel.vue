<template>
  <component :is="tag" class="atomLabel">
    <slot />
  </component>
</template>

<script>
import { defineComponent } from '@vue/composition-api'

export default defineComponent({
  props: {
    tag: {
      type: String,
      default: 'p'
    }
  },

  setup() {

  },
})
</script>
