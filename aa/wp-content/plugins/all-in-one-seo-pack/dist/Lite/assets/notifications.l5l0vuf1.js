import{c as s,t as a,E as r,b as c,o as u,Y as p}from"./js/runtime-dom.esm-bundler.h3clfjuw.js";import{c as l}from"./js/index.ba51ghj9.js";import"./js/translations.b896ab1m.js";import{_ as f}from"./js/_plugin-vue_export-helper.oebm7xum.js";import{_ as m}from"./js/default-i18n.hohxoesu.js";import"./js/helpers.lwqbledo.js";const d="all-in-one-seo-pack",w={data(){return{interval:null,display:!1,strings:{newNotifications:m("You have new notifications!",d)}}},methods:{showNotificationsPopup(){if(this.interval&&window.aioseoNotifications&&parseInt(window.aioseoNotifications.newNotifications)){this.display=!0;const i=document.querySelector("#wp-admin-bar-aioseo-main");i&&i.classList.add("new-notifications")}},hideNotificationsPopup(){this.interval=null,setTimeout(()=>{this.display=!1;const i=document.querySelector("#wp-admin-bar-aioseo-main");i&&i.classList.remove("new-notifications")},500)}},created(){this.interval=setInterval(this.showNotificationsPopup,500),this.showNotificationsPopup(),setTimeout(()=>{this.interval=null,this.display=!1},5e3)}};function _(i,o,N,v,e,t){return e.display?(u(),s("div",{key:0,onClick:o[0]||(o[0]=r((...n)=>t.hideNotificationsPopup&&t.hideNotificationsPopup(...n),["stop"])),onMouseover:o[1]||(o[1]=(...n)=>t.hideNotificationsPopup&&t.hideNotificationsPopup(...n)),class:"aioseo-menu-new-notifications"},a(e.strings.newNotifications),33)):c("",!0)}const h=f(w,[["render",_]]),y=document.querySelector("#aioseo-menu-new-notifications");if(y){const i=p({...h,name:"Standalone/Notifications"});l(i),i.mount("#aioseo-menu-new-notifications")}