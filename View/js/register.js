           
const formRegister = document.forms['formRegister'];
const alert = document.querySelector('.alert');
            
 formRegister.addEventListener('submit', async (e) => {
    e.preventDefault();
            
    let formData = new FormData(formRegister);
        
    let response = await fetch('../Controller/ControllerRegisterUser.php',
    {
        method: 'post',
        headers:{
            'Accept': 'application/json'
        },
        body: formData
    })
            
    let data = await  response.json();
            
    console.log(data);

    alert.innerHTML = '';

    let message = '';
            
    if(data.ok === 'Register succes !'){

    alert.innerHTML = data.ok;
    alert.style.color = 'green';

    setTimeout(function() {
        window.location = "./connexion.php";
    }, 2000)

    } else {
    
        message += '<ul>';
        
        for (const key in data) {
            if (data.hasOwnProperty(key)) {
                const element = data[key];
                message += `<li>${key} : ${element}</li>`;
                }
            }
            message += '</ul>';

            alert.style.color = 'red';
            
            alert.insertAdjacentHTML('beforeend', message);
        }
});
            