function deleteProduct(id){
    location.href = 'delete/'+id
}


$(document).ready(function (){
    $('#search').onkeyup(function (){
        search_table($(this).value())
    })
    function search_table(value){
        $('card').each(function (){
            let found = 'false'
            $(this).each(function (){
                if($(this).text.toLowerCase().indexOf(value.toLowerCase())>=0){
                    found = 'true'
                }
            })
            if (found == 'true'){
                $(this).show()
            } else{
                $(this).hide()
            }
        })
    }
})