<html>
<head>
    <title>Laravel gii</title>
    <link rel="stylesheet" href="{{URL::asset('xnz_assets/styles/iview.css')}}">
</head>
<body>
<style scoped>
    .layout-logo {
        width: 200px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        font-weight: bold;
        color: white;
        font-size: 32px;
        border-radius: 3px;
        float: left;
        position: relative;
        top: 15px;
        left: 20px;
    }

</style>
<div id="app">
    <i-layout>
        <i-header >
            <i-menu mode="horizontal" theme="dark"  >
                <div class="layout-logo">XnzDev gii</div>
            </i-menu>
        </i-header>
        <i-layout>
            <i-sider hide-trigger :style="{background: '#fff'}">
                <i-menu  theme="light" width="auto"  :active-name="getActiveName">
                    <i-menu-item name="model" to="{{url('/xnzdev/model')}}">create Model</i-menu-item>
                    <i-menu-item name="crud" to="{{url('/xnzdev/crud')}}">create CURD</i-menu-item>
                </i-menu>
            </i-sider>
            <i-layout :style="{padding: '0 24px 24px'}">
                <i-content :style="{padding: '24px', minHeight: '280px', background: '#fff'}">
                    @yield('content')
                </i-content>
            </i-layout>
        </i-layout>
    </i-layout>
</div>
<script src="{{URL::asset('xnz_assets/vue.min.js')}}"></script>
<script src="{{URL::asset('xnz_assets/iview.min.js')}}"></script>
@yield('assets')
@section('new_vue')
    <script>
        var vm = new Vue({
        }).$mount('#app')
    </script>
@show
</body>
</html>
