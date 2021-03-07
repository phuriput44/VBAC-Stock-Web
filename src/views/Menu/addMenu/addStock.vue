<template>
  <div class="vb-pd-20 vb-pt-40">
    <div
      class="txt-title vb-pb-10 vb-pl-20 vb-pr-20 text-left"
      style="border-bottom : 1px solid #7D7D7D;"
    >
      เพิ่มรายการหมวดหมู่
    </div>
    <div class="row vb-pt-20 vb-mt-20">
      <div class="col text-left vb-mt-30 vb-ml-30" style="padding-left:3%;">
        <p class="txt-content">ชื่อหมวดหมู่</p>
        <input class="vb-input-text" v-model="stockData.id" />
      </div>
      <div class="col text-left vb-mt-30" style="padding-left:1%;">
        <p class="txt-content">ชื่อหมวดหมู่</p>
        <input class="vb-input-text" v-model="stockData.type" />
      </div>
    </div>
    <div class="row vb-pt-20">
      <div class="col text-left vb-ml-30" style="padding-left:3%;">
        <p class="txt-content">ชื่อรายการ</p>
        <input class="vb-input-text" v-model="stockData.name" />
      </div>
      <div class="col text-left" style="padding-left:1%;">
        <p class="txt-content">จำนวน</p>
        <input class="vb-input-text" v-model="stockData.amount" />
      </div>
    </div>
    <div class="row vb-mt-30">
      <div class="col-5 vb-pr-30">
        <div
          class="imagePreviewWrapper float-right"
          :style="{ 'background-image': `url(${previewImage})` }"
          @click="selectImage"
        ></div>
      </div>
      <div class="col text-left txt-content " style="margin-top:10%">
        <input ref="fileInput" type="file" @input="pickFile" />
      </div>
    </div>
    <div class="row vb-mt-20" style="background-color:#E8E8E8">
      <div class="col-10">
        <button @click="save()" class="btn-custom float-right">
          บันทึก
        </button>
      </div>
      <button
        @click="cancel()"
        class="btn-custom float-right"
        style="background-color:grey;"
      >
        ยกเลิก
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "stock",
  data() {
    return {
      previewImage: null,
      stockData: {
        id: "",
        type: "",
        name: "",
        amount: "",
        pic: "",
      },
    };
  },
  methods: {
    selectImage() {
      this.$refs.fileInput.click();
    },
    pickFile() {
      let input = this.$refs.fileInput;
      let file = input.files;
      if (file && file[0]) {
        let reader = new FileReader();
        reader.onload = (e) => {
          this.previewImage = e.target.result;
        };
        reader.readAsDataURL(file[0]);
        this.$emit("input", file[0]);
      }
      this.stockData.pic = `url(${this.previewImage})`;
      console.log(atob(this.previewImage));
    },
    cancel() {
      this.$router.push("/home/");
    },
    save() {
      console.log(this.stockData.id);
    },
  },
};
</script>

<style lang="scss" scoped>
.vb-input-text {
  padding: 10px 10px;
  width: 80%;
}
.imagePreviewWrapper {
  width: 250px;
  height: 250px;
  display: block;
  cursor: pointer;
  margin: 0 auto 30px;
  background-size: cover;
  background-position: center center;
}
.btn-custom {
  margin-bottom: 2%;
}
</style>
