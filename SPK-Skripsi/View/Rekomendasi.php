<?php
//connect databasse//
session_start();
require '../Controller/rekomendasi_sc.php';
?>

<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Elcamera</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" type="image/x-icon" href="../Assets/favicon.ico" />
      <script src="https://cdn.tailwindcss.com"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="../style.css">
<!--CSS-->
      <style>

      .sony {
        width: 250px;
        height: 200px;
      }

      .brand {
        width: 250px;
        text-align: center;
        margin-top: 20px;
        float: left;
        margin-left: 110px;
      }

      /* Footer */
      .m {
        clear: both;
      }

    
        </style>
<!--CSS-->        
  </head>
  <body class="">
  <header class="border-b-black border-2">
      <!--Navbar-->
        <a class="z" href="../index.php"><img class="logo" src="../Assets/elcamera_logo.png" alt="logo"></a>
        <a href="../View/information.php" class="mr-4 hover:underline md:mr-6 text-black"><button>Information</button></a>
        <a class="cta" href="../View/Rekomendasi.php"><button>Rekomendasi</button></a>
        <a href="../View/Login.php" class="hover:underline text-black"><button>Login</button></a>
    </header>

    <!--ISI-->
    
    
<form method="POST" style="margin-top: 50px; padding:0px 50px; ">
<div class="grid md:grid-cols-2 md:gap-6">
  <div style="color: black" class="relative z-0 w-full mb-6 group">
      <select style="margin-top: 5px" name="harga" id="harga" class="block py-2.5 px-0 w-full text-sm text-midnight bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
        <Option value="" disabled selected></Option>
        <Option value="5"> < 10.000.000 </Option>
        <Option value="4"> 10.000.000 - 19.999.999</Option>
        <Option value="3"> 20.000.000 - 39.000.000</Option>
        <Option value="2"> 40.000.000 - 59.000.000 </Option>
        <Option value="1"> > 60.000.000</Option>
      </select>
      <label for="harga" class="peer-focus:font-medium absolute text-xl  dark:text-midnight duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Harga</label>
  </div>
  <div class="relative z-0 w-full mb-6 group">
        <select style="margin-top: 5px" name="pixel" id="pixel" class="block py-2.5 px-0 w-full text-sm text-midnight bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark: dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
            <Option value="" disabled selected></Option>
            <Option value="5">56 MP - 65.99 MP </Option>
            <Option value="4">46 MP - 55.99 MP </Option>
            <Option value="3">36 MP - 45.99 MP</Option>
            <Option value="2">25 MP - 35.99 MP </Option>
            <Option value="1"> < 25 MP</Option>
        </select>
      <label for="pixel" class="peer-focus:font-medium absolute text-xl  dark:text-midnight duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Pixel</label>
  </div>
  <div class="relative z-0 w-full mb-6 group">
        <select style="margin-top: 5px" name="reso" id="reso" class="block py-2.5 px-0 w-full text-sm text-midnight bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark: dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
            <Option value="" disabled selected></Option>
            <Option value="5">> 3840x2160 </Option>
            <Option value="4">2560x1440 - 3840x2160 </Option>
            <Option value="3">1920x1080 - 2560x1440</Option>
            <Option value="2">1280x720 - 1920x1080 </Option>
            <Option value="1"> < 1280x720</Option>
        </select>
      <label for="reso" class="peer-focus:font-medium absolute text-xl  dark:text-midnight duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Resolution</label>
  </div>
  
    <div class="relative z-0 w-full mb-6 group">
        <select style="margin-top: 5px" name="iso" id="iso" class="block py-2.5 px-0 w-full text-sm text-midnight bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark: dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
            <Option value="" disabled selected></Option>
            <Option value="5"> > 150000 </Option>
            <Option value="4">50000 - 149000 </Option>
            <Option value="3">25000 - 49999</Option>
            <Option value="2">15001 - 24999 </Option>
            <Option value="1"> < 15000</Option>
        </select>
        <label for="iso" class="peer-focus:font-medium absolute text-xl  dark:text-midnight duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ISO</label>
    </div>
    <div class="relative z-0 w-full mb-6 group">
        <select style="margin-top: 5px" name="shutter" id="shutter" class="block py-2.5 px-0 w-full text-sm text-midnight bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark: dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
            <Option value="" disabled selected></Option>
            <Option value="5"> > 1/7000 </Option>
            <Option value="4">1/4001 - 1/7000 </Option>
            <Option value="3">1/3001 - 1/4000</Option>
            <Option value="2">1/2001 - 1/3000 </Option>
            <Option value="1"> < 1/2000</Option>
        </select>
        <label for="shutter" class="peer-focus:font-medium absolute text-xl  dark:text-midnight duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Shutter Speed</label>
    </div>
  
    <div class="relative z-0 w-full mb-6 group">
        <select style="margin-top: 5px" name="beban" id="beban" class="block py-2.5 px-0 w-full text-sm text-midnight bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark: dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
            <Option value="" disabled selected></Option>
            <Option value="5"> > 650g </Option>
            <Option value="4">600g - 649g </Option>
            <Option value="3">400g - 600g</Option>
            <Option value="2">300g - 399g </Option>
            <Option value="1"> < 300g </Option>
        </select>
        <label for="beban" class="peer-focus:font-medium absolute text-xl  dark:text-midnight duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Beban</label>
    </div>
  </div>
  <button name="sub" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>

<div class="flex flex-col w-full max-w-md p-12 space-y-4 text-center bg-gray-50 text-gray-800 mx-auto">  
<a class="text-sm text-gray-600" href="../index.php">Go To Camera Page</a>
    </div>

    <!--Footer-->
    
    <!-- <p class="footer" style="text-align: center;">Copyright © 2023 | Leonardo Steven</p> -->

  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
  </body>
  <footer>
    <div class="m">


    
        <span class=" flex mt-4 space-x-6 sm:justify-center md:mt-0 text-sm text-midnight dark:text-midnight">© 2023 Elcamera. All Rights Reserved.
        </span>
        <div class="flex mt-4 space-x-6 sm:justify-center md:mt-0">
            <a href="https://instagram.com/elbaee" class="text-midnight hover:text-gray-400 dark:hover:text-midnight">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                <span class="sr-only">Instagram page</span>
            </a>
            </a>
            <a href="https://github.com/LeonardoSteven" class="text-midnight hover:text-gray-400 dark:hover:text-midnight">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                <span class="sr-only">GitHub account</span>
            </a>
        </div>
      </div>
    </div>
</footer>
</html>

