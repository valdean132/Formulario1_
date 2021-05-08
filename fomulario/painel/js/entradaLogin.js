
$(function(){

    // var form = $('form');
    var lembrarUser = $('#lembrarUser');

    // form.addEventListener('submit', salvarUser);
    
    // btApagar.onclick = apagarUser;
    $("form").submit(function( event ){

        event.preventDefault();
        let inputUser = $('#user').value;
        let inputPassword = $('#password').value;

        dado = {
            inputUser: inputUser,
            inputPassword: inputPassword,
            inputLembrarUser: lembrarUser.checked
        }

        if(lembrarUser.checked){
            localStorage.setItem("userSalvo", dado)

            console.log('Salvo')
        }else{
            console.log('não salvo')
        }
        

        
    });

  
})
