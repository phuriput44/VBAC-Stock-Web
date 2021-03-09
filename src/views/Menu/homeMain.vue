<template>
  <div>
    <div class="row" style="margin-right: 0px !important;">
      <div class="card col-4" style="margin-left: 12%;">
        <div class="row">
          <div class="col">
            <div class="txt-content-size85" style="float: left !important;">
              {{ enable }}
            </div>
            <div class="txt-content-size40" style="float: left !important;">
              เบิกได้
            </div>
            <div
              class="txt-content"
              style="float: left !important; color: #8F8C8C"
            >
              รายการที่สามารถเบิกได้
            </div>
          </div>
          <div class="col" style="margin-top: 8%;">
            <img :src="picCorrect" />
          </div>
        </div>
      </div>
      <div class="card col-4" style="margin-left: 12%;">
        <div class="row">
          <div class="col">
            <div class="txt-content-size85" style="float: left !important;">
              {{ disable }}
            </div>
            <div class="txt-content-size40" style="float: left !important;">
              หมดสต็อก
            </div>
            <div
              class="txt-content"
              style="float: left !important; color: #8F8C8C"
            >
              รายการที่คงเหลือเป็น 0
            </div>
          </div>
          <div class="col" style="margin-top: 8%;">
            <img :src="picCross" />
          </div>
        </div>
      </div>
    </div>
    <div class="container" style="margin-top: 5%; margin-bottom: 5%;">
      <div
        class="txt-title"
        style="border-bottom: 1px solid #7D7D7D; text-align: left; padding: 2%"
      >
        รายการหมดสต็อก
      </div>
      <table class="table table-profit">
        <thead style="color: white;" class="vb-mt-50">
          <tr style="background-color: #000000;">
            <th scope="col" style="width: 35%">รูปภาพ</th>
            <th scope="col">รายการ</th>
            <th scope="col">คงเหลือ</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="(item, inx) in this.stockData.slice(
              (Page - 1) * PerPage,
              Page * PerPage
            )"
            :key="inx"
            class="vb-mt-30"
          >
            <td><img :src="item.stock_pic" style="max-height:120px;"/></td>
            <td class="vb-pl-50 vb-pt-30"><p class="float-left text-left">{{ item.stock_id }}<br>{{ item.stock_name }}<br>{{ item.category_name  }}</p></td>
            <td ><p style="padding-top : 20%; color:red;">{{ item.stock_amount }}</p></td>
          </tr>
        </tbody>
      </table>
      <ul class="text-right" style="padding-left: 10%; margin-top: 10px;">
        <li class="d-inline-block">
          <button @click="Previous()">
            <svg
              class="bi bi-caret-left-fill"
              width="50px"
              height="30px"
              viewBox="0 0 16 16"
              fill="currentColor"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M3.86 8.753l5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 00-1.659-.753l-5.48 4.796a1 1 0 000 1.506z"
              />
            </svg>
          </button>
        </li>
        <li class="page-num-profitLoss d-inline-block">
          {{ Page + "/" + Math.ceil(this.stockData.length / PerPage) }}
        </li>
        <li class="d-inline-block">
          <button @click="Next()">
            <svg
              class="bi bi-caret-right-fill"
              width="50px"
              height="30px"
              viewBox="0 0 16 16"
              fill="currentColor"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M12.14 8.753l-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 011.659-.753l5.48 4.796a1 1 0 010 1.506z"
              />
            </svg>
          </button>
        </li>
      </ul> 
    </div>
  </div>
</template>

<script>
import "@/assets/css/Home.css";
export default {
  data() {
    return {
      pictest: require("@/assets/Imgs/Stock/pen.png"),
      enable: 0,
      disable: 0,
      picCorrect: require("@/assets/Imgs/Status/check.png"),
      picCross: require("@/assets/Imgs/Status/remove.png"),
      stockData: [],
      Page: 1,
      PerPage: 4,
    };
  },
  async mounted() {
    this.stockData = await this.$axios.get(
      "http://localhost/VBAC-Stock-Web/Stock/get_home.php"
    );
    this.disable = this.stockData.data[0].disable;
    this.enable = this.stockData.data[1].enable;
    this.stockData = this.stockData.data[2];
    console.log(this.stockData);
  },
  methods: {
    Previous() {
      if (this.Page != 1) {
        this.Page -= 1;
      }
    },
    Next() {
      if (this.Page != Math.ceil(this.stockData.length / this.PerPage)) {
        this.Page += 1;
      }
    },
  }
};
</script>

<style lang="scss" scoped>
img {
  max-width: 150px !important;
}
</style>
