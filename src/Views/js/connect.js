const formConnect = document.forms['formConnect'];
const alert = document.querySelector('.alert');

formConnect.addEventListener('submit', async (e) => {

    e.preventDefault();

    let formData = new FormData(formConnect);

    let response = await fetch('../src/Controller/ConnectUserController.php',
    {
        method: 'post',
        headers: {
            'Accept': 'application/json'
        },
        body: formData
    })

    let data = await response.json();

    // console.log(data);

    alert.innerHTML = '';

    // let message = '';

    if(data.response === 200){

        alert.innerHTML = 'Successful connection !';
        alert.style.color = 'green';
    
        setTimeout(function() {
            window.location = "../";
        }, 2000)
    
    } else {
        alert.innerHTML = data;
        alert.style.color = 'red';

    }


})
