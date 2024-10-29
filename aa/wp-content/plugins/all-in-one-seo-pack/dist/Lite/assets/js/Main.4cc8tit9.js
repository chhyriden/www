import{b as R,i as x,m as O,l as U}from"./index.ba51ghj9.js";import{l as D}from"./license.ij9c7ra4.js";import{D as h}from"./datetime.hyfm7zez.js";import{u as J}from"./GoogleSearchConsole.gq5vl5zt.js";import{C as w,_ as P}from"./Caret.dwp6xpza.js";import"./translations.b896ab1m.js";import{_}from"./_plugin-vue_export-helper.oebm7xum.js";import{_ as o}from"./default-i18n.hohxoesu.js";import{v as m,o as a,k as c,l as p,a as f,t as d,b as l,c as S,C as v,x as C,q as y,F}from"./runtime-dom.esm-bundler.h3clfjuw.js";import{B as N}from"./DatePicker.hz9n2i3u.js";import{_ as V}from"./ConnectCta.kd4ryk1u.js";import{C as G}from"./Blur.mu93d3e2.js";import{C as z}from"./Index.fxj7ex2u.js";import $ from"./ContentRankings.meegat88.js";import{C as q}from"./Index.jq0lth54.js";import E from"./Dashboard.6tqa8p3z.js";import I from"./KeywordRankTracker.a6y819ox.js";import j from"./SeoStatistics.c03ydlk4.js";import"./helpers.lwqbledo.js";import"./upperFirst.bgyeasim.js";import"./_stringToArray.mpukyt2g.js";import"./toString.oppn28a8.js";import"./Calendar.fbofsn3b.js";import"./pick.e9wcosvf.js";import"./_baseSet.ipousrvi.js";import"./_getTag.fx9iqlmr.js";import"./debounce.mrkkoh0r.js";import"./toNumber.i3xpxrn8.js";import"./_baseTrim.ohbpllmu.js";import"./isEqual.dwjbg1yu.js";import"./_baseIsEqual.j7gru8tk.js";import"./vue-router.eypfdvl5.js";import"./allowed.o46uhc7o.js";/* empty css             */import"./params.k8e95b6q.js";import"./Tabs.opo0ypfq.js";import"./TruSeoScore.das28gz4.js";import"./postSlug.ms4f44w2.js";import"./metabox.y83zoorm.js";import"./cleanForSlug.dzbbaoug.js";import"./regex.bekpgw04.js";import"./ProBadge.e32os6n3.js";import"./Information.djrr3pec.js";import"./Ellipse.mhzh8c2h.js";import"./Slide.dop8j51m.js";import"./Header.k1z0z7e2.js";import"./addons.eq04tz3m.js";import"./LicenseKeyBar.gh3b5rkr.js";import"./ScrollTo.ntqtkazp.js";import"./LogoGear.gxsz2m6s.js";import"./AnimatedNumber.mqxvivps.js";import"./numbers.busvl4mt.js";import"./Logo.nueehhao.js";import"./index.kaabvvzj.js";import"./Support.eets7z2w.js";import"./date.ozs95ujh.js";import"./constants.hcfrsngk.js";import"./Url.e5jo61ge.js";import"./Exclamation.f0pmbpi9.js";import"./Gear.dx9icaxx.js";import"./vue3-apexcharts.n0h2b4pa.js";import"./Row.h4gujlzc.js";import"./PostsTable.e4ng6a7n.js";import"./PostTypes.pd67gy5m.js";import"./Statistic.cmciac16.js";import"./_baseClone.n1l9l19s.js";import"./_arrayEach.n8ou32wp.js";import"./Tooltip.i4md1nj9.js";import"./WpTable.i82lv9f1.js";import"./ScoreButton.erl7ixj3.js";import"./Table.bzjzsap0.js";import"./IndexStatus.em5kj4fs.js";import"./CheckSolid.ktze41sq.js";import"./Mobile.livanyta.js";import"./Checkmark.d5kkjaf5.js";import"./ExclamationSolid.jc4spp6p.js";import"./Link.lo5szjwl.js";import"./RequiredPlans.fcb8z72b.js";import"./License.bd4fwzg0.js";import"./Card.0q0mr1wq.js";import"./Overview.dkohrdnj.js";import"./DonutChartWithLegend.o8q92g72.js";import"./KeywordsGraph.o6glhp9k.js";import"./Graph.chc9u9ci.js";import"./SeoStatisticsOverview.cp9yx8mz.js";import"./List.f5ej79xc.js";import"./Statistics.l9vto0az.js";import"./SettingsRow.d9u0swi1.js";import"./Editor.ipgvvrs0.js";import"./Index.kqt70nj0.js";import"./External.lyui8nzf.js";import"./Star.pcr8i0t9.js";const K="all-in-one-seo-pack",Y={setup(){return{optionsStore:R(),searchStatisticsStore:x()}},components:{CoreAlert:w},data(){return{error:o("Your connection with Google Search Console has expired or is invalid. Please check that your site is verified in Google Search Console and try to reconnect. If the problem persists, please contact our support team.",K)}},computed:{invalidAuthentication(){var t,e;return this.searchStatisticsStore.unverifiedSite||typeof((e=(t=this.optionsStore.internalOptions.internal)==null?void 0:t.searchStatistics)==null?void 0:e.profile)!="object"}}};function Z(t,e,r,i,u,s){const g=m("core-alert");return s.invalidAuthentication?(a(),c(g,{key:0,class:"aioseo-input-error aioseo-search-statistics-authentication-alert",type:"red"},{default:p(()=>[f("strong",null,d(u.error),1)]),_:1})):l("",!0)}const H=_(Y,[["render",Z]]),Q={};function W(t,e){return a(),S("div")}const X=_(Q,[["render",W]]),tt={};function et(t,e){return a(),S("div")}const st=_(tt,[["render",et]]),n="all-in-one-seo-pack",at={emits:["rolling"],setup(){const{connect:t,loading:e}=J();return{connect:t,licenseStore:O(),links:U,loading:e,searchStatisticsStore:x()}},components:{AuthenticationAlert:H,BaseButton:P,BaseDatePicker:N,ConnectCta:V,CoreAlert:w,CoreBlur:G,CoreMain:z,ContentRankings:$,Cta:q,Dashboard:E,KeywordRankTracker:I,PostDetail:X,Settings:st,SeoStatistics:j},data(){return{maxDate:null,minDate:null,strings:{pageName:o("Search Statistics",n),sampleDataAlert:o("Sample data is available for you to explore. Connect your site to Google Search Console to receive insights on how content is being discovered. Identify areas for improvement and drive traffic to your website.",n),ctaButtonText:o("Connect to Google Search Console",n),ctaUnlockButtonText:o("Unlock Search Statistics",n)}}},computed:{defaultRange(){const t=new Date(`${this.searchStatisticsStore.range.start} 00:00:00`),e=new Date(`${this.searchStatisticsStore.range.end} 00:00:00`);return[t,e]},excludeTabs(){const t=["post-detail"];return(this.licenseStore.isUnlicensed||!D.hasCoreFeature("search-statistics"))&&t.push("settings"),t},isSettings(){return this.$route.name==="settings"},showSampleDataUnlockCta(){return D.hasCoreFeature("search-statistics")&&!this.searchStatisticsStore.isConnected||this.searchStatisticsStore.unverifiedSite},showConnectCta(){return(D.hasCoreFeature("search-statistics")&&!this.searchStatisticsStore.isConnected||this.searchStatisticsStore.unverifiedSite)&&!this.isSettings},showDatePicker(){const t=this.searchStatisticsStore.isConnected&&!this.searchStatisticsStore.unverifiedSite,e=this.searchStatisticsStore.range.start&&this.searchStatisticsStore.range.end;return!["settings","content-rankings"].includes(this.$route.name)&&t&&e},containerClasses(){const t=[];return this.searchStatisticsStore.fetching&&t.push("aioseo-blur"),t},getOriginalMaxDate(){return this.searchStatisticsStore.latestAvailableDate?h.fromFormat(this.searchStatisticsStore.latestAvailableDate,"yyyy-MM-dd").setZone(h.zone)||h.local().plus({days:-2}):h.local().plus({days:-2})},datepickerShortcuts(){return[{text:o("Last 7 Days",n),value:()=>(window.aioseoBus.$emit("rolling","last7Days"),[this.getOriginalMaxDate.plus({days:-6}).toJSDate(),this.getOriginalMaxDate.toJSDate()])},{text:o("Last 28 Days",n),value:()=>(window.aioseoBus.$emit("rolling","last28Days"),[this.getOriginalMaxDate.plus({days:-27}).toJSDate(),this.getOriginalMaxDate.toJSDate()])},{text:o("Last 3 Months",n),value:()=>(window.aioseoBus.$emit("rolling","last3Months"),[this.getOriginalMaxDate.plus({days:-89}).toJSDate(),this.getOriginalMaxDate.toJSDate()])}]}},methods:{isDisabledDate(t){return this.minDate===null?!0:t.getTime()<this.minDate.getTime()||t.getTime()>this.maxDate.getTime()},onDateChange(t,e){this.searchStatisticsStore.setDateRange({dateRange:t,rolling:e})},highlightShortcut(t){if(!t)return;document.querySelectorAll(".el-picker-panel__shortcut").forEach(r=>{switch(r.innerText){case o("Last 7 Days",n):t==="last7Days"?r.classList.add("active"):r.classList.remove("active");break;case o("Last 28 Days",n):t==="last28Days"?r.classList.add("active"):r.classList.remove("active");break;case o("Last 3 Months",n):t==="last3Months"?r.classList.add("active"):r.classList.remove("active");break;case o("Last 6 Months",n):t==="last6Months"?r.classList.add("active"):r.classList.remove("active");break;default:r.classList.remove("active")}})}},mounted(){this.minDate=h.now().plus({months:-16}).toJSDate(),this.maxDate=this.getOriginalMaxDate.toJSDate()}},rt=f("br",null,null,-1),ot=f("br",null,null,-1),it={key:1,class:"connect-cta"};function nt(t,e,r,i,u,s){const g=m("base-date-picker"),b=m("authentication-alert"),k=m("base-button"),L=m("core-alert"),B=m("core-blur"),M=m("connect-cta"),T=m("core-main");return a(),c(T,{"page-name":u.strings.pageName,"exclude-tabs":s.excludeTabs,showTabs:!s.excludeTabs.includes(t.$route.name),containerClasses:s.containerClasses},{extra:p(()=>[s.showDatePicker?(a(),c(g,{key:0,onChange:s.onDateChange,onUpdated:e[0]||(e[0]=A=>s.highlightShortcut(A)),clearable:!1,defaultValue:s.defaultRange,defaultRolling:i.searchStatisticsStore.rolling,isDisabledDate:s.isDisabledDate,shortcuts:s.datepickerShortcuts,size:"small"},null,8,["onChange","defaultValue","defaultRolling","isDisabledDate","shortcuts"])):l("",!0)]),default:p(()=>[f("div",null,[v(b),i.searchStatisticsStore.shouldShowSampleReports?(a(),S(F,{key:0},[v(L,{class:"description sample-data-alert",type:"yellow",onCloseAlert:()=>{}},{default:p(()=>[C(d(u.strings.sampleDataAlert)+" ",1),rt,ot,s.showSampleDataUnlockCta?(a(),c(k,{key:0,type:"green",size:"small",onClick:i.connect,loading:i.loading},{default:p(()=>[C(d(u.strings.ctaButtonText),1)]),_:1},8,["onClick","loading"])):l("",!0),s.showSampleDataUnlockCta?l("",!0):(a(),c(k,{key:1,tag:"a",href:i.links.getPricingUrl("search-statistics","search-statistics-demo-upsell",t.$route.name),target:"_blank",type:"green",size:"small",onClick:i.searchStatisticsStore.showSampleReports,loading:i.loading},{default:p(()=>[C(d(u.strings.ctaUnlockButtonText),1)]),_:1},8,["href","onClick","loading"]))]),_:1}),(a(),c(y(t.$route.name)))],64)):l("",!0),s.showConnectCta?(a(),S("div",it,[i.searchStatisticsStore.shouldShowSampleReports?l("",!0):(a(),c(B,{key:0},{default:p(()=>[(a(),c(y(t.$route.name)))]),_:1})),i.searchStatisticsStore.shouldShowSampleReports?l("",!0):(a(),c(M,{key:1}))])):l("",!0),!s.showConnectCta&&!i.searchStatisticsStore.shouldShowSampleReports?(a(),c(y(t.$route.name),{key:2})):l("",!0)])]),_:1},8,["page-name","exclude-tabs","showTabs","containerClasses"])}const je=_(at,[["render",nt]]);export{je as default};