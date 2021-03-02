<template>
  <div>
    <div class="container">
      <router-view></router-view>
    </div>
    <div v-if="categoryOn"> <del-category-component></del-category-component> </div>
  </div>
</template>

<script>
import DelCategoryComponent from '../../components/delCategoryComponent.vue';
export default {
  name: "add",
  components: {
    DelCategoryComponent,
  },
  created() {
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
        this.categoryOn = true
      }
    });
  },
  data() {
    return {
      categoryOn: false
    }
  },
};
</script>
<style scoped></style>
