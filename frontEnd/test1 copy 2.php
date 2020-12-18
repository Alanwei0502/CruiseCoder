<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./lib/vue-2.4.0.js"></script>
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <link rel="stylesheet" href="./lib/bootstrap-3.3.7.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>*@

</head>
<body>
<div id="app">
    <cmt-box @func='refresh'></cmt-box>
    <ul class="list-group">
        <li class="list-group-item" v-for="item in list" :key="item.name">
            <div class="pane panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">{{item.userName}}:{{item.id}}</h3>
                </div>
                <div class="panel-body">
                    {{item.content}}
                    <span class="label label-info pull-right">未读留言</span>
                </div>
            </div>
        </li>
    </ul>
</div>
<template id="temp1">
    <div>
        <div class="form-group">
            <label for="">留言人</label>
            <input type="text" name="" id="" class="form-control" v-model='msgSonData.userName'>
        </div>
        <div class="form-group">
            <label for="">留言内容</label>
            <input type="text" name="" id="" class="form-control" v-model='msgSonData.content'>
        </div>
        <div class="form-group">
            <input type="button" value="发送留言" @click='postContent' class="btn btn-primary">
        </div>
    </div>
</template>

<script>
    var mycon1={
        template:'#temp1',
        data(){
            
            return{
                msgSonData:{
                  userName:'',
                  content:'',  
                }
                
            }
        }, 
        methods:{
            postContent(){
                // console.log(this.msgSonData.name);
                this.$emit('func',this.msgSonData)
            }
        }

    }
    new Vue({
        el:'#app',
        data:{
            newSonData:'',
            list:[
                {id:new Date(),userName:'迪丽热巴',content:'三生三世枕上书'},
                {id:new Date(),userName:'郑秀晶',content:'继承者'},
                {id:new Date(),userName:'宋茜',content:'风起洛阳'},
            ]
        },
        methods:{
            refresh(data){
                // console.log(data);
                this.newSonData=data;
                this.newSonData['id'] = new Date();
                this.list.push(this.newSonData);
            }
        },
        components:{
            'cmt-box':mycon1
        }
    })
</script>
   
    
</body>
</html>