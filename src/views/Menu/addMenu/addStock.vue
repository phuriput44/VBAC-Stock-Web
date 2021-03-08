<template>
  <div class="vb-pd-20 vb-pt-40">
    <div
      class="txt-title vb-pb-10 vb-pl-20 vb-pr-20 text-left"
      style="border-bottom : 1px solid #7D7D7D;"
    >
      เพิ่มรายการ
    </div>
    <div class="row vb-pt-20 vb-mt-20">
      <div class="col text-left vb-mt-30 vb-ml-30" style="padding-left:3%;">
        <p class="txt-content">รหัส</p>
        <input class="vb-input-text" v-model="stockData.id" />
      </div>
      <div class="col text-left vb-mt-30" style="padding-left:1%;">
        <p class="txt-content">ชื่อหมวดหมู่</p>
        <select class="vb-input-text " v-model="stockData.type">
          <option value="none" selected disabled hidden>
            เลือกหมวดหมู่ที่จะลบ
          </option>
          <option v-for="i in categorylist" :key="i.category_id" :value="i.category_id">{{
            i.category_name
          }}</option>
        </select>
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
      categorylist:{
      }
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
          this.stockData.pic = this.previewImage;
        };
        reader.readAsDataURL(file[0]);
        this.$emit("input", file[0]);
      }
      this.stockData.pic = `url(${this.previewImage})`;
    },
    cancel() {
      this.$router.push("/home/");
    },
    save() {
      console.log(this.stockData);
      this.$axios
        .post("http://localhost/VBAC-Stock-Web/Stock/post.php", {
          id : this.stockData.id,
          types : this.stockData.type,
          names : this.stockData.name,
          amount : this.stockData.amount.toString(),
          pic : this.stockData.pic
        }
        )
        .then((res) => {
          if (res.status == 200) {
            this.$swal
              .fire({
                icon: "success",
                text: "ทำการเพิ่มหมวดหมู่เสร็จสิ้น",
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
   async mounted() {
    this.categorylist = await this.$axios.get(
      "http://localhost/VBAC-Stock-Web/Category/get.php"
    );
    this.categorylist = this.categorylist.data;
    console.log(this.categorylist);
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
