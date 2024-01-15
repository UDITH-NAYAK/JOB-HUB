@props(['job'])
<div class="bg-gray-100  border rounded-md max-h-full h-full max-w-54 overflow-show p-2">
    <div class="flex h-full  ">
        <div class="max-h-full   ">
   
            <img src="{{ $job->logo ? asset('storage/' . $job->logo) : asset('public/images/default.jpg') }}" alt="logo"/>

            @auth
                <a href="{{ $job->job_link }}" target="_blank" class="mr-0 b-0">
                    <button
                        class=" b-0 mt-28 bg-gradient-to-r from-indigo-300 to-blue-500 text-white foucus:ring  mt-2 w-lg pt-2 pl-4 pr-4 pb-2 rounded rounded:md">Apply</button>
                </a>
            @else
                <a href="/login" target="_blank" class="mr-0 b-0 ">
                    <button
                        class=" leading-tight bg-gradient-to-r from-indigo-300 to-blue-500 text-white foucus:ring  mt-2 w-lg pt-2 pl-4 pr-4 pb-2 rounded rounded:md">Login
                        to apply</button>
                </a>
            @endauth
        </div>
        <div class="flex flex-col ml-2">
            <label class="text-md font-semibold text-2xl text-gray-500">{{ $job->title }}</label>
            <label class="text-sm font-semibold text-gray-500 mt-2">{{ $job->company }}</label>
            <div class="text-sm  mt-4">
                <i class="fa-solid fa-bag-shopping"></i> Exp: {{ $job->experience }} |
                <i class="fa-solid fa-indian-rupee-sign ml-2  "></i>{{ $job->salary }}
            </div>

            <div><!--tags div-->
                <ul class="flex mt-2 flex-wrap">
                    @php
                        $skills = explode(',', $job->skills);
                    @endphp
                    @foreach ($skills as $skill)
                        <li
                            class="flex items-center justify-center mt-2 bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs ">
                            <a href="/#">{{ $skill }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="leading-tight mt-2 w-full ">
                {{ \Illuminate\Support\Str::words($job->description, 10, '...') }}
                <a href="#">read more</a>
            </div>



        </div>

    </div>

</div>


{{-- 
@props(['job'])

<script>
    // document.querySelectorAll('.first_part_desc').forEach(ele=>{
    //     ele.addEventListener('click',(e)=>{
    //         let second=document.getElementById('second_part_desc');
    //         if(second.classList.contains('hidden')){
    //             second.classList.remove('hidden');
    //             document.getElementById('second_part_desc').classList.add('hidden')
    //         }

    //     })
    // });

</script>
<div x-show="showFullDescription:false" class="">
    <div class="bg-gray-100 border rounded-md h-54  min-h-[fit-content] overflow-hidden p-2">

        <div class="flex h-full">
            <img src="images/comp1.jpg" class="w-48 md:block " alt="logo">
            <div class="flex flex-col ml-2">
                <label class="text-md font-semibold text-2xl text-gray-500">{{ $job->title }}</label>
                <label class="text-sm font-semibold text-gray-500 mt-2">{{ $job->company }}</label>
                <div class="text-sm  mt-4">
                    <i class="fa-solid fa-bag-shopping"></i> {{ $job->experience }} |
                    <i class="fa-solid fa-indian-rupee-sign ml-2  "></i>{{ $job->salary }}
                </div>


                <div><!--tags div-->
                    <ul class="flex mt-2">
                        @php
                            $skills = explode(',', $job->skills);
                        @endphp
                        @foreach ($skills as $skill)
                            <li
                                class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs ">
                                <a href="/#">{{ $skill }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div  >
                    {{ \Illuminate\Support\Str::words($job->description, 25, '...') }}
                    <a id="first_part_desc"
                        class="see-more-link text-blue-500  cursor-pointer hover:underline">
                        See more
                    </a>
{{-- 
                    <div class="second_part_desc" class="hidden bg-white top-0 left-0 z-100">
                        <div class="sm:group-hover:block  p-4 border rounded-md w-96 job-description">
                            <span class="full-description">{{ $job->description }}</span>
                        </div> 

                        <a class="see-more-link text-blue-500 cursor-pointer hover:underline">
                            See less
                        </a>
                    </div>

                </div>


                <a href="{{ $job->job_link }}" target="_blank" class="mr-0 b-0">
                    <button
                        class=" bg-gradient-to-r from-indigo-300 to-blue-500 text-white foucus:ring  mt-2 w-lg pt-2 pl-4 pr-4 pb-2 rounded rounded:md">Apply</button>
                </a>
            </div>


        </div>
    </div>

</div>


 --}}

{{-- 
     <div >
                    {{ \Illuminate\Support\Str::words($job->description, 25, '...') }}
                    <a  id="first_part_desc" @click="showFullDescription=true" href="#more"
                        class="see-more-link text-blue-500  cursor-pointer hover:underline">
                        See more
                    </a>

                    <div x-show="showFullDescription"  id="second_part_desc" class="hidden bg-white top-0 left-0 z-100">
                        <div
                            class="sm:group-hover:block  p-4 border rounded-md w-96 job-description">
                            <span class="full-description">{{ $job->description }}</span>
                        </div>
                
                        <a @click="showFullDescription =false" class="see-more-link text-blue-500 cursor-pointer hover:underline">
                            See less
                        </a>
                        
                    </div>

                </div> --}}
