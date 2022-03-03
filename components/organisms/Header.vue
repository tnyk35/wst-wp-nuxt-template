<template>
  <header class="header">
    <p class="header__title">
      <a href="https://tnyk.jp/" target="_blank" class="header__link">
        <img src="img/logo.svg" alt="ウェブスタジオTANI" class="base">
        <img src="img/logo_hover.svg" alt="" class="hover">
      </a>
    </p>
  </header>
</template>

<script lang="ts">
import { defineComponent } from '@nuxtjs/composition-api';

export default defineComponent({
})
</script>

<style lang="scss" scoped>
.header {

  &__title {
    position: fixed;
    top: 24px;
    left: 4%;
    z-index: 1;
  }

  &__link {
    $link: &;
    position: relative;
    width: 102px;
    height: 32px;
    display: block;
    @screen md {
      width: 82px;
      height: 26px;
    }
    &:hover {
      .hover {
        opacity: 1;
      }
    }
    img {
      position: absolute;
      z-index: 0;
      &.hover {
        transition: opacity 0.3s;
        opacity: 0;
        z-index: 1;
      }
    }
  }
}
</style>
