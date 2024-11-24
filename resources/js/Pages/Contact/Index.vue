<script setup="">
import { Head } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
</script>

<template>
  <Head title="Contacts" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex items-center justify-between">
        <h2
          class="text-xl font-semibold leading-tight text-gray-800"
        >
          Contacts
        </h2>

        <PrimaryButton>Add New Contact</PrimaryButton>
      </div>
    </template>
  </AuthenticatedLayout>
</template>