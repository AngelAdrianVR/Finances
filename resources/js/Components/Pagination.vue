<template>

<div v-if="pagination.meta.links.length > 3" class="overflow-x-auto flex items-center justify-between border-t-2 border-indigo-600 bg-stone-700 px-4 py-3 mt-3 sm:px-6">
  <!-- <div class="flex flex-1 justify-between sm:hidden">
    <a href="#" class="relative inline-flex items-center rounded-md border border-indigo-600 bg-gray-300 px-4 py-2 text-sm font-medium text-black hover:bg-gray-50">Anterior</a>
    <a href="#" class="relative ml-3 inline-flex items-center rounded-md border border-indigo-600 bg-gray-300 px-4 py-2 text-sm font-medium text-black hover:bg-gray-50">Siguiente</a>
  </div> -->
  <div class="flex flex-1 items-center justify-between">
   
    <div>
      <nav class="isolate inline-flex -space-x-px rounded-lg shadow-md shadow-stone-800/60" aria-label="Pagination">
        
        <template v-for="(link,key) in pagination.meta.links">
            <div :key="key" v-if="link.url == null" class="rounded-lg relative inline-flex items-center border border-gray-400 bg-gray-300 px-4 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50 focus:z-20 " v-html="link.label">

            </div>

            <Link :key="'link-'+ key" 
            v-else 
            :href="link.url" 
            v-html="link.label" 
            class="relative inline-flex items-center border px-4 py-2 text-sm rounded-lg"
            :class="link.active ? 'z-10 bg-indigo-100 border-2 border-indigo-600 text-indigo-600 font-bold' : 'bg-gray-300 border-gray-500 text-black hover:bg-white'"
            />
            

        </template>

        <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
        <!-- <a href="#" v-html="link.label" class="relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20">2</a> -->
       
      </nav>
    </div>
  </div>
</div>

</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
    data(){
        return {

        }
    },
    props:{
        pagination: Object,
        
    },
    components:{
        Link,
    },
}
</script>