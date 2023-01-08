<template>
    <div class="border-2 border-black flex ">
      <router-link :to="{name : 'Home'}" >Home</router-link>
      <router-link :to="{name : 'Login' }">Login</router-link>
      <router-link :to="{name : 'Register'}">Register</router-link>
      <router-link :to="{name : 'Comment'}">Comment</router-link>
    </div>
</template>



<script>
export default {
    name: "Header"
}
</script>