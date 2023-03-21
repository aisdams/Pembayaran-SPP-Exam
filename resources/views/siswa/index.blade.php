<!Doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css"  rel="stylesheet" />

</head>
<body>
  <div class="header w-full mb-14">
    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a href="https://flowbite.com/" class="flex items-center">
            <img src="{{ asset('asset/logo.png')}}" class="h-10 w-[120px] mr-3 sm:h-20" alt="Flowbite Logo" />
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">SPP KU</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li>
                <a href="#" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Home</a>
            </li>
            <li>
                <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
            </li>
            <li>
                <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
            </li>
            <li>
                <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
            </li>
            <li>
                <a href="/auth/login" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Logout</a>
            </li>
            </ul>
        </div>
        </div>
    </nav> 
    
    <div class="header grid grid-cols-2">
        <div class="apa mx-auto my-auto">
            <h1 class="text-[32px] font-bold text-[#043eb0]">Hai Welcome To SPP KU</h1>
            <button type="button" class="mx-[30%] mt-8 text-center justify-center align-items-center place-content-center focus:outline-none text-white bg-[#043eb0] hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-[#043eb0] dark:focus:ring-purple-900">Bayar SPP now</button>
        </div>
        <div class="imgnya">
            <img src="{{asset('asset/header.svg')}}" alt="" class="w-[400px] mx-auto my-auto mt-10">
        </div>
    </div>
  </div>

  <div class="pembayaran mt-20">
    <h1 class="text-center text-[25px] font-bold text-[#043eb0]">Yuk Check Pembayaran Anda</h1>
    <section class="bg-white dark:bg-gray-900">
        <div class="container flex flex-col items-center px-4 py-12 mx-auto text-center">
            <h2 class="max-w-2xl mx-auto text-2xl font-semibold tracking-tight text-gray-800 xl:text-3xl dark:text-white">
                Check SPP Anda <span class="text-blue-500">Sekarang Yuk !!!</span>
            </h2>
    
            <p class="max-w-4xl mt-6 text-center text-gray-500 dark:text-gray-300">
                Lorem, ipsum dolor sit amet consectetur
                adipisicing elit. Cum quidem officiis reprehenderit, aperiam veritatis non, quod veniam fuga possimus hic
                explicabo laboriosam nam. A tempore totam ipsa nemo adipisci iusto!
            </p>
    
            <div class="inline-flex w-full mt-6 sm:w-auto">
                <a href="#" class="inline-flex items-center justify-center w-full px-6 py-2 text-white duration-300 bg-blue-600 rounded-lg hover:bg-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                    Check
                </a>
            </div>
        </div>
    </section>
  </div>

  <section class="bg-white dark:bg-gray-900 mx-20">
    <div class="container px-6 py-10 mx-auto">
        <h1 class="text-2xl font-semibold text-gray-800 lg:text-3xl dark:text-white">FAQ's</h1>

        <hr class="my-6 border-gray-200 dark:border-gray-700">

        <div>
            <div>
                <button class="flex items-center focus:outline-none">
                    <svg class="flex-shrink-0 w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>

                    <h1 class="mx-4 text-xl text-gray-700 dark:text-white">How can I pay for my appointment ?</h1>
                </button>

                <div class="flex mt-8 md:mx-10">
                    <span class="border border-blue-500"></span>

                    <p class="max-w-3xl px-4 text-gray-500 dark:text-gray-300">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, eum quae. Harum officiis reprehenderit ex quia ducimus minima id provident molestias optio nam vel, quidem iure voluptatem, repellat et ipsa.
                    </p>
                </div>
            </div>

            <hr class="my-8 border-gray-200 dark:border-gray-700">

            <div>
                <button class="flex items-center focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>

                    <h1 class="mx-4 text-xl text-gray-700 dark:text-white">What can I expect at my first consultation ?</h1>
                </button>
            </div>

            <hr class="my-8 border-gray-200 dark:border-gray-700">

            <div>
                <button class="flex items-center focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>

                    <h1 class="mx-4 text-xl text-gray-700 dark:text-white">What are your opening hours ?</h1>
                </button>
            </div>

            <hr class="my-8 border-gray-200 dark:border-gray-700">

            <div>
                <button class="flex items-center focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>

                    <h1 class="mx-4 text-xl text-gray-700 dark:text-white">Do I need a referral ?</h1>
                </button>
            </div>

            <hr class="my-8 border-gray-200 dark:border-gray-700">

            <div>
                <button class="flex items-center focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>

                    <h1 class="mx-4 text-xl text-gray-700 dark:text-white">Is the cost of the appointment covered by private health insurance ?</h1>
                </button>
            </div>
        </div>
    </div>
  </section>
  <div class="inline-flex w-full mt-6 sm:w-auto mx-auto relative left-[40%] mb-10">
    <a href="/history-siswa" class="inline-flex items-center mx-auto text-center justify-center w-full px-6 py-2 text-white duration-300 bg-blue-600 rounded-lg hover:bg-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-80" target="_blank">
        Lihat History Saya
    </a>
</div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>
</html>