<template>
  <div>
    <div class="container">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
export default {
  name: "add",

  created() {
    if (
      window.location.pathname != "/home/add/category" &&
      window.location.pathname != "/home/add/stock"
    ) {
      this.$swal({
        title: "ต้องการจะเพิ่มอะไร",
        text: "ระบุสิ่งที่ต้องการจะเพิ่ม",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#DAABFF",
        cancelButtonColor: "#DAABFF",
        confirmButtonText: "เพิ่มรายการ",
        cancelButtonText: "เพิ่มหมวดหมู่",
      }).then((result) => {
        if (result.isConfirmed) {
          this.$router.push("/home/add/stock");
        } else {
          this.$router.push("/home/add/category");
          this.categoryOn = true;
        }
      });
    }
  },
  data() {
    return {
    };
  },
};
</script>
<style scoped></style>
