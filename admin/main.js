let formsDiv = document.querySelector('#forms');
let addBtn = document.querySelector('#btn_add');
let removeBtn = document.querySelector('#btn_remove');
let i = document.querySelector('#i');
i.value = 1;

addBtn.addEventListener('click', ()=>{
formsDiv.innerHTML += `
            <div class="flex flex-col">
                <div class="flex justify-between">
                    <div class="relative z-0 w-fit mb-5 group">
                        <input type="text" name="firstname-${i.value}" id="floating_password" class="w-fit block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">firstname</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group w-fit">
                        <input type="text" name="lastname-${i.value}" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">lastname</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group w-fit">
                        <input type="text" name="username-${i.value}" id="floating_repeat_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">username</label>
                    </div>
                    <div class="relative z-0 w-fit mb-5 group">
                        <input type="text" name="email-${i.value}" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">email</label>
                    </div>
                    <div class="relative z-0 w-fit mb-5 group">
                        <input type="password" name="password-${i.value}" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">password</label>
                    </div>
                </div>
                <div class="flex w-full justify-end items-center">
                    <div class="relative w-full mb-6">
                        <label for="fileInput-${i.value}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Choose Profile Picture</label>
                        <div class="mt-2 flex items-center">
                            <label for="fileInput-${i.value}" class="relative cursor-pointer bg-white dark:bg-gray-800 py-2 px-4 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200">
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Browse
                                </span>
                                <input id="fileInput-${i.value}" type="file" name="avatar-${i.value}" accept="image/*" required multiple class="hidden">
                            </label>
                            <span id="file-chosen-${i.value}" class="ml-3 text-gray-600 dark:text-gray-400">No file chosen</span>
                        </div>
                    </div>
                    <select name="is_admin-${i.value}" class="input-field w-fit rounded-2xl h-10 mx-8">
                        <option value="admin">Admin</option>
                        <option value="announcer">Announcer</option>
                    </select>
                </div>
            </div> `;
    i.value++;
});

removeBtn.addEventListener('click', () => {
    formsDiv.removeChild(formsDiv.children[i.value - 2]);
    i.value--;
});

document.addEventListener('change', (e) => {
    if (e.target.id.startsWith('fileInput-')) {
        const id = e.target.id.split('-')[1];
        const fileName = e.target.files[0].name;
        document.getElementById(`file-chosen-${id}`).innerText = fileName;
    }
});