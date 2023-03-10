function deleteProduct(id) {
    location.href = 'http://localhost/CureCo/public/Managers/delete/' + id
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
                        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md " id="card">
                        <div class="h-[250px] w-[250px]" id="image">
                            <img  class="rounded-t-lg object-fit h-full" style="aspect-ratio: 9/5" src="http://localhost/CureCo/public/img/${data.products[i].image}"/>
                        </div>
                        <div class="p-5">
                            <h3 class="mb-2 text-center text-xl font-bold tracking-tight text-gray-900 ">${data.products[i].name}</h3>
                            <div class="text-center gap-2 mb-2">
                                <p class="mb-3 font-normal text-gray-700 ">${data.products[i].discription}</p>
                                <p class="mb-3 font-normal text-gray-700 ">
                                    Quantity: ${data.products[i].quantity}</p>
                                <strong class="mb-3 font-normal text-gray-700 ">Price: ${data.products[i].price}
                                    dh</strong>
                                <p class="mb-3 font-normal text-gray-700 ">
                                    Date: ${data.products[i].date}</p>
                            </div>
                            <div class="flex gap-2 justify-center">
                                <!-- Main update modal -->
                                <button value="${data.products[i].ID}" data-modal-target="update"
                                    data-modal-toggle="update"
                                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    type="button">
                                    Edit
                                    <i class="fa fa-pen-to-square"></i>
                                </button>
                                <!-- Main delete modal -->
                                <button value="${data.products[i].ID}" data-modal-target="${data.products[i].ID} + delete"
                                        data-modal-toggle="${data.products[i].ID} + delete"
                                        class="block text-white bg-red-800 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-800 dark:hover:bg-red-700 dark:focus:ring-blue-800"
                                        type="button">
                                    delete
                                </button>
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


let getinfo = document.querySelectorAll('#update');
getinfo.forEach(item => {
    $(item).on('click',function () {
        $.post("../Managers/selectById/", {id: item.value},
            function (response) {
                var data = SON.parse(response);
                id = data.id_prod;
                $('#libelle').val(data.libelle);
                $('#quantite').val(data.quantite);
                $('#prix').val(data.prix);
                $('#category').val(data.id_cat)
                $('#category').text(data.cat);
            },
        );
    });
});






