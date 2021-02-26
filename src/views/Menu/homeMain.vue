<template>
<div>
    <div class="row" style="margin-right: 0px !important;">
        <div class="card col-4" style="margin-left: 12%;"></div>
        <div class="card col-4" style="margin-left: 12%;"></div>
    </div>
    <div class="container" style="margin-top: 5%; margin-bottom: 5%;">
        <div class="txt-title" style="border-bottom: 1px solid #7D7D7D; text-align: left; padding: 2%">รายการหมดสต็อก</div>
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
                <th><img :src="pictest"/></th>
                <td class="txt-content" style="text-align: left; padding-left: 5%;">00001 <br>ปากกา <br>Pen</td>
                <td style="color: red; padding-top: 3%; font-size: 36px;">0</td>
            </tr>
          </tbody>
        </table>
    </div>
</div>
</template>

<script>
import "@/assets/css/Home.css"
    export default {
        data() {
            return {
                pictest: require("@/assets/Imgs/Stock/pen.png")
            }
        },
    }
</script>

<style lang="scss" scoped>
    img{
        max-width: 150px !important;
    }
</style>

