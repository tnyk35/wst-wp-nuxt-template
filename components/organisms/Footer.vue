<template>
  <footer class="footer absolute bottom-0 left-0 w-full">
    <!-- <a href="#pagetop" class="footer__top">
      <span>TOPへ</span>
    </a> -->
    <p class="copyright f-en text-center">
      <small class="f-en">
        © 2022 <a href="https://tnyk.jp" target="_blank">tnyk.jp</a>
      </small>
    </p>
  </footer>
</template>

<style lang="scss" scoped>
.footer {
  height: 154px;
  padding: 100px 0 30px;

  &__top {
    position: absolute;
    top: 0;
    right: 4%;
    @screen md {
      right: auto;
      left: 50%;
      margin-left: -12px;
    }
    &:hover {
      &::after {
        border-color: #527ac3;
      }
    }
    &::after {
      content: "";
      display: block;
      border-right: 1px solid #777;
      border-top: 1px solid #777;
      width: 40px;
      height: 40px;
      transform: rotate(-45deg);
      transition: border-color 0.3s;
      @screen md {
        width: 24px;
        height: 24px;
      }
    }
    span {
      visibility: hidden;
    }
  }

  small {
    font-size: 14px;
  }
}
</style>
