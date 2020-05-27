
import axios from 'axios';//追記


<template>
  <div class="c-button__likeWrap">
    <button type="button" class="c-button__like">
      <!-- TODO: スタイル後から調整する -->
      <img
        :src="'/images/like-icon_w.svg'"
        style="width:2rem;height:2rem;"
        alt="いいねボタン"
        :class="{'red-text':this.isLikedBy}"
        @click="clickLike"
      />
    </button>
    <transition name="fade">
      <span class="c-button__like--count">{{ countLikes }}</span>
    </transition>
  </div>
</template>

<script>
import axios from "axios";

export default {
  props: {
    initialIsLikedBy: {
      type: Boolean,
      default: false
    },
    initialCountLikes: {
      type: Number,
      default: 0
    },
    authorized: {
      type: Boolean,
      default: false
    },
    endpoint: {
      type: String
    }
  },
  data() {
    return {
      isLikedBy: this.initialIsLikedBy,
      countLikes: this.initialCountLikes
    };
  },
  methods: {
    clickLike() {
      if (!this.authorized) {
        let confirm_result = window.confirm(
          "いいね機能はログイン中のみ使用できます。ログイン画面へいきますか？"
        );
        if (confirm_result) {
          window.location.href = "/login";
        } else {
          return false;
        }
      }

      this.isLikedBy ? this.unlike() : this.like();
    },
    async like() {
      const response = await axios.put(this.endpoint);

      this.isLikedBy = true;
      this.countLikes = response.data.countLikes;
    },
    async unlike() {
      const response = await axios.delete(this.endpoint);

      this.isLikedBy = false;
      this.countLikes = response.data.countLikes;
    }
  }
};
</script>
