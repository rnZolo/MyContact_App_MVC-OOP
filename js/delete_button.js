    
    $('.delBtn').click(function(){
        let i =   $('.delBtn').index(this); // clicked

        $('.delBtn').map((index , element)=>{
            if(i !== index && $(element).is(":hidden")){
                $(element).show();
                $(element).next('div').hide();
            }else{
                $(this).hide();
                $(this).next().show();
            }
        })
    });

    $('.close-del').click(function(){
        $(this).parent().hide();
        $(this).parent().prev().show();
    });

    $('.sure-del').click(function(){
        console.log('del');
        delNofit();
    });

    function delNofit(){
        Toastify({
            text: 'Delete Success',
            className: 'info',
            style: {
                background: 'linear-gradient(to right, #00b09b, #96c93d)',
            }
            }).showToast();
            
    }