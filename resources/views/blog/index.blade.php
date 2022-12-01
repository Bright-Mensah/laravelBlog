<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css" />

    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-slate-100">
   
<nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-black">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
      <a href="https://flowbite.com/" class="flex items-center">
          <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Laravel Blog</span>
      </a>
      <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
      </button>
      <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-dark dark:bg-dark md:dark:bg-dark dark:border-dark">
          <li>
            <a href="#" class="block py-2 pl-3 pr-4 text-dark bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Home</a>
          </li>
          <li>
            <a href="#" class="block py-2 pl-3 pr-4 text-dark rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-dark md:dark:hover:text-blue-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
          </li>
          <li>
            <a href="#" class="block py-2 pl-3 pr-4 text-dark rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-dark md:dark:hover:text-blue-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
          </li>
          <li>
            <a href="Admin/" class="block py-2 pl-3 pr-4 text-dark rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-dark md:dark:hover:text-blue-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Admin</a>
          </li>
          <li>
            <a href="#" class="block py-2 pl-3 pr-4 text-dark rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-dark md:dark:hover:text-blue-600 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  
  {{-- header --}}
  <div class="header text-center mt-14">
      <h1 class="font-bold text-5xl">LARAVEL BLOG</h1>
    </div>
    {{-- header ends here --}}

    {{-- content  --}}
    <div class="grid grid-cols-6 gap-x-12 mt-12">
        <div class="col-start-2 col-span-3">

            <div class="bg-white shadow-white drop-shadow-xl overflow-hidden">

                {{-- category  --}}

                <div class="text-center mt-4">

              <a href="" class="bg-neutral-900 text-white text-center rounded p-2">Blog Cat</a>
                </div>

                
              
                <div class="text-center">

                    {{-- <h4 class="mt-5 text-2xl font-bold p-2">THIS IS THE TITLE OF MY BLOG</h4> --}}
                    
                        
                    <h4 class="mt-5 text-2xl font-bold p-2">{{$postData->title}}</h4>
                    
                    <p class="text-center opacity-30 text-lg">{{$postData->updated_at->diffForHumans()}}</p>
                </div>

                {{-- image --}}
                <div class="mx-5">

                    <img src="/images/blog-bg.jpg" class="  h-96 w-full " alt="image of post">
                </div>

                {{-- image ends here --}}

                {{-- description --}}
                <div class="mx-5 py-5">
                  <p>{{Str::limit(strip_tags($postData->content),200,'...')}}</p>
                </div>
                {{-- description ends here --}}

                {{-- read more button --}}

                <div class="mt-3 text-center mb-10">
                  <a href="" class="bg-blue-600 text-white px-3 py-1 rounded-md">Read More</a>
                </div>


            </div>
        </div>
     

        {{-- sidebar --}}
        <div class="bg-white shadow-white drop-shadow-xl  w-72 h-5/6 p-3">
           <h1 class="bg-neutral-900 text-white p-3   text-center">
          ABOUT US
           </h1>

           {{-- image --}}

           <div class="mx-5">
            <img src="/images/blog-bg.jpg" class="object-contain  mt-4 w-full " alt="image of post">
        </div>

           {{-- image ends here  --}}

           <div class="mx-5 py-5">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore quaerat commodi dignissimos illum? Facere libero illum repellat quasi fuga veritatis aspernatur quae reiciendis architecto quas dolores aut, recusandae sequi at?</p>
        </div>
        {{-- description ends here --}}
        
        </div>
        {{-- sidebar ends here --}}
        
    </div>
    {{-- content ends here --}}






    


  <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>

</body>
</html>