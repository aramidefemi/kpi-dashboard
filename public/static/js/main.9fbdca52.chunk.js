(window["webpackJsonpreact-context-api-boilerplate"]=window["webpackJsonpreact-context-api-boilerplate"]||[]).push([[0],{174:function(e,t,a){e.exports=a(292)},179:function(e,t,a){},198:function(e,t,a){},292:function(e,t,a){"use strict";a.r(t);var n=a(0),r=a.n(n),c=a(23),l=a.n(c),s=(a(179),a(58)),o=a.n(s),u=a(104),i=a(52),p=a(146),m=a.n(p),d=a(43),f=a.n(d),E=a(297),h=a(69),y=a(37),v=a(299),b=a(301),Y=a(298),g=a(300),M=(a(198),a(199),E.a.RangePicker),w=g.a.Title,x=g.a.Text;g.a.Link;function G(e){return O.apply(this,arguments)}function O(){return(O=Object(u.a)(o.a.mark(function e(t){var a;return o.a.wrap(function(e){for(;;)switch(e.prev=e.next){case 0:return e.prev=0,e.next=3,m.a.get("http://127.0.0.1:8000/api".concat(t));case 3:return a=e.sent,console.log(a),e.abrupt("return",a.data.data);case 8:e.prev=8,e.t0=e.catch(0),console.error(e.t0);case 11:case"end":return e.stop()}},e,null,[[0,8]])}))).apply(this,arguments)}var j=function(){var e=Object(n.useState)({}),t=Object(i.a)(e,2),a=t[0],c=t[1],l=Object(n.useState)({}),s=Object(i.a)(l,2),p=s[0],m=s[1],d=Object(n.useState)({}),E=Object(i.a)(d,2),g=E[0],O=E[1],j=Object(n.useState)({}),k=Object(i.a)(j,2),S=k[0],D=k[1],C=Object(n.useState)({}),I=Object(i.a)(C,2),U=I[0],P=I[1],T=Object(n.useState)({}),B=Object(i.a)(T,2),N=B[0],q=B[1],W=Object(n.useState)({}),_=Object(i.a)(W,2),J=_[0],R=_[1],z=function(){var e=Object(u.a)(o.a.mark(function e(t,a){return o.a.wrap(function(e){for(;;)switch(e.prev=e.next){case 0:F({type:t,payload:a});case 1:case"end":return e.stop()}},e)}));return function(t,a){return e.apply(this,arguments)}}();function A(e,t){var a={start:t[0],end:t[1]};z(e,a),console.log(t)}Object(n.useEffect)(function(){var e={start:"2019-10-18",end:f()().format("YYYY-MM-D")};z("GetUsersCount",e),z("GetProductsCountByInterval",e),z("GetMerchants",e),z("GetNewSellers",e),z("GetUniqueSellers",e),z("GetMerchantsMedian",e),z("GetTransactions",e)},[]);var F=function(){var e=Object(u.a)(o.a.mark(function e(t){var a,n;return o.a.wrap(function(e){for(;;)switch(e.prev=e.next){case 0:e.t0=t.type,e.next="GetUsersCount"===e.t0?3:"GetTransactions"===e.t0?7:"GetProductsCountByInterval"===e.t0?11:"GetMerchants"===e.t0?15:"GetNewSellers"===e.t0?19:"GetUniqueSellers"===e.t0?23:"GetMerchantsMedian"===e.t0?27:31;break;case 3:return e.next=5,G("/kpi/users/".concat(t.payload.start,"/").concat(t.payload.end));case 5:return n=e.sent,e.abrupt("return",m(n||{}));case 7:return e.next=9,G("/kpi/transactions/".concat(t.payload.start,"/").concat(t.payload.end));case 9:return a=e.sent,e.abrupt("return",c(a||{}));case 11:return e.next=13,G("/kpi/products/".concat(t.payload.start,"/").concat(t.payload.end));case 13:return a=e.sent,e.abrupt("return",O(a||{}));case 15:return e.next=17,G("/kpi/merchants/".concat(t.payload.start,"/").concat(t.payload.end));case 17:return a=e.sent,e.abrupt("return",P(a||{}));case 19:return e.next=21,G("/kpi/sellers/first-time/".concat(t.payload.start,"/").concat(t.payload.end));case 21:return a=e.sent,e.abrupt("return",D(a.new_seller||{}));case 23:return e.next=25,G("/kpi/sellers/".concat(t.payload.start,"/").concat(t.payload.end));case 25:return a=e.sent,e.abrupt("return",q(a||{}));case 27:return e.next=29,G("/kpi/merchants/median/".concat(t.payload.start,"/").concat(t.payload.end));case 29:return a=e.sent,e.abrupt("return",R(a||{}));case 31:return e.abrupt("return");case 32:case"end":return e.stop()}},e)}));return function(t){return e.apply(this,arguments)}}();return r.a.createElement("div",{className:"app",style:{padding:"20px 50px"}},r.a.createElement(h.a,null,r.a.createElement(y.a,{span:4}," ",r.a.createElement(w,{mark:!0,level:3},"KPI Dashboard"))),r.a.createElement(h.a,null,r.a.createElement(y.a,{span:16},r.a.createElement(v.a,{style:{margin:"10px"}},r.a.createElement(h.a,{gutter:16},r.a.createElement(y.a,{span:12},r.a.createElement(b.a,{title:"Users",value:p.users,loading:!p}),r.a.createElement(M,{format:"YYYY-MM-DD",onChange:function(e,t){return A("GetUsersCount",t)}})),r.a.createElement(y.a,{span:12},r.a.createElement(b.a,{title:"merchants",value:U.merchants,loading:!U}),r.a.createElement(M,{format:"YYYY-MM-DD",onChange:function(e,t){return A("GetMerchants",t)}}))))),r.a.createElement(y.a,{span:8}," ",r.a.createElement(v.a,{style:{margin:"10px"}},r.a.createElement(b.a,{title:"products",value:g.products,loading:!g}),r.a.createElement(M,{format:"YYYY-MM-DD",onChange:function(e,t){return A("GetProductsCountByInterval",t)}})))),r.a.createElement(h.a,null,r.a.createElement(y.a,{span:8}," ",r.a.createElement(v.a,{title:"Transactions",type:"inner",style:{margin:"10px"}},r.a.createElement(M,{format:"YYYY-MM-DD",onChange:function(e,t){return A("GetTransactions",t)}}),r.a.createElement(Y.b,{size:"small",header:null,footer:null,dataSource:a.purchases||[],renderItem:function(e){return r.a.createElement(Y.b.Item,null,r.a.createElement("div",null,r.a.createElement(x,{type:"secondary"},"Currency (",e.currency,")")),r.a.createElement("div",null,r.a.createElement(x,{type:"success"},"Merchant Revenue (",e.merchant_revenue,")")),r.a.createElement("p",null,"Our Profit ",e.profit))}}))),r.a.createElement(y.a,{span:8}," ",r.a.createElement(v.a,{title:"Sellers",type:"inner",style:{margin:"10px"}},r.a.createElement(b.a,{title:"With First Sales",value:S.count}),r.a.createElement(M,{format:"YYYY-MM-DD",onChange:function(e,t){return A("GetNewSellers",t)}}),r.a.createElement(b.a,{title:"New on the platform",value:N.sellers,loading:!N}),r.a.createElement(M,{format:"YYYY-MM-DD",onChange:function(e,t){return A("GetUniqueSellers",t)}}))),r.a.createElement(y.a,{span:8}," ",r.a.createElement(v.a,{title:"Sellers Median Avg",type:"inner",style:{margin:"10px"}},r.a.createElement(b.a,{value:J.median_val,loading:!J}),r.a.createElement(M,{format:"YYYY-MM-DD",onChange:function(e,t){return A("GetMerchantsMedian",t)}})))))};Boolean("localhost"===window.location.hostname||"[::1]"===window.location.hostname||window.location.hostname.match(/^127(?:\.(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)){3}$/));l.a.render(r.a.createElement(j,null),document.getElementById("root")),"serviceWorker"in navigator&&navigator.serviceWorker.ready.then(function(e){e.unregister()})}},[[174,1,2]]]);
//# sourceMappingURL=main.9fbdca52.chunk.js.map