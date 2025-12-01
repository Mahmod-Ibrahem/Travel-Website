<template>
  <div class="flex items-center justify-between mb-3">
    <h1 class="text-3xl font-semibold">Settings</h1>
    <RouterLink :to="{name:'app.settings.create'}"
      class="py-2 px-4 border border-transparent text-sm font-medium
      rounded-md text-white bg-indigo-600 hover:bg-indigo-700
      focus:outline-none focus:ring-2 focus:ring-offset-2
      focus:ring-indigo-500">
      Add new Setting
    </RouterLink>
  </div>
    <SettingsTable></SettingsTable>
</template>
<script setup>
import SettingsTable from "./SettingsTable.vue";
</script>

<style scoped></style>
