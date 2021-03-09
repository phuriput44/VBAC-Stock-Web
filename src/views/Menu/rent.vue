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
            <input class="vb-input-text" />
          </div>
          <div class="col text-left vb-mt-30" style="padding-left:1%;">
            <p class="txt-content">นามสกุลผู้ยืม</p>
            <input class="vb-input-text" />
          </div>
        </div>
        <div class="row vb-pt-20">
          <div class="col-2 text-left vb-pl-50" style="margin-top:89px;">
            <button @click="Add(addCatName)" class="btn-custom">
              เลือกรายการ
            </button>
          </div>

          <div
            class="col-9"
            style="width:875px; height:435px; margin-left: 5%;"
          >
            <table class="table table-bordered">
              <thead class="thead-dark">
                <tr>
                  <th scope="col-4">รูปภาพ</th>
                  <th scope="col-4">รายการ</th>
                  <th scope="col-2" style="width: 20%;">จำนวน</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="(item, inx) in stockData.slice(
                    (Page - 1) * PerPage,
                    Page * PerPage
                  )"
                  :key="inx"
                >
                  <td>{{ item.stock_pic }}</td>
                  <td>
                    {{ item.stock_id }}+{{ item.stock_name }}+{{
                      item.category_name
                    }}
                  </td>
                  <td>{{ item.stock_amount }}</td>
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
      </div>
      <div class="row">
        <div class="col-4 text-left vb-mt-30 vb-ml-30" style="padding-left:5%;">
            <p class="txt-content" style="">วันที่คืน</p>
            <input class="vb-input-text" type="date"/>
          </div>
      </div>
      <div class="row vb-mt-20" style="background-color:#E8E8E8">
        <div class="col">
          <button @click="save()" class="btn-custom float-right">
            บันทึก
          </button>
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
</template>

<script>
export default {
  data() {
    return {
      stockData: [],
      Page: 1,
      PerPage: 3,
    };
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
    Select() {},
  },
};
</script>

<style scoped>
.vb-input-text {
  padding: 10px 10px;
  width: 80%;
}
.container {
  height: 950px;
}
</style>
