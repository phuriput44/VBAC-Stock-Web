<template>
  <div>
    <div class="row vb-mg-10" style="margin-top : -1% !important">
      <div class="col-4" style="padding-left:180px;">
        <p class="txt-content text-left" style="margin-left:0">
          ค้นหาด้วยหมวดหมู่
        </p>
        <select class="vb-input-text" v-model="findCat">
          <option value="none" selected disabled hidden>
            เลือกหมวดหมู่ที่จะค้นหา
          </option>
          <option
            v-for="i in categorylist"
            :key="i.category_id"
            :value="i.category_id"
            >{{ i.category_name }}</option
          >
        </select>
      </div>
      <div class="col-6 text-left" style="margin-top:4.5%">
        <button @click="Search(findCat)" class="btn-custom ">ค้นหา</button>
      </div>
    </div>
    <div class="container vb-pd-20">
      <stock-table :getStockData="this.stockData"></stock-table>
    </div>
  </div>
</template>

<script>
import stockTable from "../../components/stockTable.vue";
export default {
  components: { stockTable },
  data() {
    return {
      stockData: [],
      categorylist: [],
      findCat: 0,
    };
  },
  async mounted() {
    this.stockData = await this.$axios.get(
      "http://localhost/VBAC-Stock-Web/Stock/get_all.php"
    );
    this.stockData = this.stockData.data;
    console.log(this.stockData);
    this.categorylist = await this.$axios.get(
      "http://localhost/VBAC-Stock-Web/Category/get.php"
    );
    this.categorylist = this.categorylist.data;
    console.log(this.categorylist);
  },
  methods: {
    async Search(catType) {
        console.log(catType)
      this.stockData = await this.$axios.post(
        "http://localhost/VBAC-Stock-Web/Stock/get_by_cat.php",
        {
          finding : catType,
        }
      );
      this.stockData = this.stockData.data;
      console.log(this.stockData);
    },
  },
};
</script>

<style scoped>
.container {
  background-color: #e3d8e6;
  height: 100%;
}
</style>
