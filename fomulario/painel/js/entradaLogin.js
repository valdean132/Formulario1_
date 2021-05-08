

// Salvando dados de Login...
function lembrarUsuario(){
    const user = document.getElementById('user');
    const password = document.getElementById('password');
    const lembrarUser = document.getElementById('lembrarUser');


    // let userPasswordDom = { 
    //     id: '1', 
    //     user: 'valdeanSouza', 
    //     password: '1598753',
    //     lembrarUser: lembrarUser.checked
    // }

    

    // lembrarUser.addEventListener('click', () => {
    //     if(lembrarUser.checked == false){
    //         userPasswordDom = userPasswordDom.filter(usuarioSenha);
    //         console.log(userPasswordDom);
    //     }
    // }) 

    // Verificação
    // const addIntoDom = transaction =>{
    //     if(lembrarUser.checked){
    //         user.value = usuarioSenha.user;
    //         password.value = usuarioSenha.password;
    //     }else{
    //         user.value = '';
    //         password.value = '';
    //     }
        
    // }

    

    const generateID = () => Math.round(Math.round() * 1000);

    $("form").submit(function( event ) {
        event.preventDefault();
        
        const transactionUser = user.value.trim();
        const transactionPassword = password.value.trim();
        
        if(lembrarUser.checked){
            const userPassword = { 
                id: generateID(), 
                user: transactionUser, 
                password: transactionPassword,
                lembrarUser: lembrarUser.checked
            }
            const localStorages = JSON.parse(localStorage.getItem(userPassword));
            let transaction = localStorage.getItem('userPasword') !== null ? localStorages : [];

            const uptadeLocalStorege = () => {
                localStorages.setItem('transaction', JASON.stringfy(transaction));
            }

            user.value = uptadeLocalStorege.user;
            password.value = uptadeLocalStorege.password;
        }else{
            user.value = '';
            password.value = '';
        }
    });

    // addIntoDom();

}

lembrarUsuario()
