<template>
  <div>
    <button class="c-button__follow" :class="buttonColor" @click="clickFollow">
      <span>{{ buttonText }}</span>
    </button>
  </div>
</template>

<script>
import axios from "axios";

export default {
  props: {
    initialIsFollowedBy: {
      type: Boolean,
      default: false
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
      isFollowedBy: this.initialIsFollowedBy
    };
  },
  computed: {
    buttonColor() {
      return this.isFollowedBy ? "follow-state text-white" : "bg-white";
    },
    buttonIcon() {
      return this.isFollowedBy ? "fas fa-user-check" : "fas fa-user-plus";
    },
    buttonText() {
      return this.isFollowedBy ? "フォロー中" : "フォローする";
    }
  },
  methods: {
    clickFollow() {
      if (!this.authorized) {
        let confirm_result = window.confirm(
          "フォロー機能はログイン中のみ使用できます。ログイン画面へいきますか？"
        );
        if (confirm_result) {
          window.location.href = "/login";
        } else {
          return false;
        }
      }

      this.isFollowedBy ? this.unfollow() : this.follow();
    },
    async follow() {
      const response = await axios.put(this.endpoint);

      this.isFollowedBy = true;
    },
    async unfollow() {
      const response = await axios.delete(this.endpoint);

      this.isFollowedBy = false;
    }
  }
};
</script>
