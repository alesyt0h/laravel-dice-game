"use strict";(self.webpackChunkangular_diceApp=self.webpackChunkangular_diceApp||[]).push([[308],{1308:(j,I,u)=>{u.r(I),u.d(I,{GameModule:()=>Se});var c=u(9808);function m(n,i,t,r){var s,o=arguments.length,a=o<3?i:null===r?r=Object.getOwnPropertyDescriptor(i,t):r;if("object"==typeof Reflect&&"function"==typeof Reflect.decorate)a=Reflect.decorate(n,i,t,r);else for(var g=n.length-1;g>=0;g--)(s=n[g])&&(a=(o<3?s(a):o>3?s(i,t,a):s(i,t))||a);return o>3&&a&&Object.defineProperty(i,t,a),a}var e=u(2096),B=u(5633),D=u.n(B);const $=function(n){return{active:n}};function K(n,i){if(1&n){const t=e.EpF();e.TgZ(0,"li",8)(1,"a",3),e.NdJ("click",function(){const a=e.CHM(t).$implicit;return e.oxw(2).setPage(a)}),e._uU(2),e.qZA()()}if(2&n){const t=i.$implicit,r=e.oxw(2);e.Q6J("ngClass",e.VKq(2,$,r.pager.currentPage===t)),e.xp6(2),e.Oqu(t)}}const O=function(n){return{disabled:n}};function V(n,i){if(1&n){const t=e.EpF();e.TgZ(0,"ul",1)(1,"li",2)(2,"a",3),e.NdJ("click",function(){return e.CHM(t),e.oxw().setPage(1)}),e._uU(3,"First"),e.qZA()(),e.TgZ(4,"li",4)(5,"a",3),e.NdJ("click",function(){e.CHM(t);const o=e.oxw();return o.setPage(o.pager.currentPage-1)}),e._uU(6,"Previous"),e.qZA()(),e.YNc(7,K,3,4,"li",5),e.TgZ(8,"li",6)(9,"a",3),e.NdJ("click",function(){e.CHM(t);const o=e.oxw();return o.setPage(o.pager.currentPage+1)}),e._uU(10,"Next"),e.qZA()(),e.TgZ(11,"li",7)(12,"a",3),e.NdJ("click",function(){e.CHM(t);const o=e.oxw();return o.setPage(o.pager.totalPages)}),e._uU(13,"Last"),e.qZA()()()}if(2&n){const t=e.oxw();e.xp6(1),e.Q6J("ngClass",e.VKq(5,O,1===t.pager.currentPage)),e.xp6(3),e.Q6J("ngClass",e.VKq(7,O,1===t.pager.currentPage)),e.xp6(3),e.Q6J("ngForOf",t.pager.pages),e.xp6(1),e.Q6J("ngClass",e.VKq(9,O,t.pager.currentPage===t.pager.totalPages)),e.xp6(3),e.Q6J("ngClass",e.VKq(11,O,t.pager.currentPage===t.pager.totalPages))}}let H=(()=>{let n=class{constructor(){this.changePage=new e.vpe(!0),this.initialPage=1,this.pageSize=10,this.maxPages=10,this.pager={}}ngOnInit(){this.items&&this.items.length&&this.setPage(this.initialPage)}ngOnChanges(t){t.items.currentValue!==t.items.previousValue&&this.setPage(this.initialPage)}setPage(t){this.pager=D()(this.items.length,t,this.pageSize,this.maxPages);var r=this.items.slice(this.pager.startIndex,this.pager.endIndex+1);this.changePage.emit(r)}};return n.\u0275fac=function(t){return new(t||n)},n.\u0275cmp=e.Xpm({type:n,selectors:[["jw-pagination"]],inputs:{initialPage:"initialPage",pageSize:"pageSize",maxPages:"maxPages",items:"items"},outputs:{changePage:"changePage"},features:[e.TTD],decls:1,vars:1,consts:[["class","pagination",4,"ngIf"],[1,"pagination"],[1,"page-item","first-item",3,"ngClass"],[1,"page-link",3,"click"],[1,"page-item","previous-item",3,"ngClass"],["class","page-item number-item",3,"ngClass",4,"ngFor","ngForOf"],[1,"page-item","next-item",3,"ngClass"],[1,"page-item","last-item",3,"ngClass"],[1,"page-item","number-item",3,"ngClass"]],template:function(t,r){1&t&&e.YNc(0,V,14,13,"ul",0),2&t&&e.Q6J("ngIf",r.pager.pages&&r.pager.pages.length)},directives:[c.O5,c.mk,c.sg],encapsulation:2}),m([(0,e.IIB)()],n.prototype,"items",void 0),m([(0,e.r_U)()],n.prototype,"changePage",void 0),m([(0,e.IIB)()],n.prototype,"initialPage",void 0),m([(0,e.IIB)()],n.prototype,"pageSize",void 0),m([(0,e.IIB)()],n.prototype,"maxPages",void 0),n})(),z=(()=>{let n=class{};return n.\u0275fac=function(t){return new(t||n)},n.\u0275mod=e.oAB({type:n}),n.\u0275inj=e.cJS({imports:[[c.ez]]}),n})();var T=u(2226),X=u(5226),Z=u.n(X),ee=u(2340),w=u(520),b=u(7221),C=u(1086);let A=(()=>{class n{constructor(t){this._http=t,this.apiUrl=ee.N.apiUrl}play(t){return this.setHeaders(),this._http.post(`${this.apiUrl}/${t}/games`,{},{headers:this.headers}).pipe((0,b.K)(o=>(0,C.of)(new w.UA(o))))}throws(t){return this.setHeaders(),this._http.get(`${this.apiUrl}/${t}/games`,{headers:this.headers}).pipe((0,b.K)(o=>(0,C.of)(new w.UA(o))))}ranking(){return this.setHeaders(),this._http.get(`${this.apiUrl}/ranking`,{headers:this.headers}).pipe((0,b.K)(r=>(0,C.of)(new w.UA(r))))}loser(){return this.setHeaders(),this._http.get(`${this.apiUrl}/ranking/loser`,{headers:this.headers}).pipe((0,b.K)(r=>(0,C.of)(new w.UA(r))))}winner(){return this.setHeaders(),this._http.get(`${this.apiUrl}/ranking/winner`,{headers:this.headers}).pipe((0,b.K)(r=>(0,C.of)(new w.UA(r))))}playerList(){return this.setHeaders(),this._http.get(this.apiUrl,{headers:this.headers}).pipe((0,b.K)(t=>(0,C.of)(new w.UA(t))))}get getToken(){return localStorage.getItem("token")}get getUserId(){return JSON.parse(localStorage.getItem("user")||"{}").id}setHeaders(){this.headers=(new w.WM).set("Authorization","Bearer "+this.getToken)}}return n.\u0275fac=function(t){return new(t||n)(e.LFG(w.eN))},n.\u0275prov=e.Yz7({token:n,factory:n.\u0275fac,providedIn:"root"}),n})();var v=u(2486);function te(n,i){if(1&n&&(e.TgZ(0,"tr",10)(1,"td",11)(2,"span"),e._uU(3),e.qZA()(),e.TgZ(4,"td",11),e._uU(5),e.qZA(),e.TgZ(6,"td",12),e._uU(7),e.qZA(),e.TgZ(8,"td",13),e._uU(9),e.ALo(10,"date"),e.qZA()()),2&n){const t=i.$implicit;e.xp6(3),e.Oqu(t.nickname),e.xp6(2),e.hij(" ",t.email," "),e.xp6(1),e.Q6J("ngClass",t.winning_percentage>=50?"text-green-600":"text-red-600"),e.xp6(1),e.hij(" ",null!==t.winning_percentage?t.winning_percentage:"N/A"," "),e.xp6(2),e.hij(" ",e.xi3(10,5,t.created_at,"short")," ")}}function ne(n,i){if(1&n){const t=e.EpF();e.ynx(0),e.TgZ(1,"div",3)(2,"table",4)(3,"thead",5)(4,"tr")(5,"th",6),e._uU(6," Nickname "),e.qZA(),e.TgZ(7,"th",6),e._uU(8," Email "),e.qZA(),e.TgZ(9,"th",6),e._uU(10," Winning % "),e.qZA(),e.TgZ(11,"th",6),e._uU(12," Created at "),e.qZA()()(),e.TgZ(13,"tbody"),e.YNc(14,te,11,8,"tr",7),e.qZA()()(),e.TgZ(15,"div",8)(16,"jw-pagination",9),e.NdJ("changePage",function(o){return e.CHM(t),e.oxw().onChangePage(o)}),e.qZA()(),e.BQk()}if(2&n){const t=e.oxw();e.xp6(14),e.Q6J("ngForOf",t.pageOfItems),e.xp6(2),e.Q6J("items",t.players)}}function re(n,i){1&n&&e._uU(0," Loading..\n")}let ie=(()=>{class n{constructor(t,r){this._gameService=t,this._helper=r,this.loading=!0,this.players=[]}ngAfterViewChecked(){this.changeJwPaginationText()}ngOnInit(){this._gameService.playerList().subscribe(t=>{this._helper.isHttpErrorResponse(t)?Z().fire("Error",t.error.message,"error"):t.users?(this.players=t.users,this.loading=!1):this.loading=!1})}onChangePage(t){this.pageOfItems=t}changeJwPaginationText(){const t=document.querySelector(".previous-item a"),r=document.querySelector(".next-item a");t&&r&&(t.innerHTML="<",r.innerHTML=">")}}return n.\u0275fac=function(t){return new(t||n)(e.Y36(A),e.Y36(v.W))},n.\u0275cmp=e.Xpm({type:n,selectors:[["app-player-list"]],decls:5,vars:2,consts:[[1,"text-center","text-3xl","mb-6","pt-[30px]"],[4,"ngIf","ngIfElse"],["elseTemplate",""],[1,"overflow-x-auto","shadow-md","sm:rounded-lg","mb-4"],[1,"w-full","text-sm","text-left","text-gray-500","dark:text-gray-400"],[1,"text-xs","text-gray-700","uppercase","bg-gray-50","dark:bg-gray-700","dark:text-gray-400"],["scope","col",1,"px-6","py-3","text-center"],["class","bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600",4,"ngFor","ngForOf"],[1,"flex","justify-center"],[3,"items","changePage"],[1,"bg-white","border-b","dark:bg-gray-800","dark:border-gray-700","hover:bg-gray-50","dark:hover:bg-gray-600"],[1,"px-6","py-4","text-center"],[1,"px-6","py-4","text-center",3,"ngClass"],[1,"px-6","py-4","text-right"]],template:function(t,r){if(1&t&&(e.TgZ(0,"h1",0),e._uU(1,"Player list"),e.qZA(),e.YNc(2,ne,17,2,"ng-container",1),e.YNc(3,re,1,0,"ng-template",null,2,e.W1O)),2&t){const o=e.MAs(4);e.xp6(2),e.Q6J("ngIf",!r.loading)("ngIfElse",o)}},directives:[c.O5,c.sg,c.mk,H],pipes:[c.uU],styles:[""]}),n})();var oe=u(5272);function ae(n,i){1&n&&(e.TgZ(0,"div",6)(1,"h4",7),e._uU(2,"Press the play button to throw the dices!"),e.qZA(),e.TgZ(3,"h5",8),e._uU(4,"If you get a 7 between the both dices, you lose."),e.qZA(),e.TgZ(5,"h5",9),e._uU(6,"If you get any other result, you will win."),e.qZA()())}function se(n,i){1&n&&(e.ynx(0),e.TgZ(1,"h3",16),e._uU(2,"You won!!"),e.qZA(),e.BQk())}function ce(n,i){1&n&&(e.TgZ(0,"h3",16),e._uU(1,"You lost"),e.qZA())}function le(n,i){if(1&n&&(e.TgZ(0,"div",10)(1,"div",11),e._UZ(2,"img",12)(3,"img",12),e.qZA(),e.TgZ(4,"div",13),e.YNc(5,se,3,0,"ng-container",14),e.YNc(6,ce,2,0,"ng-template",null,15,e.W1O),e.qZA()()),2&n){const t=e.MAs(7),r=e.oxw();e.xp6(2),e.MGl("src","../../../assets/images/dices/b-",r.lastThrow.black_dice,".png",e.LSH),e.xp6(1),e.MGl("src","../../../assets/images/dices/r-",r.lastThrow.red_dice,".png",e.LSH),e.xp6(2),e.Q6J("ngIf","win"===r.lastThrow.result)("ngIfElse",t)}}const ge=function(n,i){return{"!mt-4":n,"!mt-8":i}};let ue=(()=>{class n{constructor(t,r){this._gameService=t,this._helper=r,this.thrown=!1}ngOnInit(){}play(t){this._gameService.play(t).subscribe(r=>{this._helper.isHttpErrorResponse(r)?Z().fire("Error",r.error.message,"error"):(this.thrown=!0,this.lastThrow=r.result)})}getUserId(){return this._gameService.getUserId}}return n.\u0275fac=function(t){return new(t||n)(e.Y36(A),e.Y36(v.W))},n.\u0275cmp=e.Xpm({type:n,selectors:[["app-play"]],decls:8,vars:7,consts:[[1,"text-center","text-3xl","mb-6","pt-[65px]"],["class","text-gray-400",4,"ngIf"],["class","mt-[50px]",4,"ngIf"],[1,"wrap-login100-form-btn",3,"ngClass"],[1,"login100-form-bgbtn"],[1,"login100-form-btn",3,"click"],[1,"text-gray-400"],[1,"mt-2"],[1,"mt-4"],[1,"mt-1"],[1,"mt-[50px]"],[1,"flex","mb-8"],["alt","",1,"m-auto",3,"src"],[1,"text-center"],[4,"ngIf","ngIfElse"],["lost",""],[1,"text-xl"]],template:function(t,r){1&t&&(e.TgZ(0,"h1",0),e._uU(1,"Throw the dices"),e.qZA(),e.YNc(2,ae,7,0,"div",1),e.YNc(3,le,8,4,"div",2),e.TgZ(4,"div",3),e._UZ(5,"div",4),e.TgZ(6,"button",5),e.NdJ("click",function(){return r.play(r.getUserId())}),e._uU(7),e.qZA()()),2&t&&(e.xp6(2),e.Q6J("ngIf",!r.thrown),e.xp6(1),e.Q6J("ngIf",r.thrown),e.xp6(1),e.Q6J("ngClass",e.WLB(4,ge,r.thrown,!r.thrown)),e.xp6(3),e.hij(" ",r.thrown?"Play again":"Play"," "))},directives:[c.O5,c.mk],styles:[""]}),n})();function pe(n,i){if(1&n&&(e.TgZ(0,"tr",16)(1,"td",17),e._uU(2),e.qZA(),e.TgZ(3,"td",17),e._uU(4),e.qZA(),e.TgZ(5,"td",18),e._uU(6),e.qZA(),e.TgZ(7,"td",19),e._uU(8),e.ALo(9,"date"),e.qZA()()),2&n){const t=i.$implicit;e.xp6(2),e.hij(" ",t.black_dice," "),e.xp6(2),e.hij(" ",t.red_dice," "),e.xp6(1),e.Q6J("ngClass","win"===t.result?"text-green-600":"text-red-600"),e.xp6(1),e.hij(" ",t.result," "),e.xp6(2),e.hij(" ",e.xi3(9,5,t.created_at,"short")," ")}}function fe(n,i){if(1&n){const t=e.EpF();e.ynx(0),e.O4$(),e.TgZ(1,"svg",4),e._UZ(2,"path",5),e.TgZ(3,"title"),e._uU(4,"Delete all throws"),e.qZA()(),e.kcU(),e.TgZ(5,"span",6),e._uU(6," Your winning percentage is "),e.TgZ(7,"strong",7),e._uU(8),e.qZA()(),e.TgZ(9,"div",8)(10,"table",9)(11,"thead",10)(12,"tr")(13,"th",11),e._uU(14," Black Dice "),e.qZA(),e.TgZ(15,"th",11),e._uU(16," Red Dice "),e.qZA(),e.TgZ(17,"th",11),e._uU(18," Result "),e.qZA(),e.TgZ(19,"th",11),e._uU(20," Date "),e.qZA()()(),e.TgZ(21,"tbody"),e.YNc(22,pe,10,8,"tr",12),e.qZA()()(),e.TgZ(23,"div",13)(24,"jw-pagination",14),e.NdJ("changePage",function(o){return e.CHM(t),e.oxw().onChangePage(o)}),e.qZA()(),e.TgZ(25,"div",15),e._uU(26,"Total throws: "),e.TgZ(27,"strong"),e._uU(28),e.qZA()(),e.BQk()}if(2&n){const t=e.oxw();e.xp6(1),e.MGl("routerLink","/user/delete/throws/",t.getUserId(),""),e.xp6(6),e.Q6J("ngClass",t.winningPercentage>=50?"text-green-600":"text-red-600"),e.xp6(1),e.Oqu(t.winningPercentage),e.xp6(14),e.Q6J("ngForOf",t.pageOfItems),e.xp6(2),e.Q6J("items",t.throws),e.xp6(4),e.Oqu(t.throws.length)}}function me(n,i){1&n&&(e.TgZ(0,"span"),e._uU(1,"Loading.."),e.qZA())}let he=(()=>{class n{constructor(t,r){this._gameService=t,this._helper=r,this.throws=[],this.winningPercentage=0}ngAfterViewChecked(){this.changeJwPaginationText()}ngOnInit(){this._gameService.throws(this._gameService.getUserId).subscribe(t=>{this._helper.isHttpErrorResponse(t)?Z().fire("Error",t.error.message,"error"):(this.throws=t.throws,this.winningPercentage=t.winning_percentage)})}onChangePage(t){this.pageOfItems=t}getUserId(){return this._gameService.getUserId}changeJwPaginationText(){const t=document.querySelector(".previous-item a"),r=document.querySelector(".next-item a");t&&r&&(t.innerHTML="<",r.innerHTML=">")}}return n.\u0275fac=function(t){return new(t||n)(e.Y36(A),e.Y36(v.W))},n.\u0275cmp=e.Xpm({type:n,selectors:[["app-throws"]],decls:6,vars:2,consts:[["id","throws-container",1,"relative"],[1,"text-center","text-3xl","mb-2","pt-[30px]"],[4,"ngIf","ngIfElse"],["isLoading",""],["xmlns","http://www.w3.org/2000/svg","id","trash","fill","none","viewBox","0 0 24 24","stroke","currentColor","title","fuck you",1,"h-10","w-10","text-red-600","absolute","top-10","right-0","bg-gray-400/40","rounded-lg","p-[5px]","cursor-pointer","hover:bg-gray-400/80",3,"routerLink"],["stroke-linecap","round","stroke-linejoin","round","stroke-width","2","d","M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"],[1,"mb-4","inline-block"],[3,"ngClass"],[1,"overflow-x-auto","shadow-md","sm:rounded-lg","mb-4"],[1,"w-full","text-sm","text-left","text-gray-500","dark:text-gray-400"],[1,"text-xs","text-gray-700","uppercase","bg-gray-50","dark:bg-gray-700","dark:text-gray-400"],["scope","col",1,"px-6","py-3","text-center"],["class","bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600",4,"ngFor","ngForOf"],[1,"flex","justify-center"],[3,"items","changePage"],[1,"text-sm","absolute","font-['Poppins-Regular']","text-gray-500","right-0","pt-[8px]"],[1,"bg-white","border-b","dark:bg-gray-800","dark:border-gray-700","hover:bg-gray-50","dark:hover:bg-gray-600"],[1,"px-6","py-4","text-center"],[1,"px-6","py-4","text-center",3,"ngClass"],[1,"px-6","py-4","text-right"]],template:function(t,r){if(1&t&&(e.TgZ(0,"div",0)(1,"h1",1),e._uU(2,"Throws"),e.qZA(),e.YNc(3,fe,29,6,"ng-container",2),e.YNc(4,me,2,0,"ng-template",null,3,e.W1O),e.qZA()),2&t){const o=e.MAs(5);e.xp6(3),e.Q6J("ngIf",r.throws.length>0)("ngIfElse",o)}},directives:[c.O5,T.rH,c.mk,c.sg,H],pipes:[c.uU],styles:[""]}),n})();function _e(n,i){if(1&n&&(e.ynx(0),e.TgZ(1,"span",4),e._uU(2," The winning percentage for all the users in the system is "),e.TgZ(3,"span",5),e._uU(4),e.qZA()(),e.BQk()),2&n){const t=e.oxw(2);e.xp6(3),e.Q6J("ngClass",t.result>=50?"text-green-600":"text-red-600"),e.xp6(1),e.hij(" ",t.result," ")}}function de(n,i){if(1&n&&e._uU(0),2&n){const t=e.oxw(2);e.hij(" ",t.result," ")}}function xe(n,i){if(1&n&&(e.ynx(0),e.YNc(1,_e,5,2,"ng-container",1),e.YNc(2,de,1,1,"ng-template",null,3,e.W1O),e.BQk()),2&n){const t=e.MAs(3),r=e.oxw();e.xp6(1),e.Q6J("ngIf",r.isNumber(r.result))("ngIfElse",t)}}function ye(n,i){1&n&&e._uU(0," Loading..\n")}let we=(()=>{class n{constructor(t,r){this._gameService=t,this._helper=r}ngOnInit(){this._gameService.ranking().subscribe(t=>{this._helper.isHttpErrorResponse(t)?(Z().fire("Error",t.error.message,"error"),this.result=t.error.message):this.result=t.winning_percentage})}isNumber(t){return"number"==typeof t}}return n.\u0275fac=function(t){return new(t||n)(e.Y36(A),e.Y36(v.W))},n.\u0275cmp=e.Xpm({type:n,selectors:[["app-ranking"]],decls:5,vars:2,consts:[[1,"text-center","text-3xl","mb-8","pt-[65px]"],[4,"ngIf","ngIfElse"],["elseTemplate",""],["noThrows",""],[1,"text-gray-500"],[3,"ngClass"]],template:function(t,r){if(1&t&&(e.TgZ(0,"h1",0),e._uU(1,"Ranking"),e.qZA(),e.YNc(2,xe,4,2,"ng-container",1),e.YNc(3,ye,1,0,"ng-template",null,2,e.W1O)),2&t){const o=e.MAs(4);e.xp6(2),e.Q6J("ngIf",r.result)("ngIfElse",o)}},directives:[c.O5,c.mk],styles:[""]}),n})();function ve(n,i){if(1&n&&(e.ynx(0),e.TgZ(1,"div",4)(2,"div",5)(3,"dl")(4,"div",6)(5,"dt",7),e._uU(6," Nickname "),e.qZA(),e.TgZ(7,"dd",8),e._uU(8),e.qZA()(),e.TgZ(9,"div",9)(10,"dt",7),e._uU(11," Email address "),e.qZA(),e.TgZ(12,"dd",8),e._uU(13),e.qZA()(),e.TgZ(14,"div",6)(15,"dt",7),e._uU(16," Created at "),e.qZA(),e.TgZ(17,"dd",8),e._uU(18),e.ALo(19,"date"),e.qZA()(),e.TgZ(20,"div",9)(21,"dt",7),e._uU(22," Winning Percentage "),e.qZA(),e.TgZ(23,"dd",10),e._uU(24),e.qZA()()()()(),e.BQk()),2&n){const t=e.oxw(2);e.xp6(8),e.hij(" ",t.user.nickname," "),e.xp6(5),e.hij(" ",t.user.email," "),e.xp6(5),e.hij(" ",e.xi3(19,5,t.user.created_at,"short")," "),e.xp6(5),e.Q6J("ngClass",t.user.winning_percentage>=50?"text-green-600":"text-red-600"),e.xp6(1),e.hij(" ",t.user.winning_percentage," ")}}function Te(n,i){1&n&&e._uU(0," There are no lost throws in the system to calculate the most losing player! ")}function Ze(n,i){if(1&n&&(e.ynx(0),e.YNc(1,ve,25,8,"ng-container",1),e.YNc(2,Te,1,0,"ng-template",null,3,e.W1O),e.BQk()),2&n){const t=e.MAs(3),r=e.oxw();e.xp6(1),e.Q6J("ngIf",r.user)("ngIfElse",t)}}function be(n,i){1&n&&e._uU(0," Loading..\n")}let Ce=(()=>{class n{constructor(t,r){this._gameService=t,this._helper=r,this.loading=!0}ngOnInit(){this._gameService.loser().subscribe(t=>{this._helper.isHttpErrorResponse(t)?Z().fire("Error",t.error.message,"error"):t.loser?(this.user=t.loser,this.loading=!1):this.loading=!1})}}return n.\u0275fac=function(t){return new(t||n)(e.Y36(A),e.Y36(v.W))},n.\u0275cmp=e.Xpm({type:n,selectors:[["app-loser"]],decls:5,vars:2,consts:[[1,"text-center","text-3xl","mb-8","pt-[65px]"],[4,"ngIf","ngIfElse"],["isLoading",""],["noThrows",""],[1,"bg-white","shadow","overflow-hidden","sm:rounded-lg"],[1,"border-t","border-gray-200"],[1,"bg-gray-50","px-4","py-5","sm:grid","sm:grid-cols-[repeat(2,_minmax(0,_1fr))_0px]","sm:gap-4","sm:px-6"],[1,"text-sm","font-medium","text-gray-500"],[1,"mt-1","text-sm","text-gray-900","sm:mt-0","sm:col-span-2"],[1,"bg-white","px-4","py-5","sm:grid","sm:grid-cols-[repeat(2,_minmax(0,_1fr))_0px]","sm:gap-4","sm:px-6"],[1,"mt-1","text-sm","text-gray-900","sm:mt-0","sm:col-span-2",3,"ngClass"]],template:function(t,r){if(1&t&&(e.TgZ(0,"h1",0),e._uU(1,"Most Losing Player"),e.qZA(),e.YNc(2,Ze,4,2,"ng-container",1),e.YNc(3,be,1,0,"ng-template",null,2,e.W1O)),2&t){const o=e.MAs(4);e.xp6(2),e.Q6J("ngIf",!r.loading)("ngIfElse",o)}},directives:[c.O5,c.mk],pipes:[c.uU],styles:[""]}),n})();function Ae(n,i){if(1&n&&(e.ynx(0),e.TgZ(1,"div",4)(2,"div",5)(3,"dl")(4,"div",6)(5,"dt",7),e._uU(6," Nickname "),e.qZA(),e.TgZ(7,"dd",8),e._uU(8),e.qZA()(),e.TgZ(9,"div",9)(10,"dt",7),e._uU(11," Email address "),e.qZA(),e.TgZ(12,"dd",8),e._uU(13),e.qZA()(),e.TgZ(14,"div",6)(15,"dt",7),e._uU(16," Created at "),e.qZA(),e.TgZ(17,"dd",8),e._uU(18),e.ALo(19,"date"),e.qZA()(),e.TgZ(20,"div",9)(21,"dt",7),e._uU(22," Winning Percentage "),e.qZA(),e.TgZ(23,"dd",10),e._uU(24),e.qZA()()()()(),e.BQk()),2&n){const t=e.oxw(2);e.xp6(8),e.hij(" ",t.user.nickname," "),e.xp6(5),e.hij(" ",t.user.email," "),e.xp6(5),e.hij(" ",e.xi3(19,5,t.user.created_at,"short")," "),e.xp6(5),e.Q6J("ngClass",t.user.winning_percentage>=50?"text-green-600":"text-red-600"),e.xp6(1),e.hij(" ",t.user.winning_percentage," ")}}function Ue(n,i){1&n&&e._uU(0," There are no won throws in the system to calculate the most winning player! ")}function Pe(n,i){if(1&n&&(e.ynx(0),e.YNc(1,Ae,25,8,"ng-container",1),e.YNc(2,Ue,1,0,"ng-template",null,3,e.W1O),e.BQk()),2&n){const t=e.MAs(3),r=e.oxw();e.xp6(1),e.Q6J("ngIf",r.user)("ngIfElse",t)}}function Ie(n,i){1&n&&e._uU(0," Loading..\n")}let ke=(()=>{class n{constructor(t,r){this._gameService=t,this._helper=r,this.loading=!0}ngOnInit(){this._gameService.winner().subscribe(t=>{this._helper.isHttpErrorResponse(t)?Z().fire("Error",t.error.message,"error"):t.winner?(this.user=t.winner,this.loading=!1):this.loading=!1})}}return n.\u0275fac=function(t){return new(t||n)(e.Y36(A),e.Y36(v.W))},n.\u0275cmp=e.Xpm({type:n,selectors:[["app-winner"]],decls:5,vars:2,consts:[[1,"text-center","text-3xl","mb-8","pt-[65px]"],[4,"ngIf","ngIfElse"],["isLoading",""],["noThrows",""],[1,"bg-white","shadow","overflow-hidden","sm:rounded-lg"],[1,"border-t","border-gray-200"],[1,"bg-gray-50","px-4","py-5","sm:grid","sm:grid-cols-[repeat(2,_minmax(0,_1fr))_0px]","sm:gap-4","sm:px-6"],[1,"text-sm","font-medium","text-gray-500"],[1,"mt-1","text-sm","text-gray-900","sm:mt-0","sm:col-span-2"],[1,"bg-white","px-4","py-5","sm:grid","sm:grid-cols-[repeat(2,_minmax(0,_1fr))_0px]","sm:gap-4","sm:px-6"],[1,"mt-1","text-sm","text-gray-900","sm:mt-0","sm:col-span-2",3,"ngClass"]],template:function(t,r){if(1&t&&(e.TgZ(0,"h1",0),e._uU(1,"Most Winning Player"),e.qZA(),e.YNc(2,Pe,4,2,"ng-container",1),e.YNc(3,Ie,1,0,"ng-template",null,2,e.W1O)),2&t){const o=e.MAs(4);e.xp6(2),e.Q6J("ngIf",!r.loading)("ngIfElse",o)}},directives:[c.O5,c.mk],pipes:[c.uU],styles:[""]}),n})(),Oe=(()=>{class n{constructor(){}ngOnInit(){}}return n.\u0275fac=function(t){return new(t||n)},n.\u0275cmp=e.Xpm({type:n,selectors:[["app-error-page"]],decls:8,vars:0,consts:[[1,"text-8xl","pt-12","text-gray-600","text-center"],[1,"text-4xl","text-center","text-gray-500","mb-8"],[1,"wrap-login100-form-btn","!w-fit"],[1,"login100-form-bgbtn"],["routerLink","/",1,"login100-form-btn"]],template:function(t,r){1&t&&(e.TgZ(0,"div",0),e._uU(1,"404"),e.qZA(),e.TgZ(2,"div",1),e._uU(3,"Not Found"),e.qZA(),e.TgZ(4,"div",2),e._UZ(5,"div",3),e.TgZ(6,"button",4),e._uU(7," Take me back home "),e.qZA()())},directives:[T.rH],styles:[""]}),n})();var J=u(4850),R=u(7556);let W=(()=>{class n{constructor(t,r,o){this._router=t,this._authService=r,this._helper=o}canActivate(){return this._authService.verify().pipe((0,J.U)(t=>((this._helper.isHttpErrorResponse(t)||!t.ok)&&this._router.navigateByUrl("/auth/login"),!0)))}canLoad(){return this._authService.verify().pipe((0,J.U)(t=>((this._helper.isHttpErrorResponse(t)||!t.ok)&&this._router.navigateByUrl("/auth/login"),!0)))}}return n.\u0275fac=function(t){return new(t||n)(e.LFG(T.F0),e.LFG(R.e),e.LFG(v.W))},n.\u0275prov=e.Yz7({token:n,factory:n.\u0275fac,providedIn:"root"}),n})(),q=(()=>{class n{constructor(t,r){this._router=t,this._authService=r}canActivate(){return this._authService.verify().pipe((0,J.U)(t=>(console.log(t),(this.isHttpErrorResponse(t)||!t.admin)&&this._router.navigateByUrl("/play"),!0)))}canLoad(){return this._authService.verify().pipe((0,J.U)(t=>(console.log(t),(this.isHttpErrorResponse(t)||!t.admin)&&this._router.navigateByUrl("/play"),!0)))}isHttpErrorResponse(t){return"error"in t}}return n.\u0275fac=function(t){return new(t||n)(e.LFG(T.F0),e.LFG(R.e))},n.\u0275prov=e.Yz7({token:n,factory:n.\u0275fac,providedIn:"root"}),n})();const Je=[{path:"",component:oe.O,children:[{path:"",redirectTo:"play"},{path:"play",component:ue},{path:"players",component:ie,canLoad:[q],canActivate:[q]},{path:"throws/:id",component:he},{path:"ranking",component:we,canLoad:[q],canActivate:[q]},{path:"ranking/loser",component:Ce},{path:"ranking/winner",component:ke},{path:"404",component:Oe}],canLoad:[W],canActivate:[W]}];let qe=(()=>{class n{}return n.\u0275fac=function(t){return new(t||n)},n.\u0275mod=e.oAB({type:n}),n.\u0275inj=e.cJS({imports:[[T.Bz.forChild(Je)],T.Bz]}),n})(),Se=(()=>{class n{}return n.\u0275fac=function(t){return new(t||n)},n.\u0275mod=e.oAB({type:n}),n.\u0275inj=e.cJS({imports:[[c.ez,qe,z]]}),n})()},5633:j=>{j.exports=function I(u,c,_,x){void 0===c&&(c=1),void 0===_&&(_=10),void 0===x&&(x=10);var y,m,h=Math.ceil(u/_);if(c<1?c=1:c>h&&(c=h),h<=x)y=1,m=h;else{var S=Math.floor(x/2),L=Math.ceil(x/2)-1;c<=S?(y=1,m=x):c+L>=h?(y=h-x+1,m=h):(y=c-S,m=c+L)}var E=(c-1)*_,N=Math.min(E+_-1,u-1),Y=Array.from(Array(m+1-y).keys()).map(function(F){return y+F});return{totalItems:u,currentPage:c,pageSize:_,totalPages:h,startPage:y,endPage:m,startIndex:E,endIndex:N,pages:Y}}}}]);