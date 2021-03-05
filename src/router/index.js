import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "login",
    component: () => import("@/views/login.vue"),
  },
  {
    path: "/home",
    name: "home",
    component: () => import("@/views/home.vue"),
    children: [
      {
        path: "main",
        name: "main",
        component: () => import("@/views/Menu/homeMain.vue"),
      },
      {
        path: "rent",
        name: "rent",
        component: () => import("@/views/Menu/rent.vue"),
      },
      {
        path: "withdraw",
        name: "withdraw",
        component: () => import("@/views/Menu/withdraw.vue")
      }
    ],
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

export default router;
