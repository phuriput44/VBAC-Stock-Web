<template>
  <div class="container">
    <div class="vb-pd-20 vb-pt-40">
      <div
        class="txt-title vb-pb-10 vb-pl-20 vb-pr-20 text-left"
        style="border-bottom : 1px solid #7D7D7D;"
      >
        รายการคืน
      </div>
      <table class="table table-profit mt-3">
        <thead style="color: white;" class="vb-mt-50">
          <tr style="background-color: #000000;">
            <th scope="col" style="width: 35%">ชื่อ-นามสกุล</th>
            <th scope="col">รายการ</th>
            <th scope="col">จำนวน</th>
            <th scope="col">วันที่คืน</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="(item, inx) in this.returnData.slice(
              (Page - 1) * PerPage,
              Page * PerPage
            )"
            :key="inx"
            class="vb-mt-30"
          >
            <td>
              <p style="padding-top : 5%;">
                {{ item.person_name + " " + item.person_surname }}
              </p>
            </td>
            <td class="vb-pl-50 vb-pt-30">
              <p class="float-left text-left">
                {{ item.stock_id }}<br />{{ item.stock_name }}<br />{{
                  item.category_name
                }}
              </p>
            </td>
            <td>
              <p style="padding-top : 20%;">
                {{ item.return_amoun }}
              </p>
            </td>
            <td><p style="padding-top : 12%;">{{ item.person_date }}</p></td>
            <td><button class="btn-custom">ยืนยันการคืน</button></td>
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
          {{ Page + "/" + Math.ceil(this.returnData.length / PerPage) }}
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
export default {
  name: "return",
  data() {
    return {
      returnData: [
        {
          person_name: "พหุคุณ",
          person_surname: "บุญปาน",
          stock_id: 1114,
          stock_name: "ปากกาจ้า",
          category_name: "Pen",
          person_date: "31-Mar-21",
          return_amoun: 20,
        },
        {
          person_name: "พหุคุณ",
          person_surname: "บุญปาน",
          stock_id: 1114,
          stock_name: "ปากกาจ้า",
          category_name: "Pen",
          person_date: "31-Mar-21",
          return_amoun: 20,
        },
        {
          person_name: "พหุคุณ",
          person_surname: "บุญปาน",
          stock_id: 1114,
          stock_name: "ปากกาจ้า",
          category_name: "Pen",
          person_date: "31-Mar-21",
          return_amoun: 20,
        },
        {
          person_name: "พหุคุณ",
          person_surname: "บุญปาน",
          stock_id: 1114,
          stock_name: "ปากกาจ้า",
          category_name: "Pen",
          person_date: "31-Mar-21",
          return_amoun: 20,
        },
        {
          person_name: "พหุคุณ",
          person_surname: "บุญปาน",
          stock_id: 1114,
          stock_name: "ปากกาจ้า",
          category_name: "Pen",
          person_date: "31-Mar-21",
          return_amoun: 20,
        },
        {
          person_name: "พหุคุณ",
          person_surname: "บุญปาน",
          stock_id: 1114,
          stock_name: "ปากกาจ้า",
          category_name: "Pen",
          person_date: "31-Mar-21",
          return_amoun: 20,
        },
        {
          person_name: "พหุคุณ",
          person_surname: "บุญปาน",
          stock_id: 1114,
          stock_name: "ปากกาจ้า",
          category_name: "Pen",
          person_date: "31-Mar-21",
          return_amoun: 20,
        },
      ],
      Page: 1,
      PerPage: 4,
    };
  },
  methods: {
    Previous() {
      if (this.Page != 1) {
        this.Page -= 1;
      }
    },
    Next() {
      if (this.Page != Math.ceil(this.returnData.length / this.PerPage)) {
        this.Page += 1;
      }
    },
  },
};
</script>

<style lang="scss" scoped></style>
