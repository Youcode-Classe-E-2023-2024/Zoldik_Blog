

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<!-- Navbar -->

<div class="flex h-screen">
    <div class="w-[25%] h-screen from-sky-950 text-white bg-gradient-to-b bg-sky-800">
        <img src="img/logo.png" alt="" class="m-10 h-10">
        <div class="opacity-80 bg-none" id="l">
            <p class="w-full p-4 pl-10 my-2  text-2xl hover:cursor-pointer">Dashboard</p>
            <p class="w-full p-4 pl-10 my-2  text-2xl hover:cursor-pointer">Add Users</p>
            <p class="w-full p-4 pl-10 my-2 text-2xl hover:cursor-pointer">Products</p>
        </div>
        <form action="#" method="post">
        <button name="admin_logout_btn" class="text-start hover:opacity-70 w-full p-4 pl-10 my-2 text-red-500 font-bold text-xl">Log Out</button>
        </form>
    </div>

    <div class="w-full">

        <div class="container mx-auto p-8" id="div1">
            <!-- Statistics Section -->
            <h2 class="text-3xl font-bold mb-4">Statistics</h2>
            <section class="flex justify-between">
                <section class="mb-8 flex bg-white p-5 w-[30%] shadow-sm rounded-lg justify-between">
                    <img src="img/users.png" alt="" class="rounded-full h-16">
                    <section class="w-[70%]">
                        <p class="text-xl"></p>
                        <p class="text-lg">Clients</p>
                    </section>
                </section>
                <section class="mb-8 flex bg-white p-5 w-[30%] shadow-sm rounded-lg justify-between">
                    <img src="img/profile.png" alt="" class="rounded-full h-16">
                    <section class="w-[70%]">
                        <p class="text-xl"></p>
                        <p class="text-lg">Sellers</p>
                    </section>
                </section>
                <section class="mb-8 flex bg-white p-5 w-[30%] shadow-sm rounded-lg justify-between">
                    <img src="img/products.png" alt="" class="rounded-full h-16">
                    <section class="w-[70%]">
                        <p class="text-xl"></p>
                        <p class="text-lg">Available Products</p>
                    </section>
                </section>
            </section>


            <!-- User List Section -->
            <section class="bg-white shadow-sm">
                <!-- Table of Users -->
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                    <tr class="bg-gray-200">
                        <th class="p-4 text-left">Profile</th>
                        <th class="p-4 text-left">Full Name</th>
                        <th class="p-4 text-left">Email</th>
                        <th class="p-4 text-left">Role</th>
                        <th class="p-4 text-left text-center">Actions</th>

                    </tr>
                    </thead>
                    <tbody>
             
                    </tbody>
                </table>
            </section>

        </div>

        <div id="div2" class="m-10">


<form class="flex justify-end p-5 shadow-sm rounded-lg  mx-auto">
<div class="relative z-0 w-full mb-5 group">
      <input type="password" name="floating_password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
      <label  class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">firstname</label>
  </div>
  <div class="relative z-0 w-full mb-5 group">
      <input type="password" name="floating_password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">lastname</label>
  </div>
  <div class="relative z-0 w-full mb-5 group">
      <input type="password" name="repeat_password" id="floating_repeat_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">username</label>
  </div>
  <div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="floating_first_name" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">email</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">

    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Add profil picture</label>
<input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="multiple_files" type="file" multiple>

    </div>
  </div>
  <div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group">
        <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="floating_phone" id="floating_phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_phone" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">role</label>
    </div>
  </div>
</form>

            <div class=" flex justify-end">
                
                <a href="#" class="bg-green-500 text-white px-4 py-2 rounded mb-4 hover:opacity-80">Add User</a>
            </div>
            <section class="bg-white shadow-sm">
                <!-- Table of Users -->
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                    <tr class="bg-gray-200">
                        <th class="p-4 text-left">id</th>
                        <th class="p-4 text-left">firstname </th>
                        <th class="p-4 text-left">lastname</th>
                        <th class="p-4 text-left">username</th>
                        <th class="p-4 text-left">email</th>
                        <th class="p-4 text-left text-center"> Profile picture</th>
                        <th class="p-4 text-left text-center"> role </th>


                    </tr>
                    </thead>
                    <tbody>
                   
                            <td class="text-red-500"></td>
                          
                    </tbody>
                </table>
            </section>

        </div>
    </div>
</div>


<script>
    const p = document.querySelectorAll('div#l p');
    const d1 = document.querySelector('#div1');
    const d2 = document.querySelector('#div2');

    const div = [d1, d2];

    function lowerOpacity() {
        p.forEach((element)=>{
            element.style.opacity = '.7';
            element.style.background = 'none';
        });
    }
    lowerOpacity();

    function hideDivs() {
        div.forEach((element) => {
            element.style.display = 'none';
        });
    }
    hideDivs();

    div[0].style.display = 'block';
    p[0].style.backgroundColor = 'rgb(8 47 73)';
    p[0].style.opacity = '1';

    p.forEach((ele)=>{
        ele.addEventListener('click', () => {
            lowerOpacity();
            ele.style.opacity = '1';
            ele.style.backgroundColor = 'rgb(8 47 73)';

            switch (ele) {
                case ele = p[0]:
                    hideDivs();
                    div[0].style.display = 'block';
                    break;

                case ele = p[1]:
                    hideDivs();
                    div[1].style.display = 'block';
                    break;
            }
        });
    })
</script>

</body>
</html>