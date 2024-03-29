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
        path: "/",
        name: "main",
        component: () => import("@/views/Menu/homeMain.vue"),
      },
      {
        path: "rent",
        name: "rent",
        component: () => import("@/views/Menu/rent.vue"),
      },
      {
        path: "add",
        name: "add",
        component: () => import("@/views/Menu/addMain.vue"),
        children: [
          {
            path: "stock",
            name: "stock",
            component: () => import("@/views/Menu/addMenu/addStock.vue"),
          },
          {
            path: "category",
            name: "category",
            component: () => import("@/views/Menu/addMenu/addCategory.vue"),
          },
          
        ],
      },
      {
        path: "withdraw",
        name: "withdraw",
        component: () => import("@/views/Menu/withdraw.vue"),
      },
      {
        path: "return",
        name: "return",
        component: () => import("@/views/Menu/return.vue"),
      },
      {
        path: "viewList",
        name: "viewList",
        component: () => import("@/views/Menu/viewList.vue"),
      },

      
    ],
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

export default router;
