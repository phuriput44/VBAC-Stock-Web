<template >
  <div class="vb-square-login">
    <div class="vb-text-login " style="border-bottom : 1px solid #7D7D7D;">คลังพัสดุ</div>
    <div class="row">
      <div
        class="vb-pt-20 vb-text-title-input"
      >
        Username
      </div>
    </div>
          <div class="row">
      <input class="vb-input-text" />
      </div>

    <div class="row">
      <div
        class="vb-pt-20 vb-text-title-input"
      >
        Password
      </div>
    </div>
    <div class="row">
            <input
        type="password"
        class="vb-input-text"
      />
    </div>
    <div>
      <button class="btn-custom vb-mt-50" >
        Login
      </button>
    </div>
  </div>
</template>

<script lang="ts">
import "../assets/css/Login.css";
export default{
    name:"loginComponent",
}

</script>

<style scoped>
.row{
  margin: 0px 50px !important;
  margin-bottom: 10px !important;
}

</style>