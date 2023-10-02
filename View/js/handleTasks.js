window.addEventListener('DOMContentLoaded', async () => {

    const display = document.getElementById('root');

    const newListInput = document.getElementById('newList');
    const addListButton = document.getElementById('addList');

    // Écoutez le clic sur le bouton "Ajouter"
    addListButton.addEventListener('click', async (e) => {
        e.preventDefault();
        const listText = newListInput.value.trim();

        let insertList = await fetch('./../src/Controller/ControllerHandleTasks.php?listText=' + listText)
        newListInput.value = '';
        window.location.reload();

    });

    const response = await fetch('../src/Controller/ControllerHandleTasks.php');
    if(response.ok){

        const data = await response.json();
        console.log(data);
        
        data.forEach(item => {
            
            let div = document.createElement('div');
            // let button = document.createElement('button');

            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            const taskLabel = document.createElement('label');
    
            taskLabel.innerHTML = item.title;
            div.id = item.id_list;
            
            div.append(taskLabel, checkbox);
            
            checkbox.addEventListener('click', async (e)=>{
                
                console.log('ok checkBox');
                e.stopPropagation();

            })
            display.appendChild(div);
            div.addEventListener('click', (e)=>{
                console.log('ok DIV');
                e.stopPropagation();
            })
            })
        }


    });
