<template>
    <div class="panel panel-default">
         <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container">
                <ul class="navbar-nav">
                    <li>
                        <router-link :to="{ name: 'home' }">Home</router-link>
                    </li>
                     <li v-if="$auth.check()" class="pull-right">
                        <router-link :to="{ name: 'upload' }">Upload Book</router-link>
                    </li>
                     <li v-if="$auth.check()" class="pull-right">
                        <router-link :to="{ name: 'edit' }">Edit Book</router-link>
                    </li>
                    <li v-if="!$auth.check()" class="pull-right">
                        <router-link :to="{ name: 'login' }">Login</router-link>
                    </li>
                    <li v-if="!$auth.check()" class="pull-right">
                        <router-link :to="{ name: 'register' }">Register</router-link>
                    </li>
                    <li v-if="$auth.check()" class="pull-right">
                        <a href="#" @click.prevent="$auth.logout()">Logout</a>
                    </li>
                </ul>
                </div>
            </nav><br/>
            <transition name ="fade">
                <router-view></router-view>
            </transition>
        </div>
    
</template>
<style>
    .fade-enter-active, .fade-leave-active {
      transition: opacity .5s
    }
    .fade-enter, .fade-leave-active {
      opacity: 0
    }
</style>

<script>

    export default{
    }
</script>