<template>
    <div class="flex justify-center items-center min-h-full w-full min-w-full">
      <div class="flex">
        <div class="text-indigo-600 self-start text-5xl px-8 font-bold border-r pb-8 leading-10">403</div>
        <div class="px-8">
          <h1 class="text-5xl font-bold mb-2">UNAUTHORIZED</h1>
          <p class="text-gray-400  mb-10">Please contact your administrator if you have any issue</p>
          <div>
            <RouterLink :to="{name:'HomePage'}"
              class="py-2 px-4 border border-transparent text-sm font-medium rounded-md
               text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none
                focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500
                hover:cursor-pointer">
              Go back home
            </RouterLink>
          </div>
        </div>
      </div>
    </div>
  </template>

  <script setup>
import { RouterLink } from 'vue-router';


  </script>

  <style scoped>

  </style>
