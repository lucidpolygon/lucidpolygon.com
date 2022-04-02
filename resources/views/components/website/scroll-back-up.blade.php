<button 
class="fixed bottom-2 right-2 rounded-full font-medium items-center text-xl ml-3 px-2 py-2 border-primary border-double border-4 bg-gradient-to-b from-white to-secondary hover:bg-gradient-to-t transition duration-150 ease-in-out" 
x-cloak 
x-show="scroll"
x-data="{scroll : false}" 
@scroll.window="document.documentElement.scrollTop > 20 ? scroll = true : scroll = false" 
@click="window.scrollTo({top: 0, behavior: 'smooth'})" 
>
    <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
    </svg>
</button>