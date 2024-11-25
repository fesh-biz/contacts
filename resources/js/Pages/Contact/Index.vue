<script setup="">
import { Head } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import ContactTable from '@/Components/Contact/ContactTable.vue'

defineProps({
  contacts: {
    type: Array,
    default: []
  }
})
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

    <!-- Main -->
    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div
          class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
        >
          <div class="p-6 text-gray-900">
            <!-- Contacts Table -->
            <ContactTable :contacts="contacts" />
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>