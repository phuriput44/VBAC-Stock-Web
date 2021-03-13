<template>
  <div>
    <div class="container">
      <div class="vb-pd-20 vb-pt-40">
        <div
          class="txt-title vb-pb-10 vb-pl-20 vb-pr-20 text-left"
          style="border-bottom : 1px solid #7D7D7D;"
        >
          แบบฟอร์มการยืม
        </div>
        <div class="row vb-pt-20 vb-mt-20">
          <div class="col text-left vb-mt-30 vb-ml-30" style="padding-left:3%;">
            <p class="txt-content">ชื่อผู้ยืม</p>
            <input class="vb-input-text" v-model="name" />
          </div>
          <div class="col text-left vb-mt-30" style="padding-left:1%;">
            <p class="txt-content">นามสกุลผู้ยืม</p>
            <input class="vb-input-text" v-model="surname" />
          </div>
        </div>
        <div class="row vb-pt-20">
          <div class="col-3 text-left vb-pl-50" style="margin-top:89px;">
            <modal :getData="this.stockData"></modal>
            <div class="text-left vb-mt-30 " style="padding-left:5%;">
            <p class="txt-content" style="">วันที่คืน</p>
            <input class="vb-input-text" type="date" v-model="returnDate" />
            
        
          </div>
          </div>
          
          <div
            class="col"
            style="width:875px; height:435px; margin-left: 5%;"
          >
            <stock-table
              :getStockData="this.withdrawData"
              :PerPage="2"
              :columnName="this.columnName"
            ></stock-table>
          </div>
        </div>

        <div class="row vb-mt-20" style="background-color:#E8E8E8">
          <div class="col">
            <confirm
              :getStockData="this.withdrawData"
              :name="this.name"
              :surname="this.surname"
              :withdrawID="this.withdrawID"
              :returnDate="this.returnDate"
              pathAxios="http://localhost/VBAC-Stock-Web/Stock/rent.php"
            ></confirm>
          </div>
          <div class="col">
            <button
              @click="cancel()"
              class="btn-custom float-left"
              style="background-color:grey;"
            >
              ยกเลิก
            </button>
          </div>
         
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Confirm from "../../components/confirm.vue";
import modal from "../../components/modal.vue";
import StockTable from "../../components/stockTable.vue";

export default {
  components: { modal, StockTable, Confirm },
  data() {
    return {
      stockData: [],
      name: "",
      surname: "",
      columnName: ["รูปภาพ", "รายการ", "จำนวนที่ยืม"],
      withdrawData: [],
      withdrawID: {},
      returnDate : ""
    };
  },
  methods: {
    cancel() {
      this.$router.push("/home/");
    },
  },
  async mounted() {
    this.stockData = await this.$axios.get(
      "http://localhost/VBAC-Stock-Web/Stock/get_all.php"
    );
    this.stockData = this.stockData.data;
    console.log(this.stockData);
  },
};
</script>

<style scoped>
.vb-input-text {
  padding: 10px 10px;
  width: 80%;
}
.container {
  height: 850px;
}
</style>
