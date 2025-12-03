<template>
  <div>
    <label class="sr-only">{{ label }}</label>
    <div class="mt-1 flex rounded-md shadow-sm">
      <textarea v-if="type === 'textarea'" :name="name" :required="required" :value="props.modelValue"
        @input="emit('update:modelValue', $event.target.value)" :class="inputClasses"
        :placeholder="placeholder"></textarea>
      <input v-else :type="type" :name="name" :required="required" :value="props.modelValue"
        @input="emit('update:modelValue', $event.target.value)" :class="inputClasses" :placeholder="placeholder" />
      <span v-if="append"
        class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
        {{ append }}
      </span>
    </div>
    <p class="mt-1.5 text-red-500 text-sm flex items-center gap-1" v-if="errors && errors[0]"> <svg class="w-4 h-4"
        fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd"
          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
          clip-rule="evenodd" />
      </svg>
      {{ errors[0] }}</p>
  </div>
</template>

<script setup>

import { computed, ref } from "vue";

const props = defineProps({
  modelValue: [String, Number, File],
  label: String,
  type: {
    type: String,
    default: 'text'
  },
  name: String,
  required: Boolean,
  prepend: {
    type: String,
    default: ''
  },
  append: {
    type: String,
    default: ''
  },
  selectOptions: Array,
  errors: {
    type: Array,
    required: false,
  },
  placeholder: {
    type: String,
    default: ''
  }
})

const id = computed(() => {
  if (props.id) return props.id;

  return `id-${Math.floor(1000000 + Math.random() * 1000000)}`;
})
const inputClasses = computed(() => {
  const cls = [
    `w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl 
                   focus:border-indigo-500 
                  transition-all duration-200 text-slate-700`,
  ];

  if (props.append && !props.prepend) {
    cls.push(`rounded-l-md`)
  } else if (props.prepend && !props.append) {
    cls.push(`rounded-r-md`)
  } else if (!props.prepend && !props.append) {
    cls.push('rounded-md')
  }
  if (props.errors && props.errors[0]) {
    cls.push('border-red-600 focus:border-red-600')
  }
  return cls.join(' ')
})
const emit = defineEmits(['update:modelValue', 'change'])

function onChange(value) {
  emit('update:modelValue', value)
  emit('change', value)
}

</script>

<style scoped></style>
