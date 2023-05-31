<?php
//connect databasse//
require 'Include/db.php';
$brands= query("SELECT * FROM brand");
?>

<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Elcamera</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" type="image/x-icon" href="Assets/favicon.ico" />
      <script src="https://cdn.tailwindcss.com"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="style.css">

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
  <?php
  include('View/navbar.php')
  ?>



    <!--ISI-->
    
    <?php
    foreach ($brands as $merk):
    ?>

    <div class="brand p-3 py-3 border-4 border-black hover:translate-x-6 transition ease-in-out delay-150">
        <a class="b" href="View/listcam.php?id=<?= $merk['brand_id'] ?>">
          <img class="sony" src="Assets Kamera/Sony/<?= $merk['brand_img'] ?>">
          <p class="a"><?= $merk['brand_name'] ?></p>
        </a>
        
    </div>
    
    <?php
    endforeach;
    ?>

    <!--Footer-->
    
    <!-- <p class="footer" style="text-align: center;">Copyright © 2023 | Leonardo Steven</p> -->

  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
  </body>
  <footer>
    <div class="m ">

    <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between">
          <div class="mb-6 md:mb-0">
              <a href="index.php" class="flex items-center">
                  <img src="Assets/elcamera_logo.png" class="h-8 mr-3" alt="Elcamera Logo" />
                  <span class="self-center text-2xl font-semibold whitespace-nowrap text-sm text-midnight dark:text-midnight">© 2023 Elcamera. All Rights Reserved.</span>
              </a>
          </div>
          <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase ">shortcut</h2>
                  <ul class="text-black font-medium">
                      <li class="mb-4">
                          <a href="View/information.php" class="hover:underline text-black">Information</a>
                      </li>
                      <li>
                          <a href="View/Rekomendasi.php" class="hover:underline text-black">Rekomendasi</a>
                      </li>
                  </ul>
              </div>
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase ">Follow us</h2>
                  <ul class="text-gray-600 dark:text-gray-400 font-medium">
                      <li class="mb-4">
                          <a href="https://github.com/LeonardoSteven" class="hover:underline text-black">Github</a>
                      </li>
                      <li>
                          <a href="https://instagram.com/elbaee" class="hover:underline text-black">Instagram</a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
    </div>
<!-- </footer> -->


        <!-- <span class=" flex pt-6 space-x-6 sm:justify-center md:mt-0 text-sm text-midnight dark:text-midnight">© 2023 Elcamera. All Rights Reserved.
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
      </div> -->
</footer>
</html>

