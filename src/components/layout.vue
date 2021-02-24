<template>
  <router-link :to="{ name: pagePath }">
    <div class="w-100 row vb-pl-20">
    <div class="col-md-3" style="max-width:30px ; max-height:30px; margin-top:17px;">
      <img
        :src="iconPath"
        style="max-width:30px; min-height:3 vb-mt-20"
      />
        </div>
        <div class="col-md-13">
      <p class="vb-mt-20 vb-ml-40 text-overflow d-inline-block" style="color:white; float:left;">
        {{ pageName }}
      </p></div>
    </div>
  </router-link>
</template>

<script>
export default {
  name: "Layout",
  props: {
    pagePath: {
      type: String,
      default: ""
    },
    iconPath: {
      type: String,
      default: ""
    },
    pageName: {
      type: String,
      default: ""
    }
  }
};
</script>
