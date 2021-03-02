<template>
  <div>
    <div class="header">
      <nav v-text="currentTime"></nav>
    </div>
    <div class="sidenav">
      <div style="font-size:29px; color:White;" class="vb-mb-20">
        คลังพัสดุเก็บของ
      </div>
      <layout
        v-for="(item, inx) in layoutMenu"
        :key="inx"
        :pagePath="item.pagepath"
        :iconPath="item.iconpath"
        :pageName="item.pagename"
      ></layout>
    </div>

    <div class="main">
      <div style="padding-top:100px; ">
      <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script>
import "../assets/css/Home.css";
import Layout from "@/components/layout.vue";
import moment from "moment";
import "moment/locale/th";
export default {
  name: "Home",
  components: {
    Layout,
  },
  data() {
    return {
      layoutMenu: [
        {
          pagepath: "main",
          iconpath: require("@/assets/Imgs/Menu/home.png"),
          pagename: "หน้าแรก",
        },
        {
          pagepath: "add",
          iconpath: require("@/assets/Imgs/Menu/add.png"),
          pagename: "เพิ่ม",
        },
        {
          pagepath: "main",
          iconpath: require("@/assets/Imgs/Menu/withdraw.png"),
          pagename: "เบิก",
        },
        {
          pagepath: "rent",
          iconpath: require("@/assets/Imgs/Menu/rent.png"),
          pagename: "ยืม",
        },
        {
          pagepath: "main",
          iconpath: require("@/assets/Imgs/Menu/return.png"),
          pagename: "คืน",
        },
        {
          pagepath: "main",
          iconpath: require("@/assets/Imgs/Menu/list.png"),
          pagename: "รายการ",
        },
        {
          pagepath: "main",
          iconpath: require("@/assets/Imgs/Menu/logout.png"),
          pagename: "ออกจากระบบ",
        },
      ],
      currentTime: null,
    };
  },
  methods: {
    updateCurrentTime() {
      this.currentTime = moment().format("Do MMMM YYYY ••• เวลา HH:mm:ss •••");
    },
  },
  created() {
    this.currentTime = moment().format("Do MMMM YYYY ••• เวลา HH:mm:ss •••");
    setInterval(() => this.updateCurrentTime(), 1 * 1000);
  },
};
</script>

<style lang="scss" scoped>
html, 
body {
    margin: 0;
    padding: 0;
    background-color: #E3D8E6;
    height: 100hv;
}
</style>
