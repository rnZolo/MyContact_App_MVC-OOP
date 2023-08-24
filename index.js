
    let perPage = 5;
    let page = Math.ceil( $('.data').length / perPage);
    let start = 1;
    let arr = $('.data');


    $(window).on('load', function(){
        if(sessionStorage.getItem('page') == undefined){
            row_show(start);
            return;
        }
        let p = sessionStorage.getItem('page');
        console.log(p);
        row_show(p);   
    })

    for(let x = 0; x < page ; x++){
        $('.page').append(`<button type="button" class='pg btn bg-violet-800 text-white mx-3' value ="${x+1}">${x+1}</button>`);
    }

    $('.pg').click(function(){
        let pg = $(this).val();
       
        row_show(pg);
    });

    function row_show(p){
        sessionStorage.setItem("page", p);
        let start_index = (p -1) * perPage  ; // 0, 5, 10..
        let last_index = (perPage * p) - 1; // 4, 9, 14...
        $('.data').hide();
        for(let s = start_index; s <= last_index; s++){
            $(arr[s]).show();
        }
    }

    




 






































// // $("#search_btn").click(function(){
// //     const form = $("#search").serialize()
// //   });


// // let s = new XMLHttpRequest();

// // s.onload = function(){
// //     alert(s.responseText);
// // }
// // s.open("POST", './controller/search.php')
// // s.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
// // s.send('search_btn=&search=Jeff Daddy')



// $('#search_btn').click(function(e){
//     e.preventDefault();
//     // let f = 
//     // console.log(f);
//     $.ajax({
//         type: "get",
//         url: "./search.php",
//         contentType : 'application/x-www-form-urlencoded',
//         data: $('#search').serialize(),
//         success : function(response){
//             alert(response);
//         }
//     })
// })

