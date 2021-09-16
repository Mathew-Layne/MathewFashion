var addBtn = document.getElementById('add_btn');
var proName = document.getElementById('pro_name');
var login = document.getElementById('login');

addBtn.addEventListener('click', function(){
    if(proName.value == ""){
        alert('Product Name is Empty.');
    }else{
        alert('Product has been added');
    }
    
});

login.addEventListener('click', function(){    
        alert('Product has been added');   
});