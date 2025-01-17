﻿package {
    import flash.events.*;
    import com.adobe.serialization.json.*;
    import flash.display.*;
    import flash.text.*;
    import flash.net.*;
    import flash.geom.*;
    import fl.events.*;

    public dynamic class basicxavi extends Sprite {

        const jdom = todo.usedomain + "/json/xavi/";

        var i;
        var j;
        var k;
        var swf;
        var loading;
        var SmDone;
        var xall;
        var head;
        var xface;
        var xeyel;
        var eyel;
        var xeyer;
        var eyer;
        var browsl;
        var browsr;
        var mouth;
        var hair;
        var acc;
        var Sequence;
        var Rest;
        var sp = 0;
        var Play = 0;
        var sl = 0;
        var actionLoader:URLLoader;
        var restLoader:URLLoader;
        var mLoader:URLLoader;
        var mAction;

        public function basicxavi(_arg1, _arg2, _arg3, _arg4, _arg5, _arg6){
            this.swf = new Object();
            this.loading = new Array();
            this.Sequence = new Object();
            this.Rest = new Object();
            super();
            var _local7:* = ((((this.jdom + "get.php?u=") + _arg4) + "&cb=") + _arg5);
            this.mLoader = xatlib.LoadVariables(_local7, this.RestLoadComplete);
            this.mAction = _arg6;
            this.xall = new xSprite();
            this.xall.label = "xall";
            addChild(this.xall);
            this.xall.x = _arg1;
            this.xall.y = _arg2;
            this.xall.scaleX = (this.xall.scaleY = _arg3);
        }
        function RestLoadComplete(_arg1:Event){
            if (this.mLoader.data){
                this.Rest = xJSON.decode(this.mLoader.data);
            };
            if (!this.Rest){
                this.Rest = xJSON.decode("{\"acc\":{\"y\":0,\"sy\":0,\"c\":0,\"l\":\"none\",\"r\":0,\"sx\":0,\"x\":0},\"browsr\":{\"y\":-11,\"sy\":0,\"c\":0,\"l\":\"xbrowdefault\",\"r\":0,\"sx\":0,\"x\":-2},\"xeyel\":{\"y\":-2,\"sy\":0,\"c\":0,\"l\":\"xeyesdefault\",\"r\":0,\"sx\":0,\"x\":4},\"mouth\":{\"y\":15,\"sy\":0,\"c\":0,\"l\":\"xmouthdefault\",\"r\":0,\"sx\":0,\"x\":0},\"hair\":{\"y\":-25,\"sy\":0,\"c\":0,\"l\":\"xhair2\",\"r\":0,\"sx\":50,\"x\":0},\"xeyer\":{\"y\":-2,\"sy\":0,\"c\":0,\"l\":\"xeyesdefault\",\"r\":0,\"sx\":0,\"x\":-4},\"head\":{\"y\":0,\"sy\":0,\"c\":0,\"l\":\"xhead1\",\"r\":0,\"sx\":-25,\"x\":0},\"browsl\":{\"y\":-11,\"sy\":0,\"c\":0,\"l\":\"xbrowdefault\",\"r\":0,\"sx\":0,\"x\":2}}");
            };
            this.head = new xSprite();
            this.head.label = "head";
            this.xall.addChild(this.head);
            this.xface = new xSprite();
            this.xface.label = "xface";
            this.xall.addChild(this.xface);
            this.xeyel = new xSprite();
            this.xeyel.label = "xeyel";
            this.xface.addChild(this.xeyel);
            this.eyel = new xSprite();
            this.eyel.x = 0;
            this.eyel.y = 0;
            this.eyel.label = "eyel";
            this.xeyel.addChild(this.eyel);
            this.xeyer = new xSprite();
            this.xeyer.label = "xeyer";
            this.xface.addChild(this.xeyer);
            this.eyer = new xSprite();
            this.eyer.x = 0;
            this.eyer.y = 0;
            this.eyer.scaleX = -1;
            this.eyer.label = "eyer";
            this.xeyer.addChild(this.eyer);
            this.browsl = new xSprite();
            this.browsl.label = "browsl";
            this.xface.addChild(this.browsl);
            this.browsr = new xSprite();
            this.browsr.label = "browsr";
            this.xface.addChild(this.browsr);
            this.mouth = new xSprite();
            this.mouth.label = "mouth";
            this.xface.addChild(this.mouth);
            this.hair = new xSprite();
            this.hair.label = "hair";
            this.xall.addChild(this.hair);
            this.acc = new xSprite();
            this.acc.label = "acc";
            this.xall.addChild(this.acc);
            this.setRest(true);
            if (this.mAction){
                this.loadAction(this.mAction);
            };
            addEventListener(Event.ENTER_FRAME, this.tick);
        }
        function setRest(_arg1=false){
            if (_arg1){
                while (this.head.numChildren) {
                    this.head.removeChildAt(0);
                };
                while (this.eyel.numChildren) {
                    this.eyel.removeChildAt(0);
                };
                while (this.eyer.numChildren) {
                    this.eyer.removeChildAt(0);
                };
                while (this.browsl.numChildren) {
                    this.browsl.removeChildAt(0);
                };
                while (this.browsr.numChildren) {
                    this.browsr.removeChildAt(0);
                };
                while (this.hair.numChildren) {
                    this.hair.removeChildAt(0);
                };
                while (this.mouth.numChildren) {
                    this.mouth.removeChildAt(0);
                };
                while (this.acc.numChildren) {
                    this.acc.removeChildAt(0);
                };
                this.head.addChild(this.LoadXa(this.Rest["head"].l, this.Rest["head"].c, 0, 0, false));
                this.eyel.addChild(this.LoadXa(this.Rest["xeyel"].l, null, 0, 0, false));
                this.eyer.addChild(this.LoadXa(this.Rest["xeyer"].l, null, 0, 0, false));
                this.browsl.addChild(this.LoadXa(this.Rest["browsl"].l, null, 0, 0, false));
                this.browsr.addChild(this.LoadXa(this.Rest["browsr"].l, null, 0, 0, false));
                this.hair.addChild(this.LoadXa(this.Rest["hair"].l, this.Rest["hair"].c, 0, 0, false));
                this.mouth.addChild(this.LoadXa(this.Rest["mouth"].l, null, 0, 0, false));
                this.acc.addChild(this.LoadXa(this.Rest["acc"].l, null, 0, 0, false));
            };
            this.head.x = this.Rest["head"].x;
            this.head.y = this.Rest["head"].y;
            this.xeyel.x = this.Rest["xeyel"].x;
            this.xeyel.y = this.Rest["xeyel"].y;
            this.xeyer.x = this.Rest["xeyer"].x;
            this.xeyer.y = this.Rest["xeyer"].y;
            this.browsl.x = this.Rest["browsl"].x;
            this.browsl.y = this.Rest["browsl"].y;
            this.browsr.x = this.Rest["browsr"].x;
            this.browsr.y = this.Rest["browsr"].y;
            this.mouth.x = this.Rest["mouth"].x;
            this.mouth.y = this.Rest["mouth"].y;
            this.hair.x = this.Rest["hair"].x;
            this.hair.y = this.Rest["hair"].y;
            this.acc.x = this.Rest["acc"].x;
            this.acc.y = this.Rest["acc"].y;
            this.head.rotation = this.Rest["head"].r;
            this.xeyel.rotation = this.Rest["xeyel"].r;
            this.xeyer.rotation = this.Rest["xeyer"].r;
            this.browsl.rotation = this.Rest["browsl"].r;
            this.browsr.rotation = this.Rest["browsr"].r;
            this.mouth.rotation = this.Rest["mouth"].r;
            this.hair.rotation = this.Rest["hair"].r;
            this.acc.rotation = this.Rest["acc"].r;
            this.head.scaleX = Math.exp((0.006931 * this.Rest["head"].sx));
            this.head.scaleY = Math.exp((0.006931 * this.Rest["head"].sy));
            this.xeyel.scaleX = Math.exp((0.006931 * this.Rest["xeyel"].sx));
            this.xeyel.scaleY = Math.exp((0.006931 * this.Rest["xeyel"].sy));
            this.xeyer.scaleX = Math.exp((0.006931 * this.Rest["xeyer"].sx));
            this.xeyer.scaleY = Math.exp((0.006931 * this.Rest["xeyer"].sy));
            this.browsl.scaleX = Math.exp((0.006931 * this.Rest["browsl"].sx));
            this.browsl.scaleY = Math.exp((0.006931 * this.Rest["browsl"].sy));
            this.browsr.scaleX = -(Math.exp((0.006931 * this.Rest["browsr"].sx)));
            this.browsr.scaleY = Math.exp((0.006931 * this.Rest["browsr"].sy));
            this.mouth.scaleX = Math.exp((0.006931 * this.Rest["mouth"].sx));
            this.mouth.scaleY = Math.exp((0.006931 * this.Rest["mouth"].sy));
            this.hair.scaleX = Math.exp((0.006931 * this.Rest["hair"].sx));
            this.hair.scaleY = Math.exp((0.006931 * this.Rest["hair"].sy));
            this.acc.scaleX = Math.exp((0.006931 * this.Rest["acc"].sx));
            this.acc.scaleY = Math.exp((0.006931 * this.Rest["acc"].sy));
        }
        function LoadXa(_arg1, _arg2, _arg3, _arg4, _arg5){
            var _local6:* = new MovieClip();
            _local6.x = _arg3;
            _local6.y = _arg4;
            _local6.t = _arg1;
            _local6.SF = (2 | smiley.f_NoCache);
            _local6.SA = (("(" + _arg1) + "#)");
            _local6.SC = _arg2;
            _local6.xd = 1;
            _local6.mc = new swfsmiley(_local6, _arg1);
            this.loading.push(_local6);
            return (_local6);
        }
        function loadingTick(){
            var _local1:*;
            var _local2:*;
            if (this.loading.length > 0){
                this.i = 0;
                while (this.i < this.loading.length) {
                    _local1 = this.loading[this.i];
                    if (((!(_local1.mc)) || ((_local1.mc.NumToLoad > 0)))){
                        this.SmDone = false;
                    } else {
                        if (_local1.SmDone){
                        } else {
                            _local1.SmDone = true;
                            _local1.addChild(_local1.mc);
                            if (_local1.mc.xd == undefined){
                            };
                            _local2 = _local1.mc.xd.split(",");
                            _local1.mc.x = 0;
                            _local1.xx = ((_local2[3])!=undefined) ? xatlib.xInt(_local2[3]) : 0;
                            _local1.x = _local1.xx;
                            _local1.mc.y = 0;
                            _local1.yy = ((_local2[4])!=undefined) ? xatlib.xInt(_local2[4]) : 0;
                            _local1.y = _local1.yy;
                            _local1.mc.width = xatlib.xInt(_local2[1]);
                            _local1.mc.height = xatlib.xInt(_local2[2]);
                        };
                    };
                    this.i++;
                };
                this.i = 0;
                while (this.i < this.loading.length) {
                    if (this.loading[this.i].SmDone){
                        this.loading.splice(this.i, 1);
                        this.i = 0;
                    };
                    this.i++;
                };
            };
        }
        public function loadAction(_arg1){
            var _local2:* = ((((this.jdom + "action.php?a=") + _arg1) + "&cb=") + global.sv);
            this.mLoader = xatlib.LoadVariables(_local2, this.actionLoadComplete);
        }
        function actionLoadComplete(_arg1:Event){
            this.Sequence = xJSON.decode(this.mLoader.data);
            this.sl = this.sequenceLength();
            this.sp = 0;
            this.Play = 1;
        }
        function sequenceLength(){
            var _local2:*;
            var _local1:* = 0;
            for (this.i in this.Sequence) {
                _local2 = 0;
                for (this.j in this.Sequence[this.i]) {
                    _local2++;
                };
                if (_local2 > _local1){
                    _local1 = _local2;
                };
            };
            return (_local1);
        }
        function tick(_arg1:Event){
            var _local2:* = new Array(this.xeyel, this.xeyer, this.browsl, this.browsr, this.xface, this.mouth, this.hair);
            this.loadingTick();
            if (this.Play > 0){
                this.i = 0;
                while (this.i < _local2.length) {
                    if (this.Sequence[_local2[this.i].label]){
                        if (this.Sequence[_local2[this.i].label][this.sp].a){
                            if (_local2[this.i].getChildAt(0).mc.OurMc[0].Layers){
                                _local2[this.i].getChildAt(0).mc.OurMc[0].Layers["Bkg"].Command("a", this.Sequence[_local2[this.i].label][this.sp].a);
                            };
                        };
                    };
                    this.i++;
                };
            };
            if (this.eyel.getChildAt(0).mc.OurMc[0].Layers){
                if (((this.Sequence["pupill"]) && ((this.sp < this.Sequence["pupill"].length)))){
                    this.eyel.getChildAt(0).mc.OurMc[0].Layers["Bkg"].Command("p", this.Sequence["pupill"][this.sp].x, this.Sequence["pupill"][this.sp].y);
                } else {
                    this.eyel.getChildAt(0).mc.OurMc[0].Layers["Bkg"].Command("p", 0, 0);
                };
            };
            if (this.eyer.getChildAt(0).mc.OurMc[0].Layers){
                if (((this.Sequence["pupilr"]) && ((this.sp < this.Sequence["pupilr"].length)))){
                    this.eyer.getChildAt(0).mc.OurMc[0].Layers["Bkg"].Command("p", -(this.Sequence["pupilr"][this.sp].x), this.Sequence["pupilr"][this.sp].y);
                } else {
                    this.eyer.getChildAt(0).mc.OurMc[0].Layers["Bkg"].Command("p", 0, 0);
                };
            };
            if (((this.Sequence["xeyels"]) && ((this.sp < this.Sequence["xeyels"].length)))){
                this.xeyel.scaleY = (Math.exp((0.006931 * this.Rest["xeyel"].sy)) * Math.exp(((2 * 0.006931) * this.Sequence["xeyels"][this.sp].y)));
            };
            if (((this.Sequence["xeyers"]) && ((this.sp < this.Sequence["xeyers"].length)))){
                this.xeyer.scaleY = (Math.exp((0.006931 * this.Rest["xeyer"].sy)) * Math.exp(((2 * 0.006931) * this.Sequence["xeyers"][this.sp].y)));
            };
            this.i = 0;
            while (this.i < _local2.length) {
                if (_local2[this.i] == this.xface){
                } else {
                    if (((this.Sequence[_local2[this.i].label]) && ((this.sp < this.Sequence[_local2[this.i].label].length)))){
                        _local2[this.i].x = (this.Rest[_local2[this.i].label].x + (this.Sequence[_local2[this.i].label][this.sp].x / 25));
                        _local2[this.i].y = (this.Rest[_local2[this.i].label].y + (this.Sequence[_local2[this.i].label][this.sp].y / 25));
                    } else {
                        _local2[this.i].x = this.Rest[_local2[this.i].label].x;
                        _local2[this.i].y = this.Rest[_local2[this.i].label].y;
                    };
                };
                this.i++;
            };
            if (this.Play > 0){
                this.sp++;
                if (this.sp >= this.sl){
                    if (this.Play == 1){
                        this.sp = 0;
                    } else {
                        this.sp--;
                        this.Play = 0;
                    };
                };
            };
        }

    }
}//package 
