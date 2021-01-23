var app=new Vue({
    el:".container",
    data:{
        items:[],
    },
    methods:{
        add:function(index){
            if(this.items[index].cart<this.items[index].stock_left){
                if(this.items[index].cart==10){
                    alert("每位用户限购10件！");
                }else{
                    this.items[index].cart+=1;
                }
            }else{
                alert("库存不足！");
            }
        },
        sub:function(index){
            if(this.items[index].cart>0){
                this.items[index].cart-=1;
            }
        },
        dokill:function(index){
            if(this.items[index].cart==0){
                alert("请选择商品数量");
            }else{
                var item_id=this.items[index].id;
                var count=this.items[index].cart;
                
                axios.get("./api/kill.php?item_id="+item_id+"&count="+count).then(
                    function(response){
                        alert(response.data);
                },function(err){
                    alert(err);
                });
            }
        },
        count_down:function(){
            count=this.items.length;
            for(i=0;i<count;i++){
                //循环每一个商品
                var tn = Date.parse(new Date())/1000;
                ts=this.items[i].time_start;
                te=this.items[i].time_end;
                if(tn<ts){
                    this.items[i].placeholder='尚未开始';
                    gap=ts-tn;
                    this.items[i]['h']=Math.floor(gap/3600);
                    this.items[i]['m']=Math.floor((gap-3600*this.items[i]['h'])/60);
                    this.items[i]['s']=gap-3600*this.items[i]['h']-60*this.items[i]['m'];
                    this.items[i]['isGreen']=true;
                    this.$forceUpdate();
                }else if(ts<=te){
                    this.items[i].placeholder='抢购中';
                    this.items[i].purchaseButton=true;
                    gap=te-tn;
                    this.items[i]['h']=Math.floor(gap/3600);
                    this.items[i]['m']=Math.floor((gap-3600*this.items[i]['h'])/60);
                    this.items[i]['s']=gap-3600*this.items[i]['h']-60*this.items[i]['m'];
                    this.$forceUpdate();
                    this.items[i]['showL']=true;
                }else{
                    this.items[i].placeholder='已结束';
                    this.$forceUpdate();
                }
                
            }
        }
    },
    mounted:function(){//页面一加载就运行该函数
        var that=this;

        axios.get("./api/get_valid_item.php").then(
            //先从api获取展示的商品信息，接着做以下操作
            function(response){
                that.items=response.data;
                count=that.items.length;
                for(i=0;i<count;i++){
                    that.items[i]['purchaseButton']=false;
                    that.items[i]['h']=0;
                    that.items[i]['m']=0;
                    that.items[i]['s']=0;
                    that.items[i]['isGreen']=false;
                    that.items[i]['showL']=false;
                }
                that.count_down();
                // console.log(that.items.length);
                setInterval(()=>{
                that.count_down();
                },1000);
            },
            function(err){}
        );
        
        // setInterval(()=>{
        //     this.test();
        //     // this.count_down();
        // },1000);
    }
})