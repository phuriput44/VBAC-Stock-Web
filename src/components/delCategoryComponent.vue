<template>
  <div class="container vb-mt-50 vb-pd-20 vb-pt-40">
    <div
      class="txt-title vb-pb-10 vb-pl-20 vb-pr-20 text-left"
      style="border-bottom : 1px solid #7D7D7D;"
    >
      ลบหมวดหมู่
    </div>
    <div class="row vb-pt-20">
      <div
        class="col-12 col-md-8 text-left vb-mt-30"
        style="padding-left:180px;"
      >
        <p class="txt-content">ชื่อหมวดหมู่</p>
        <select class="vb-input-text " v-model="deleteInx">
            
          <option value="none" selected disabled hidden>
                เลือกหมวดหมู่ที่จะลบ
              </option>
              <option v-for="i in categorylist" :key="i.id" :value="i.id-1">{{
                i.name
              }}</option>
        </select>
      </div>
      <div class="col-6 col-md-4 text-left vb-pl-50" style="margin-top:94px;">
        <button  @click="Delete(deleteInx)" class="btn-custom ">ลบ</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "delCatComponent",
  data() {
      return {
          deleteInx : 0,
          categorylist: [
                    {
                        id : 1,
                        name : "test1"
                    },
                    {
                        id : 2,
                        name : "test2"
                    },
                                        {
                        id : 3,
                        name : "test3"
                    },
                                        {
                        id : 4,
                        name : "test4"
                    },
                                        {
                        id : 5,
                        name : "test5"
                    },
                                        {
                        id : 6,
                        name : "test6"
                    },
                                        {
                        id : 7,
                        name : "test7"
                    },
                                        {
                        id : 8,
                        name : "test8"
                    },
                                        {
                        id : 9,
                        name : "test9"
                    },
                                        {
                        id : 10,
                        name : "test10"
                    },

                ],
      }
  },
  methods: {
      Delete(inx) {
         this.categorylist.splice(inx,1)
      }
  },
}
</script>

<style lang="scss" scoped>
.container {
  height: 320px;
  margin-bottom: 70px;
}
</style>
