<template>
  <div class="heading1">
    <atom-label :tag="tag" class="heading1__main">
      <slot />
    </atom-label>
  </div>
</template>

<script lang="ts">
import { defineComponent } from '@vue/composition-api'
import AtomLabel from '../atoms/AtomLabel.vue'

export default defineComponent({
  components: {
    AtomLabel,
  },
  props: {
    tag: String,
  },
  setup() {
  },
})
</script>

<style lang="scss" scoped>
.heading1 {
  &__main {
    font-size: 36px;
    letter-spacing: 0.12em;
    @apply font-bold;
  }
  &__text {
    font-size: 14px;
    letter-spacing: 0.12em;
  }
}
</style>
