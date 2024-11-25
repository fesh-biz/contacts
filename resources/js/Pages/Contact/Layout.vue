<script setup="">
import {Head} from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'

defineProps({
  title: {
    type: String,
    required: true
  }
})
</script>

<template>
  <Head :title="title"/>

  <AuthenticatedLayout>
    <template #header>
      <div class="flex items-center justify-between">
        <h2
          class="text-xl font-semibold leading-tight text-gray-800"
        >
          {{ title }}
        </h2>

        <slot name="headerButton">
          <PrimaryButton>Back</PrimaryButton>
        </slot>
      </div>
    </template>

    <!-- Main -->
    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div
          class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
        >
          <div class="p-6 text-gray-900">
            <slot />
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>