<template>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 p-4 md:p-8">
        <!-- Header -->
        <div class="max-w-7xl mx-auto mb-6">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064" />
                    </svg>
                </div>
                <h1 v-if="!loading" class="text-2xl md:text-3xl font-bold text-slate-800">
                    {{ product.id ? `Update Tour` : 'Create New Tour' }}
                </h1>
            </div>
            <p v-if="product.id && !loading" class="text-slate-500 ml-13">
                Editing: <span class="font-medium text-indigo-600">{{ product.title }}</span>
            </p>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto">
            <Spinner v-if="loading"
                class="fixed inset-0 bg-white/80 backdrop-blur-sm flex items-center justify-center z-50" />

            <form v-else @submit.prevent="onSubmit" class="space-y-6">
                <!-- Basic Info Card -->
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="bg-gradient-to-r from-indigo-600 to-indigo-700 px-6 py-4">
                        <h2 class="text-lg font-semibold text-white flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Basic Information
                        </h2>
                    </div>

                    <div class="p-6 space-y-4">
                        <!-- Tour Group & Preference Row -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">
                                    Tour Group <span class="text-red-500">*</span>
                                </label>
                                <Select v-model="product.group" :options="groups" optionLabel="label"
                                    optionValue="value" placeholder="Select Tour Group" class="w-full" />
                                <p v-if="errors.group?.[0]" class="mt-1.5 text-red-500 text-sm flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ errors.group[0] }}
                                </p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">
                                    Tour Preference
                                </label>
                                <Select v-model="product.preference" :options="preferences" optionLabel="label"
                                    optionValue="value" placeholder="Select Preference (Optional)" class="w-full" />
                                <p v-if="errors.preference?.[0]"
                                    class="mt-1.5 text-red-500 text-sm flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ errors.preference[0] }}
                                </p>
                            </div>
                        </div>

                        <!-- Title -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">
                                Tour Title <span class="text-red-500">*</span>
                            </label>
                            <CustomInput v-model="product.title" type="text"
                                placeholder="Enter an attractive tour title..." :errors="errors.title" />
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">
                                Description <span class="text-red-500">*</span>
                            </label>
                            <CustomInput v-model="product.description" type="text" placeholder="Short description..."
                                :errors="errors.description" />
                        </div>
                    </div>
                </div>

                <!-- Itinerary Card -->
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                    <div
                        class="bg-gradient-to-r from-emerald-600 to-emerald-700 px-6 py-4 flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-white flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                            Itinerary
                        </h2>
                        <button type="button" @click="addItenary" class="inline-flex items-center gap-1.5 bg-white/20 hover:bg-white/30 
                text-white text-sm font-medium px-3 py-1.5 rounded-lg transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            Add Itenary
                        </button>
                    </div>

                    <div class="p-6">
                        <div v-if="product.itenary.length === 0" class="text-center py-12 text-slate-400">
                            <svg class="w-12 h-12 mx-auto mb-3 opacity-50" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="font-medium">No itinerary days added yet</p>
                            <p class="text-sm">Click "Add Itenary" to start building your tour schedule</p>
                        </div>

                        <div class="space-y-4">
                            <div v-for="(itenary, index) in product.itenary" :key="index" class="relative bg-gradient-to-br from-slate-50 to-slate-100 
                  border border-slate-200 rounded-xl p-5 group">
                                <!-- Day Badge -->
                                <div class="absolute -top-3 left-4 bg-indigo-600 text-white text-xs 
                  font-bold px-3 py-1 rounded-full shadow-sm">
                                    Itenary {{ index + 1 }}
                                </div>

                                <!-- Remove Button -->
                                <button type="button" @click="removeItenary(index)" class="absolute -top-2 -right-2 w-7 h-7 bg-red-500 hover:bg-red-600 
                    text-white rounded-full shadow-lg opacity-0 group-hover:opacity-100 
                    transition-all duration-200 flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>

                                <div class="mt-2 space-y-3">
                                    <input v-model="itenary.title" type="text" :placeholder="`Day ${index + 1} Title`"
                                        class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl 
                      focus:border-indigo-500 
                      transition-all duration-200"
                                        :class="{ 'border-red-400': errors[`itenary.${index}.title`]?.[0] }" />

                                    <Editor v-model="itenary.description"
                                        editorStyle="height: 180px; border-radius: 0.75rem;"
                                        :placeholder="`Describe day ${index + 1} activities...`"
                                        class="rounded-xl overflow-hidden"
                                        :class="{ 'border-red-400': errors[`itenary.${index}.description`]?.[0] }" />

                                    <p v-if="errors[`itenary.${index}.description`]?.[0]" class="text-red-500 text-sm">
                                        {{ errors[`itenary.${index}.description`][0] }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <p v-if="errors.itenary?.[0]" class="mt-4 text-red-500 text-sm text-center">
                            {{ errors.itenary[0] }}
                        </p>
                    </div>
                </div>

                <!-- Details & Pricing Card -->
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="bg-gradient-to-r from-amber-500 to-orange-500 px-6 py-4">
                        <h2 class="text-lg font-semibold text-white flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Details & Pricing
                        </h2>
                    </div>

                    <div class="p-6">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Left Column - Details -->
                            <div class="space-y-4">
                                <!-- Places -->
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Places
                                        Covered</label>
                                    <CustomInput v-model="product.places" type="text" placeholder="List the places..."
                                        :errors="errors.places" />
                                </div>

                                <!-- Duration -->
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Duration</label>
                                    <CustomInput v-model="product.duration" type="text"
                                        placeholder="e.g., 3 Days / 2 Nights" :errors="errors.duration" />
                                </div>

                                <!-- MultiSelects -->
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Locations</label>
                                    <MultiSelect :options="locations" optionLabel="name" optionValue="id"
                                        v-model="product.locations" placeholder="Select locations..."
                                        class="w-full custom-multiselect" :maxSelectedLabels="3" />
                                    <p v-if="errors.locations?.[0]"
                                        class="mt-1.5 text-red-500 text-sm flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ errors.locations[0] }}
                                    </p>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1.5">What's
                                        Included</label>
                                    <MultiSelect :options="included" optionLabel="title" optionValue="id"
                                        v-model="product.included" placeholder="Select inclusions..."
                                        class="w-full custom-multiselect" :maxSelectedLabels="3" />
                                    <p v-if="errors.included?.[0]"
                                        class="mt-1.5 text-red-500 text-sm flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ errors.included[0] }}
                                    </p>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1.5">What's
                                        Excluded</label>
                                    <MultiSelect :options="excluded" optionLabel="title" optionValue="id"
                                        v-model="product.excluded" placeholder="Select exclusions..."
                                        class="w-full custom-multiselect" :maxSelectedLabels="3" />
                                    <p v-if="errors.excluded?.[0]"
                                        class="mt-1.5 text-red-500 text-sm flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ errors.excluded[0] }}
                                    </p>
                                </div>

                                <!-- Pricing Grid -->
                                <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl p-4 mt-4">
                                    <h3 class="text-sm font-semibold text-indigo-800 mb-3 flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Pricing Tiers
                                    </h3>
                                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                        <div>
                                            <label class="block text-xs text-indigo-600 mb-1">Per Person</label>
                                            <div class="relative">
                                                <span
                                                    class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 font-medium">$</span>
                                                <input v-model="product.price_per_person" type="number" placeholder="0"
                                                    class="w-full pl-7 pr-3 py-2 bg-white border border-indigo-200 rounded-lg 
                                             text-sm" />
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-xs text-indigo-600 mb-1">2-5 Guests</label>
                                            <div class="relative">
                                                <span
                                                    class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 font-medium">$</span>
                                                <input v-model="product.price_two_five" type="number" placeholder="0"
                                                    class="w-full pl-7 pr-3 py-2 bg-white border border-indigo-200 rounded-lg 
                                             text-sm" />
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-xs text-indigo-600 mb-1">6-12 Guests</label>
                                            <div class="relative">
                                                <span
                                                    class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 font-medium">$</span>
                                                <input v-model="product.price_six_twenty" type="number" placeholder="0"
                                                    class="w-full pl-7 pr-3 py-2 bg-white border border-indigo-200 rounded-lg 
                            text-sm" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column - Images -->
                            <div class="space-y-4">
                                <!-- Cover Image Upload -->
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Cover Image</label>
                                    <div class="relative">
                                        <input type="file" id="cover-image" class="hidden" accept="image/*"
                                            @change="e => handleFileChange(e.target.files[0])" />
                                        <label for="cover-image" class="flex flex-col items-center justify-center w-full h-64 
                        border-2 border-dashed border-slate-300 rounded-xl cursor-pointer
                        hover:border-indigo-400 hover:bg-indigo-50/50 transition-all duration-200
                        overflow-hidden group">
                                            <img v-if="imagePreview" :src="imagePreview" alt="Cover Preview"
                                                class="w-full h-full object-cover" />
                                            <div v-else class="text-center p-6">
                                                <svg class="w-12 h-12 mx-auto text-slate-300 group-hover:text-indigo-400 
                          transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                <p class="mt-2 text-sm text-slate-500">Click to upload cover image</p>
                                            </div>
                                        </label>
                                    </div>
                                    <p v-if="errors.tour_cover?.[0]"
                                        class="mt-1 text-xs text-red-500 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ errors.tour_cover?.[0] }}
                                    </p>
                                </div>

                                <!-- Gallery Images -->
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Gallery
                                        Images</label>
                                    <input type="file" id="gallery-images" class="hidden" accept="image/*" multiple
                                        @change="handleProductImages" />
                                    <label for="gallery-images" class="flex items-center justify-center gap-2 w-full py-3 
                      border-2 border-dashed border-slate-300 rounded-xl cursor-pointer
                      hover:border-indigo-400 hover:bg-indigo-50/50 transition-all duration-200">
                                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4" />
                                        </svg>
                                        <span class="text-sm text-slate-600">Add gallery images</span>
                                    </label>
                                    <p v-if="errors.tour_images?.[0]"
                                        class="mt-1.5 text-red-500 text-sm flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ errors.tour_images[0] }}
                                    </p>
                                </div>

                                <!-- Gallery Preview -->
                                <div v-if="product.tour_images.length" class="grid grid-cols-4 gap-2">
                                    <div v-for="(image, index) in product.tour_images" :key="index"
                                        class="relative aspect-square rounded-lg overflow-hidden group cursor-pointer"
                                        @click="removeProductImage(index)">
                                        <img :src="image.path || createImageBlob(image)" :alt="`Gallery ${index + 1}`"
                                            class="w-full h-full object-cover" />
                                        <div class="absolute inset-0 bg-red-500/0 group-hover:bg-red-500/70 
                      flex items-center justify-center transition-all duration-200">
                                            <svg class="w-6 h-6 text-white opacity-0 group-hover:opacity-100 transition-opacity"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Actions -->
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 px-6 py-4 
          flex flex-col-reverse sm:flex-row sm:items-center sm:justify-between gap-3">
                    <RouterLink :to="{ name: 'app.products' }" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 
              text-slate-600 hover:text-slate-800 hover:bg-slate-100 
              rounded-xl transition-all duration-200 font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Cancel
                    </RouterLink>

                    <div class="flex gap-3">
                        <button type="button" @click="onSubmit($event, true)" class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 
                px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-indigo-700 
                hover:from-indigo-700 hover:to-indigo-800 text-white 
                rounded-xl font-medium shadow-lg shadow-indigo-500/25 
                transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import Spinner from './../../components/Core/Spinner.vue'
import { ref, onMounted, computed } from 'vue'
import { useRoute, useRouter } from "vue-router";
import store from "../../store/index.js"
import Editor from 'primevue/editor';
import { MultiSelect, Select } from "primevue";
import CustomInput from "../../components/Core/CustomInput.vue";

const emit = defineEmits(['update:modelValue', 'close'])
const route = useRoute()
const router = useRouter()

const loading = ref(false)
const product = ref({
    id: null,
    group: '',
    category_id: '',
    preference: '',
    title: '',
    description: '',
    included: '',
    excluded: '',
    places: '',
    duration: '',
    tour_cover: '',
    tour_images: [],
    locations: [],
    itenary: [],
    price_per_person: '',
    price_two_five: '',
    price_six_twenty: '',
    deleted_images_ids: [],
    // published: false
})
const errors = ref({
    title: [],
    description: [],
    group: [],
    category_id: [],
    preference: [],
    included: [],
    excluded: [],
    places: [],
    duration: [],
    tour_cover: [],
    tour_images: [],
    locations: [],
    itenary: [],
    price_per_person: [],
    price_two_five: [],
    price_six_twenty: [],
})

const groups = ref([
    { label: 'Day Tours', value: 'day-tours' },
    { label: 'Tour Packages', value: 'tour-packages' },
])

const preferences = ref([
    { label: 'Recommended', value: 'recommended' },
])

const locations = computed(() => store.state.locations.data)
const included = computed(() => store.state.inclusions.data)
const excluded = computed(() => store.state.exclusions.data)
const imagePreview = ref(null)

function handleProductImages(event) {
    const filesArray = Array.from(event.target.files);
    product.value.tour_images.push(...filesArray); // Convert FileList to an array
}


function addItenary() {
    product.value.itenary.push({
        title: '',
        description: ''
    })
}
function removeItenary(index) {
    product.value.itenary.splice(index, 1)
}

function createImageBlob(file) {
    return URL.createObjectURL(file)
}

function removeProductImage(index) {
    if (product.value?.tour_images?.[index]?.path) {
        (product.value.deleted_images_ids ??= []).push(product.value.tour_images[index].id)
    }
    product.value.tour_images.splice(index, 1);
}

function handleFileChange(image) {
    const file = image
    if (file) {
        product.value.tour_cover = file
        imagePreview.value = URL.createObjectURL(file)
    }
}

function onSubmit($event, close = false) {
    loading.value = true;
    const action = product.value.id ? 'updateProduct' : 'createProduct';
    const successStatus = action === 'updateProduct' ? 200 : 201;
    const successMessage = action === 'updateProduct' ? 'Product has successfully updated' : 'Product has successfully created';

    store.dispatch(action, product.value)
        .then(response => {
            loading.value = false;
            if (response.status === successStatus) {
                store.commit('showToast', successMessage);
                store.dispatch('getProducts');
                if (close) {
                    router.push({ name: 'app.products' });
                } else if (action === 'createProduct') {
                    router.push({ name: 'app.products.edit', params: { id: response.data.id } });
                }
            }
        })
        .catch(err => {
            loading.value = false;
            if (err.response.status === 422) {
                errors.value = err.response.data.errors;
            } else if (err.response.status === 409) {
                store.commit('showErrorToast', err.response.data.message);
            }
        });
}

onMounted(() => {
    loading.value = true
    if (route.params.id) {
        Promise.all([
            store.dispatch('getProduct', { productId: route.params.id, locale: 'en' }),
            store.dispatch('getInclusions'),
            store.dispatch('getExclusions'),
            store.dispatch('getLocations')
        ]).then(([productResponse]) => {
            product.value = productResponse.data
            imagePreview.value = product.value.tour_cover
            product.value.tour_cover = ''
        }).finally(() => {
            loading.value = false
        })
    }
    else {
        Promise.all([
            store.dispatch('getInclusions'),
            store.dispatch('getExclusions'),
            store.dispatch('getLocations')
        ]).finally(() => {
            loading.value = false
        })
    }
})
</script>
<style scoped>
/* Custom scrollbar */
::-webkit-scrollbar {
    width: 6px;
}

::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 3px;
}

::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 3px;
}

::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}

/* Editor styling */
:deep(.p-editor-container) {
    border-radius: 0.75rem;
    overflow: hidden;
    border: 1px solid #e2e8f0;
}

:deep(.p-editor-toolbar) {
    background: #f8fafc;
    border-bottom: 1px solid #e2e8f0;
}

:deep(.p-editor-content) {
    background: white;
}

:deep(.ql-editor) {
    font-size: 0.875rem;
}

:deep(.ql-editor a) {
    text-decoration: none !important;
}

/* MultiSelect styling */
:deep(.p-multiselect) {
    border-radius: 0.75rem;
    border: 1px solid #e2e8f0;
    background: #f8fafc;
}

:deep(.p-multiselect:hover) {
    border-color: #6366f1;
}

:deep(.p-multiselect.p-focus) {
    box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.2);
    border-color: #6366f1;
}
</style>
