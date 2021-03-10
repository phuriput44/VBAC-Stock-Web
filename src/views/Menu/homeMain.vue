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
      <stock-table :getStockData="this.stockData"></stock-table>
    </div>
  </div>
</template>

<script>
import "@/assets/css/Home.css";
import StockTable from '../../components/stockTable.vue';
export default {
  components: {
    StockTable,
  },
  data() {
    return {
      pictest: require("@/assets/Imgs/Stock/pen.png"),
      enable: 0,
      disable: 0,
      picCorrect: require("@/assets/Imgs/Status/check.png"),
      picCross: require("@/assets/Imgs/Status/remove.png"),
      stockData: [],
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
  
};
</script>

<style lang="scss" scoped>
img {
  max-width: 150px !important;
}
</style>
