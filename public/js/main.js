function deleteProduct(id) {
    location.href = 'delete/' + id
}


$(document).ready(function () {
    $("#live_search").on("change keyup paste", function(){
        let input = $(this).val().trim();
        // alert(input)
            $("#card").hide();
            $.ajax({
                url: "../Managers/liveSearch",
                method: "POST",
                data: {input: input},

                success: function (data) {

                    $('#results').empty();

                    for (let i = 0; i < data['products'].length; i++) {
                    let cards = `
                        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700" id="card">
                        <div>
                            <img class="rounded-t-lg object-cover" src="<?php echo URLROOT . '/public/img/' . $product->image; ?>" alt=""/>
                        </div>
                        <div class="p-5">
                            <h3 class="mb-2 text-center text-xl font-bold tracking-tight text-gray-900 dark:text-white">${data.products[i].name}</h3>
                            <div class="text-center gap-2 mb-2">
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">${data.products[i].discription}</p>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    Quantity: ${data.products[i].quantity}</p>
                                <strong class="mb-3 font-normal text-gray-700 dark:text-gray-400">Price: ${data.products[i].price}
                                    dh</strong>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    Date: ${data.products[i].date}</p>
                            </div>
                            <div class="flex gap-2 justify-center">
                                <!-- Modal toggle -->
                                <button onclick="sheckTEst(${data.products[i].ID})"
                                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        type="button">
                                    Edit
                                    <i class="fa-light fa-pen-to-square"></i>
                                </button>
        
                                <!-- Main modal -->
                           
        
                                <button data-modal-target="${data.products[i].ID} + delete"
                                        data-modal-toggle="${data.products[i].ID} + delete"
                                        class="block text-white bg-red-800 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-800 dark:hover:bg-red-700 dark:focus:ring-blue-800"
                                        type="button">
                                    delete
                                </button>
        
                                <div id="${data.products[i].ID} + delete" tabindex="-1"
                                     class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                    <div class="relative w-full h-full max-w-md md:h-auto">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button"
                                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                    data-modal-hide="${data.products[i].ID} + delete">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                          clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-6 text-center">
                                                <svg aria-hidden="true"
                                                     class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none"
                                                     stroke="currentColor" viewBox="0 0 24 24"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you
                                                    sure you want to delete this product?</h3>
                                                <button data-modal-hide="${data.products[i].ID} + delete"
                                                        VALUE="${data.products[i].ID}"
                                                        onclick="deleteProduct(${data.products[i].ID})" type="submit"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                    Yes, I'm sure
                                                </button>
                                                <button data-modal-hide="${data.products[i].ID} + delete" type="button"
                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                    No, cancel
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`
                    let form = document.createElement('div')
                    form.innerHTML = cards
                        $("#results").append(form)
                    }
                }
            })

    })

})

function sheckTEst(id){
    $.ajax({
        url: "../Managers/selectById/"+{id},
        method: "POST",
        data: {id: id},

        success: function (data) {
            console.log(data.products[0].ID)
            let element = `<div id="${id}" tabindex="-1" aria-modal="true"
                                     class="fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full justify-center items-center flex" role="dialog">
                                    <div class="relative w-full h-full max-w-md md:h-auto">
                                        <!-- Modal content -->
                                        <div  class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button"
                                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                    data-modal-hide="${data.products[0].ID}" onclick="hidee(${id})">
                                                    
                                                <svg aria-modal="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="px-6 py-6 lg:px-8">
                                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update
                                                    cruise</h3>
                                                <form class="space-y-6" method="POST"
                                                      action="http://localhost/CureCo/Managers/updateProduct/ + ${data.products[0].ID}"
                                                      enctype="multipart/form-data">
                                                    <div>
                                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Product
                                                            name</label>
                                                        <input type="text" name="name"
                                                               class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 "
                                                               value="${data.products[0].name}">
                                                    </div>
                                                    <div>
                                                        <label for="disc" class="block mb-2 text-sm font-medium text-gray-900 ">Discription</label>
                                                        <input type="text" name="date"
                                                               class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 "
                                                               value="${data.products[0].discription}">
                                                    </div>
                                                    <div>
                                                        <label for="image"
                                                               class="block mb-2 text-sm font-medium text-gray-900 ">Product
                                                            image</label>
                                                        <input type="file" accept="image/*" name="image"
                                                               class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 ">
                                                    </div>
                                                    <div>
                                                        <label for="qty" class="block mb-2 text-sm font-medium text-gray-900 ">Quantity</label>
                                                        <input type="number" name="nights"
                                                               class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 "
                                                               value="${data.products[0].quantity}">
                                                    </div>
                                                    <div>
                                                        <label for="price"
                                                               class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
                                                        <input type="text" name="depPort"
                                                               class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500"
                                                               value="${data.products[0].price}">
                                                    </div>
                                                    <div>
                                                        <label for="category"
                                                               class="block mb-2 text-sm font-medium text-gray-900 ">Category</label>
                                                        <select name="IDC" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-4" name="ID" id="select">
                                                            ${data.categories.map(item => `
                                                            <option value="${item.ID}">${item.name}</option>
                                                            `).join('')}
                                                        </select>
                                                    </div>
                                                    <button type="submit"
                                                            class="w-full text-white bg-[#245BA8] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-[#245BA8] dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                        Update product
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>`
            let ele = document.createElement('div')
            ele.innerHTML = element
            $('#update').append(ele)

        }
        })
}

function hidee(id){
    let hideDiv =document.getElementById('id')
    hideDiv.removeAttribute('class')
    hideDiv.setAttribute('class','absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white hidden')
}


//<div id="10" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full justify-center items-center flex" aria-modal="true" role="dialog">
//                             <div class="relative w-full h-full max-w-md md:h-auto">
//                                 <!-- Modal content -->
//                                 <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
//                                     <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="10" fdprocessedid="qdsnu5">
//                                         <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
//                                             <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
//                                         </svg>
//                                         <span class="sr-only">Close modal</span>
//                                     </button>
//                                     <div class="px-6 py-6 lg:px-8">
//                                         <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update
//                                             cruise</h3>
//                                         <form class="space-y-6" method="POST" action="http://localhost/CureCo/Managers/updateProduct/10" enctype="multipart/form-data">
//                                             <div>
//                                                 <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Product
//                                                     name</label>
//                                                 <input type="text" name="name" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 " value="sidati" fdprocessedid="1gs6h2">
//                                             </div>
//                                             <div>
//                                                 <label for="disc" class="block mb-2 text-sm font-medium text-gray-900 ">Discription</label>
//                                                 <input type="text" name="date" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 " value="DZAFZFQDSVDVDS" fdprocessedid="x3nprl">
//                                             </div>
//                                             <div>
//                                                 <label for="image" class="block mb-2 text-sm font-medium text-gray-900 ">Product
//                                                     image</label>
//                                                 <input type="file" accept="image/*" name="image" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 ">
//                                             </div>
//                                             <div>
//                                                 <label for="qty" class="block mb-2 text-sm font-medium text-gray-900 ">Quantity</label>
//                                                 <input type="number" name="nights" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 " value="4" fdprocessedid="yigv5">
//                                             </div>
//                                             <div>
//                                                 <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
//                                                 <input type="text" name="depPort" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500" value="1000" fdprocessedid="vz0w2">
//                                             </div>
//                                             <div>
//                                                 <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Category</label>
//                                                 <select name="IDC" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-4" id="" fdprocessedid="uiww5p">
//                                                                                                             <option value="0">
//                                                             Paracetamol                                                        </option>
//                                                                                                     </select>
//                                             </div>
//                                             <button type="submit" class="w-full text-white bg-[#245BA8] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-[#245BA8] dark:hover:bg-blue-700 dark:focus:ring-blue-800" fdprocessedid="o3wbre">
//                                                 Update product
//                                             </button>
//                                         </form>
//                                     </div>
//                                 </div>
//                             </div>
//                         </div>