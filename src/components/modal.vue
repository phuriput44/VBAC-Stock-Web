<template>
  <div>
    <button
      type="button"
      class="btn-custom"
      data-toggle="modal"
      data-target="#exampleModalCenter"
      @click="modalShow = true"
    >
      เลือกรายการ
    </button>
    <div
      class="modal fade"
      id="exampleModalCenter"
      role="dialog"
      aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true"
      data-backdrop="false"
      v-if="modalShow"
    >
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="background-color : #E8E8E8;">
          <div class="modal-header txt-title">
            เลือกรายการที่ต้องการ
          </div>
          <div class="modal-body txt-content">
            <div>
              <stock-table :getStockData="stockData" :PerPage="2"></stock-table>
            </div>
            <div class="row">
              <div class="col-2"></div>
              <div class="col-3 text-center vb-mt-20" style="padding-left:1%;">
                <p class="txt-content">ชื่อหมวดหมู่</p>
              </div>
              <div class="col-6">
                <select class="vb-input-text " v-model="returnData.inx">
                  <option value="none" selected disabled hidden>
                    เลือกหมวดหมู่ที่ต้องการ
                  </option>
                  <option
                    v-for="(i, inx) in stockData"
                    :key="i.stock_id"
                    :value="inx"
                    >{{ i.stock_name }}</option
                  >
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-2"></div>
              <div class="col-3 text-center vb-mt-20" style="padding-left:1%;">
                <p class="txt-content">จำนวน</p>
              </div>
              <div class="col-4">
                <input class="vb-input-text" v-model="returnData.amount" />
              </div>
            </div>
          </div>
          <div class="modal-footer">
                        <button type="button" class="btn-custom" @click="Select()">
              เลือก
            </button>
            <button
              type="button"
              class="btn-custom"
              data-dismiss="modal"
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
import stockTable from "./stockTable.vue";
export default {
  data() {
    return {
      returnData: {
        stock: {},
        inx: "",
        amount: "",
      },
      modalShow: true,
      stockData: [],
    };
  },
  components: { stockTable },
  name: "modal",
  methods: {
    async Select() {
      this.returnData.stock = this.stockData[this.returnData.inx];
      this.returnData.stock.stock_amount = this.returnData.amount;
      this.$parent.withdrawData.push(this.returnData.stock);
      this.$parent.withdrawID = {
        id: this.stockData[this.returnData.inx].stock_id,
        amount: parseInt( this.returnData.amount.toString()),
      };
      this.stockData = await this.$axios.get(
        "http://localhost/VBAC-Stock-Web/Stock/get_all.php"
      );
      this.stockData = this.stockData.data;
      this.stockData[
        this.returnData.inx
      ].stock_amount -= this.returnData.amount;
      this.modalShow = false;
      this.returnData = {
        stock: {},
        inx: "",
        amount: "",
      };
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
<style scoped></style>
