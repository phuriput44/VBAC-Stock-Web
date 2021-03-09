<template>
  <div class="container vb-mt-50 vb-pd-20 vb-pt-40" style="margin-left:-12px;">
    <div
      class="txt-title vb-pb-10 vb-pl-20 vb-pr-20 text-left"
      style="border-bottom : 1px solid #7D7D7D;"
    >
      ลบหมวดหมู่
    </div>
    <div class="row vb-pt-20">
      <div
        class="col-12 col-md-8 text-left vb-mt-30"
        style="padding-left:180px;"
      >
        <p class="txt-content">ชื่อหมวดหมู่</p>
        <select class="vb-input-text " v-model="deleteInx">
          <option value="none" selected disabled hidden>
            เลือกหมวดหมู่ที่จะลบ
          </option>
          <option v-for="i in categoryData" :key="i.category_id" :value="i.category_id">{{
            i.category_name
          }}</option>
        </select>
      </div>
      <div class="col-6 col-md-4 text-left vb-pl-50" style="margin-top:94px;">
        <button @click="Delete()" class="btn-custom ">ลบ</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "delCatComponent",
  data() {
    return {
      deleteInx: 0,
    };
  },
  methods: {
    Delete() {
      this.$axios
        .post("http://localhost/VBAC-Stock-Web/Category/delete.php", {
          delID : this.deleteInx,
        })
        .then((res) => {
          if (res.status == 200) {
            this.$swal
              .fire({
                icon: "success",
                text: "ทำการลดหมวดหมู่เสร็จสิ้น",
              })
              .then((result) => {
                if (result.isConfirmed) {
                  window.location.reload();
                }
              });
          }
        })
        .catch((err) => console.error(err));
    },
  },
  props: {
    categoryData: {
      type: Array,
      required: true
    },
  },
  created () {
    this.categorylist = this.categoryData;
  },
};
</script>

<style lang="scss" scoped>
.container {
  height: 320px;
  margin-bottom: 70px;
}
</style>
