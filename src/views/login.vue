<template>
  <div style="height:700px !important;">
    <loginComponent/>
  </div>
</template>

<script>
import loginComponent from "@/components/loginComponent.vue";
export default {
  name: 'login',
  components: {
    loginComponent,
  },
  data() {
    return {
      mystyle: {backgroundColor:"#16a085"}
    }
  },
}
</script>
<style>
html, 
body {
    margin: 0;
    padding: 0;
    background-color: #4C2467;
    height: 100hv;
}

</style>