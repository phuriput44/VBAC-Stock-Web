<template>
  <div class="vb-pd-20 vb-pt-40">
    <div
      class="txt-title vb-pb-10 vb-pl-20 vb-pr-20 text-left"
      style="border-bottom : 1px solid #7D7D7D;"
    >
      เพิ่มหมวดหมู่
    </div>
    <div class="row vb-pt-20 vb-mt-20">
      <div
        class="col-12 col-md-8 text-left vb-mt-30"
        style="padding-left:180px;"
      >
        <p class="txt-content">ชื่อหมวดหมู่</p>
        <input class="vb-input-text" v-model="addCatName" />
      </div>
      <div class="col-6 col-md-4 text-left vb-pl-50" style="margin-top:89px;">
        <button @click="Add()" class="btn-custom">เพิ่ม</button>
      </div>
    </div>
    <div style="width:875px; height:435px; margin-left:10%;">
      <table class="table table-bordered" style="margin-top: 8%;">
        <thead class="thead-dark">
          <tr>
            <th scope="col-3">#</th>
            <th scope="col-6" style="width:70%">ชื่อ</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="(item, inx) in categorylist.slice(
              (Page - 1) * PerPage,
              Page * PerPage
            )"
            :key="inx"
          >
            <td>{{ item.category_id }}</td>
            <td>{{ item.category_name }}</td>
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
          {{ Page + "/" + Math.ceil(this.categorylist.length / PerPage) }}
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
    <del-category-component :categoryData="this.categorylist" />
  </div>
</template>

<script>
import DelCategoryComponent from "@/components/delCategoryComponent.vue";

export default {
  name: "category",
  data() {
    return {
      addCatName: "",
      categorylist: [],
      Page: 1,
      PerPage: 5,
    };
  },
  methods: {
    Previous() {
      if (this.Page != 1) {
        this.Page -= 1;
      }
    },
    Next() {
      if (this.Page != Math.ceil(this.categorylist.length / this.PerPage)) {
        this.Page += 1;
      }
    },
    Add() {
      this.$axios
        .post("http://localhost/VBAC-Stock-Web/Category/post.php", {
          catName: this.addCatName,
        })
        .then((res) => {
          if (res.status == 200) {
            this.$swal
              .fire({
                icon: "success",
                text: "ทำการเพิ่มหมวดหมู่เสร็จสิ้น",
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
  async mounted() {
    this.categorylist = await this.$axios.get(
      "http://localhost/VBAC-Stock-Web/Category/get.php"
    );
    this.categorylist = this.categorylist.data;
    console.log(this.categorylist);
  },
  components: {
    DelCategoryComponent,
  },
};
</script>

<style lang="scss" scoped>
.vb-input-text {
  padding: 10px 10px;
}
</style>
