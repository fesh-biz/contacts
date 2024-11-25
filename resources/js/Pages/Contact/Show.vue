<script setup>
import Layout from '@/Pages/Contact/Layout.vue'

defineProps({
  contact: {
    type: Object,
    required: true
  }
})
</script>

<template>
  <Layout :title="contact.name">
    <ul class="space-y-4">
      <li class="flex items-center space-x-2">
        <span class="font-semibold">Email:</span>
        <span class="text-gray-600">{{ contact.email }}</span>
      </li>
      <li class="flex items-center space-x-2">
        <span class="font-semibold">Phone:</span>
        <span class="text-gray-600">{{ contact.phone || 'N/A' }}</span>
      </li>
    </ul>
  </Layout>
</template>