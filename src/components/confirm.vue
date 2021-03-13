<template>
  <div>
    <button
      type="button"
      class="btn-custom float-right"
      data-toggle="modal"
      data-target="#modal2"
      @click="modalShow = true"
    >
      บันทึก
    </button>
    <div
      class="modal fade"
      id="modal2"
      role="dialog"
      aria-labelledby="modal2Title"
      aria-hidden="true"
      data-backdrop="false"
      v-if="modalShow"
    >
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="background-color : #E8E8E8;">
          <div class="modal-header txt-title pt-3">
            {{ "ชื่อ " + name + " " + " นามสกุล " + surname }}
          </div>
          <div class="modal-body txt-content">
            <div>
              <stock-table
                :getStockData="getStockData"
                :PerPage="2"
                :columnName="this.columnName"
              ></stock-table>
            </div>
          </div>

          <div class="modal-footer">
            <button
              v-if="this.$parent.returnDate == null"
              type="button"
              class="btn-custom"
              @click="Withdraw()"
            >
              ตกลง
            </button>
            <button v-else type="button" class="btn-custom" @click="Rent()">
              ตกลง
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
  components: { stockTable },
  data() {
    return {
      modalShow: true,
      columnName: ["รูปภาพ", "รายการ", "จำนวนที่เบิก"],
    };
  },
  props: {
    getStockData: {
      type: null,
    },
    name: {
      type: String,
    },
    surname: {
      type: String,
    },
    withdrawID: {
      type: null,
    },
    returnDate: {
      type: null,
    },
    pathAxios: {
      type: String,
    },
  },
  methods: {
    Withdraw() {
      this.$axios
        .post(this.pathAxios, {
          id: this.withdrawID.id,
          amount: this.withdrawID.amount,
        })
        .then((res) => {
          if (res.status == 200) {
            console.log(res.data);
            this.$swal
              .fire({
                icon: "success",
                text: "ทำการเบิกเสร็จสิ้น",
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
    Rent() {
      this.$axios
        .post(this.pathAxios, {
          id: this.withdrawID.id,
          amount: this.withdrawID.amount,
          name: this.name,
          surname: this.surname,
          returnDate: this.returnDate,
        })
        .then((res) => {
          if (res.status == 200) {
            console.log(res.data);
            this.$swal
              .fire({
                icon: "success",
                text: "ทำการยืมเสร็จสิ้น",
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
};
</script>
<style scoped></style>
