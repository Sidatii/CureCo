<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>


    <div class="m-4 flex flex-row justify-center gap-5">
        <form class="flex items-center">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                              clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" name="input" id="live_search"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder="Search">
            </div>
        </form>
        <a href="<?php echo URLROOT . 'managers/addproductPage' ?>">
            <button type="button"
                    class="text-white bg-[#245BA8] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-[#245BA8] dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                          clip-rule="evenodd"></path>
                </svg>
                Add Product
            </button>
        </a>
    </div>
    <div class="m-4 flex flex-row justify-center gap-5">
        <a href="<?php echo URLROOT . 'managers/Sort/price/ASC' ?>">
            <button type="button"
                    class="text-white bg-[#245BA8] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-[#245BA8] dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Price Ascending
            </button>
        </a>
        <a href="<?php echo URLROOT . 'managers/Sort/price/DESC' ?>">
            <button type="button"
                    class="text-white bg-[#245BA8] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-[#245BA8] dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Price Descending
            </button>
        </a>
        <a href="<?php echo URLROOT . 'managers/Sort/date/ASC' ?>">
            <button type="button"
                    class="text-white bg-[#245BA8] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-[#245BA8] dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Date Ascending
            </button>
        </a>
        <a href="<?php echo URLROOT . 'managers/Sort/date/DESC' ?>">
            <button type="button"
                    class="text-white bg-[#245BA8] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-[#245BA8] dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Date Descending
            </button>
        </a>
    </div>
    <CENTER>
        <?php Flash('prd_added'); ?>
        <?php Flash('prd_updated'); ?>
        <?php Flash('prd_deleted'); ?>
        <?php Flash('cruise_updated'); ?>

    </CENTER>
    <div id="update"></div>
    <div class="flex flex-wrap gap-2 justify-center my-4 w-auto" id="results">
    </div>
    <div class="flex flex-wrap gap-2 justify-center my-4 w-auto" id="card">
        <?php foreach ($data['products'] as $product) : ?>
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md ">
                <div class="h-[250px] w-[250px]">
                    <img class="rounded-t-lg object-fit h-full" style="aspect-ratio: 9/5"
                         src="<?php echo URLROOT . '/public/img/' . $product->image; ?>" alt=""/>
                </div>
                <div class="p-5">
                    <h3 class="mb-2 text-center text-xl font-bold tracking-tight text-gray-900 "><?php echo $product->name; ?></h3>
                    <div class="text-center gap-2 mb-2">
                        <p class="mb-3 font-normal text-gray-700 "><?php echo $product->discription; ?></p>
                        <p class="mb-3 font-normal text-gray-700 ">
                            Quantity: <?php echo $product->quantity; ?></p>
                        <strong class="mb-3 font-normal text-gray-700 ">Price: <?php echo $product->price; ?>
                            dh</strong>
                        <p class="mb-3 font-normal text-gray-700 ">
                            Date: <?php echo $product->date; ?></p>

                    </div>
                    <div class="flex gap-2 justify-center">

                        <!-- Modal toggle -->
                        <button data-modal-target="<?php echo $product->ID; ?>"
                                data-modal-toggle="<?php echo $product->ID; ?>"
                                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                            Edit
                            <i class="fa fa-pen-to-square"></i>
                        </button>

                        <!-- Main update modal -->
                        <div id="<?php echo $product->ID; ?>" tabindex="-1" aria-hidden="true"
                             class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                            data-modal-hide="<?php echo $product->ID; ?>">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="px-6 py-6 lg:px-8">
                                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update
                                            cruise</h3>
                                        <form class="space-y-6" method="POST"
                                              action="<?php echo URLROOT . 'Managers/updateProduct/' . $product->ID; ?>"
                                              enctype="multipart/form-data">
                                            <div>
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Product
                                                    name</label>
                                                <input type="text" name="name"
                                                       class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 "
                                                       value="<?php echo $product->name; ?>">
                                            </div>
                                            <div>
                                                <label for="disc" class="block mb-2 text-sm font-medium text-gray-900 ">Discription</label>
                                                <input type="text" name="disc"
                                                       class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 "
                                                       value="<?php echo $product->discription; ?>">
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
                                                <input type="number" name="qty"
                                                       class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 "
                                                       value="<?php echo $product->quantity; ?>">
                                            </div>
                                            <div>
                                                <label for="price"
                                                       class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
                                                <input type="text" name="price"
                                                       class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500"
                                                       value="<?php echo $product->price; ?>">
                                            </div>
                                            <div>
                                                <label for="category"
                                                       class="block mb-2 text-sm font-medium text-gray-900 ">Category</label>
                                                <select name="IDC"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-4"
                                                        name="ID">
                                                    <?php foreach ($data['category'] as $category) : ?>
                                                        <option value="<?php echo $category->ID; ?>">
                                                            <?php echo $category->name; ?>
                                                        </option>
                                                    <?php endforeach; ?>
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
                        </div>

                        <button data-modal-target="<?php echo $product->ID . "delete"; ?>"
                                data-modal-toggle="<?php echo $product->ID . "delete"; ?>"
                                class="block text-white bg-red-800 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-800 dark:hover:bg-red-700 dark:focus:ring-blue-800"
                                type="button">
                            delete
                        </button>

                        <div id="<?php echo $product->ID . "delete"; ?>" tabindex="-1"
                             class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                            data-modal-hide="<?php echo $product->ID . "delete"; ?>">
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
                                        <button data-modal-hide="<?php echo $product->ID . "delete"; ?>"
                                                VALUE="<?php echo $product->ID; ?>"
                                                onclick="deleteProduct(<?php echo $product->ID; ?>)" type="submit"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                            Yes, I'm sure
                                        </button>
                                        <button data-modal-hide="<?php echo $product->ID . "delete"; ?>" type="button"
                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                            No, cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


    <!-- Modals ----------------------------------------------------------------------------------------------------------->
    <div class="flex gap-2 justify-center mb-20">
        <!-- Main update modal -->
        <div id="update" tabindex="-1" aria-hidden="true"
             class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-full h-full max-w-md md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                            data-modal-hide="update">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update
                            product</h3>
                        <form class="space-y-6"

                              enctype="multipart/form-data">
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Product
                                    name</label>
                                <input type="text" id="name"
                                       class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 "
                                       value="<?php echo $product->name; ?>">
                            </div>
                            <div>
                                <label for="disc"
                                       class="block mb-2 text-sm font-medium text-gray-900 ">Discription</label>
                                <input type="text" name="date"
                                       class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 "
                                >
                            </div>
                            <div>
                                <label for="image"
                                       class="block mb-2 text-sm font-medium text-gray-900 ">Product
                                    image</label>
                                <input type="file" accept="image/*" id="image"
                                       class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 ">
                            </div>
                            <div>
                                <label for="qty" class="block mb-2 text-sm font-medium text-gray-900 ">Quantity</label>
                                <input type="number" id="nights"
                                       class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 "
                                >
                            </div>
                            <div>
                                <label for="price"
                                       class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
                                <input type="text" id="price"
                                       class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500"
                                >
                            </div>
                            <div>
                                <label for="category"
                                       class="block mb-2 text-sm font-medium text-gray-900 ">Category</label>
                                <select id="IDC"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-4"
                                        name="ID" id="">
                                    <?php foreach ($data['category'] as $category) : ?>
                                        <option value="<?php echo $category->ID; ?>">
                                            <?php echo $category->name; ?>
                                        </option>
                                    <?php endforeach; ?>
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
        </div>
        <div>


        </div>

        <div id="<?php echo $product->ID . "delete"; ?>" tabindex="-1"
             class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-full h-full max-w-md md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                            data-modal-hide="<?php echo $product->ID . "delete"; ?>">
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
                        <button data-modal-hide="<?php echo $product->ID . "delete"; ?>"
                                VALUE="<?php echo $product->ID; ?>"
                                onclick="deleteProduct(<?php echo $product->ID; ?>)" type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button>
                        <button data-modal-hide="<?php echo $product->ID . "delete"; ?>" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            No, cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>