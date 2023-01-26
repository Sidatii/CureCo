<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<center>
<h1 class="mt-4 text-3xl">Add Product</h1>
    <CENTER>
        <?php Flash('prd_added'); ?>
    </CENTER>
<div class="container max-w-md">
    <a href="<?php echo URLROOT . 'Managers/products';?>"><button type="button" class="text-white bg-[#90EE90] font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center flex justify-start dark:bg-[#90EE90]">Exit</button></a>
<form action="<?php echo URLROOT . 'Managers/addProduct'?>" method="POST" enctype="multipart/form-data" class="mx-4 my-4 flex flex-col gap-2 bg-[#F1F1F1] p-3 rounded-lg">
    <div >
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Product name</label>
        <input type="text" name="name" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 " required>
    </div>
    <div>
        <label for="disc" class="block mb-2 text-sm font-medium text-gray-900 ">Product discription</label>
        <textarea type="text" placeholder="The product discription here" name="disc" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 " required></textarea>
    </div>
    <div>
        <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Image</label>
        <input type="file" accept="image/*" name="image" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div>
        <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 ">Quantity</label>
        <input type="number" name="qty" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 " required>
    </div>
    <div>
        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
        <input type="float" name="price" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 " required>
    </div>
    <div>
        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Category</label>
        <select name="IDC" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-4" name="ID" id="">
            <?php foreach($data['category'] as $category) : ?>
                <option value="<?php echo $category->ID;?>">
                    <?php echo $category->name;?>
                </option>
            <?php endforeach;?>
        </select>
    </div>
    <button type="submit" class="text-white bg-[#245BA8] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-[#245BA8] dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>

</form>

</div>
</center>
<?php require APPROOT . '/views/inc/footer.php'; ?>