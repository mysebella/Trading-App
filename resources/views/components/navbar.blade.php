 <nav class="navbar h-16 bg-orange px-4 flex items-center justify-between">
     <div id="hamburger-button" class="flex flex-col gap-1 text-white">
         <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" height="20px"
             width="20px" xmlns="http://www.w3.org/2000/svg">
             <path fill-rule="evenodd"
                 d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                 clip-rule="evenodd"></path>
         </svg>
     </div>
     <div class="flex gap-4 lg:gap-6 items-center">
         @if ($user->status != 1)
             <div class="text-white flex gap-2 items-center rounded bg-[#3E3E3E] p-1 px-2">
                 RM {{ $user->profile[0]->balanceFree }}
                 <span class="rounded bg-red-500 px-2 text-white">Free</span>
             </div>
         @else
             <div class="text-white flex gap-2 items-center rounded bg-[#3E3E3E] p-1 px-2">
                 RM {{ $user->profile[0]->balance }}
                 <span class="rounded bg-green px-2 text-black">Real</span>
             </div>
         @endif
         <a class="d-block text-white hidden lg:block">
             <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="24px"
                 width="24px" xmlns="http://www.w3.org/2000/svg">
                 <path
                     d="M464 428 339.92 303.9a160.48 160.48 0 0 0 30.72-94.58C370.64 120.37 298.27 48 209.32 48S48 120.37 48 209.32s72.37 161.32 161.32 161.32a160.48 160.48 0 0 0 94.58-30.72L428 464zM209.32 319.69a110.38 110.38 0 1 1 110.37-110.37 110.5 110.5 0 0 1-110.37 110.37z">
                 </path>
             </svg>
         </a>
         <a class="d-block text-white" href="">
             <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="24px"
                 width="24px" xmlns="http://www.w3.org/2000/svg">
                 <path
                     d="M255.9 456c31.1 0 48.1-22 48.1-53h-96.3c0 31 17 53 48.2 53zM412 352.2c-15.4-20.3-45.7-32.2-45.7-123.1 0-93.3-41.2-130.8-79.6-139.8-3.6-.9-6.2-2.1-6.2-5.9v-2.9c0-13.4-11-24.7-24.4-24.6-13.4-.2-24.4 11.2-24.4 24.6v2.9c0 3.7-2.6 5-6.2 5.9-38.5 9.1-79.6 46.5-79.6 139.8 0 90.9-30.3 102.7-45.7 123.1-9.9 13.1-.5 31.8 15.9 31.8h280.1c16.3 0 25.7-18.8 15.8-31.8z">
                 </path>
             </svg>
         </a>
         <div class="bg-cover h-8 w-8 lg:w-10 lg:h-10 rounded-full bg-background"
             style="background-image: url({{ asset('') }}storage/photo-profile/{{ $user->profile[0]->photoProfile }});">
         </div>
     </div>
 </nav>
