<template>
  <div class="vb-square-login">
    <div class="vb-text-login " style="border-bottom : 1px solid #7D7D7D;">
      คลังพัสดุ
    </div>
    <div class="row">
      <div class="vb-pt-20 vb-text-title-input">
        Username
      </div>
    </div>
    <div class="row">
      <input class="vb-input-text" v-model="userData.getid" />
    </div>

    <div class="row">
      <div class="vb-pt-20 vb-text-title-input">
        Password
      </div>
    </div>
    <div class="row">
      <input
        type="password"
        class="vb-input-text"
        v-model="userData.getpassword"
      />
    </div>
    <div>
      <button @click="Login()" class="btn-custom vb-mt-50">
        Login
      </button>
    </div>
  </div>
</template>

<script>
import "../assets/css/Login.css";
export default {
  name: "loginComponent",
  data() {
    return {
      userData: {
        getid: "",
        getpassword: "",
      },
    };
  },
  methods: {
    Login() {
      if (this.userData.getid == "" || this.userData.getpassword == "") {
        this.$swal.fire({
          icon: "error",
          text: "โปรดกรอกชื่อบัญชี หรือ รหัสผ่านให้เรียบร้อยย",
        });
        return;
      }
      this.$axios
        .post("http://localhost/VBAC-Stock-Web/User/login.php", {
          username: this.userData.getid,
          password: this.userData.getpassword,
        })
        .then((res) => {
          if (res.data == "Complete") {
            window.location.pathname = "/home/";
          } else {
            this.$swal.fire({
              icon: "error",
              text: "ชื่อผู้ใช้หรือรหัสผ่านผิด",
            });
          }
        })
        .catch((error) => {
          if (error.response.status == 400) {
            this.$swal.fire({
              icon: "error",
              text: error.response.data.message,
            });
            return;
          }
          console.error(error);
        });
    },
  },
};
</script>

<style scoped>
.row {
  margin: 0px 50px !important;
  margin-bottom: 10px !important;
}
</style>
