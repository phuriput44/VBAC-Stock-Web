<template>
  <div>
    <table class="table table-profit" :style="color">
      <thead style="color: white;" class="vb-mt-50">
        <tr style="background-color: #000000;" class="text-center">
          <th scope="col" v-for="(item,inx) in this.columnName" :key="inx" class="col-3" >{{item}}</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="(item, inx) in this.getStockData.slice(
            (Page - 1) * PerPage,
            Page * PerPage
          )"
          :key="inx"
          class="vb-mt-30"
        >
          <td><img :src="item.stock_pic" style="max-height:120px;" /></td>
          <td class="vb-pl-50 vb-pt-30">
            <p class="float-left text-left">
              {{ item.stock_id }}<br />{{ item.stock_name }}<br />{{
                item.category_name
              }}
            </p>
          </td>
          <td>
            <p v-if="item.stock_amount == 0" style="padding-top : 12%; color:red;" class="text-center">{{ item.stock_amount }}</p>
            <p v-else style="padding-top : 10%; color:black;" class="text-center">{{ item.stock_amount }}</p>
          </td>
          <td v-if="item.person_date">asd</td>
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
        {{ Page + "/" + Math.ceil(this.getStockData.length / PerPage) }}
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
</template>

<script>
export default {
  data() {
    return {
      Page: 1
    }
  },
  name: "stockTable",
  props: {
    getStockData: {
      type: null,
    },
    PerPage: { type: Number(), default: 4 },
    color: { type: String(), default: "background-color : white;" },
    columnName : {type: Array,
        default: () => ([
            "รูปภาพ",
            "รายการ",
            "คงเหลือ"
        ])}
  },
  methods: {
    Previous() {
      if (this.Page != 1) {
        this.Page -= 1;
      }
    },
    Next() {
      if (this.Page != Math.ceil(this.getStockData.length / this.PerPage)) {
        this.Page += 1;
      }
    },
  }
};
</script>

<style lang="scss" scoped></style>
