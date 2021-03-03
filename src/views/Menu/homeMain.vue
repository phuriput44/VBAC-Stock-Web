<template>
  <div>
    <div class="row" style="margin-right: 0px !important;">
      <div class="card col-4" style="margin-left: 12%;">
        <div class="row">
          <div class="col">
            <div class="txt-content-size85" style="float: left !important;">{{enable}}</div>
            <div
              class="txt-content-size40"
              style="float: left !important;"
            >
              เบิกได้
            </div>
            <div class="txt-content" style="float: left !important; color: #8F8C8C">
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
            <div class="txt-content-size85" style="float: left !important;">{{disable}}</div>
            <div
              class="txt-content-size40"
              style="float: left !important;"
            >
              หมดสต็อก
            </div>
            <div class="txt-content" style="float: left !important; color: #8F8C8C">
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
      <table class="table table-bordered table-profit">
        <thead style="color: white;">
          <tr style="background-color: #000000;">
            <th scope="col" style="width: 35%">รูปภาพ</th>
            <th scope="col">รายการ</th>
            <th scope="col">คงเหลือ</th>
          </tr>
        </thead>
        <tbody>
          <!-- <tr
              v-for="(item, inx) in tebleData.slice(
                (Page - 1) * PerPage,
                Page * PerPage
              )"
              :key="inx"
            >
              <th scope="row">{{ inx + 1 }}</th>
              <td>{{ item.country + "/" + item.dateAward }}</td>
              <td>{{ item.inCome }}</td>
              <td>{{ item.outCome }}</td>
              <td>{{ item.totalProfit }}</td>
            </tr>  -->
          <tr>
            <th><img :src="pictest" /></th>
            <td class="txt-content" style="text-align: left; padding-left: 5%;">
              00001 <br />ปากกา <br />Pen
            </td>
            <td style="color: red; padding-top: 3%; font-size: 36px;">0</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import "@/assets/css/Home.css";
export default {
  data() {
    return {
      pictest: require("@/assets/Imgs/Stock/pen.png"),
      enable: 249,
      disable: 0,
      picCorrect: require("@/assets/Imgs/Status/check.png"),
      picCross: require("@/assets/Imgs/Status/remove.png")
    };
  },
};
</script>

<style lang="scss" scoped>
img {
  max-width: 150px !important;
}
</style>
