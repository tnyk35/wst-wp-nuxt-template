<template>
  <div class="linkBoxItem">
    <div v-if="existsLink(link)">
      <nuxt-link :to="link" class="linkBoxItem__link relative" :class="iconClass(icon)">
        <slot />
        <span v-if="existsIcon(icon)" :class="iconClass(icon)" class="linkBoxItem__icon absolute block" />
      </nuxt-link>
    </div>
    <div v-else-if="existsPost(post)">
      <nuxt-link :to="'/blog/' + post.id" class="linkBoxItem__link relative" :class="iconClass(icon)">
        <slot />
        <span v-if="existsIcon(icon)" :class="iconClass(icon)" class="linkBoxItem__icon absolute block" />
      </nuxt-link>
    </div>
    <div v-else>
      <div class="linkBoxItem__link -disabled relative" :class="iconClass(icon)">
        <slot />
        <span v-if="existsIcon(icon)" :class="iconClass(icon)" class="linkBoxItem__icon absolute block" />
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from '@vue/composition-api'

export default defineComponent({
  components: {
  },
  props: {
    icon: String,
    link: String,
    post: Object
  },
  setup() {
    const existsIcon = (icon: string) => {
      return !!icon
    }

    const iconClass = (icon: string) => {
      return existsIcon(icon) ? '-' + icon : ''
    }

    const existsLink = (link: object) => {
      return !!link
    }

    const existsPost = (post: object) => {
      return !!post
    }

    return {
      iconClass,
      existsIcon,
      existsLink,
      existsPost,
    }
  },
})
</script>

<style lang="scss" scoped>
.linkBoxItem {
  &__link {
    &.-prev {
      padding: 0 0 0 24px;
    }
    &.-next {
      padding: 0 14px 0 0;
    }
    &.-disabled {
      opacity: 0.3;
    }
  }
  &__icon {
    width: 10px;
    height: 10px;
    border-bottom: 1px solid #444;
    border-left: 1px solid #444;
    transform: rotate(45deg) translateY(-50%);
    top: 50%;
    left: 0;
    padding: 0 0 0 10px;
    &.-next {
      border: 0;
      border-top: 1px solid #444;
      border-right: 1px solid #444;
      left: auto;
      right: 0;
    }
  }
}
</style>
