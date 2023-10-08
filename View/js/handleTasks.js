window.addEventListener('DOMContentLoaded', async () => {

    // variables
    const display = document.getElementById('root');
    const newListInput = document.getElementById('newList');
    const addListButton = document.getElementById('addList');
    
    // event to add tasks (List table)
    addListButton.addEventListener('click', addList)

    async function addList(e){
        e.preventDefault();
        const listText = newListInput.value.trim();
        
        if(listText.length > 1){

            let insertList = await fetch('./src/Controller/ControllerHandleTasks.php?listText=' + listText)
            newListInput.value = '';
            window.location.reload();
        }

    }
    
    // creating the elements HTML
    const response = await fetch('./src/Controller/ControllerHandleTasks.php');
    if(response.ok){

        const data = await response.json();
        // console.log(data);
        
        data.forEach(item => {
            
            // creating element dom
            const divInProgress = document.createElement('div'),
                  divDone = document.createElement('div'),
                  checkbox = document.createElement('input'),
                  taskLabel = document.createElement('label'),
                  button = document.createElement('button');

            checkbox.type = 'checkbox';
            button.textContent = ' X '
    
            // handle label
            taskLabel.innerHTML = item.title;

            // if status === 'fait' add class 'done'
            if(item.status === 'fait'){
                taskLabel.classList.add('done');
                divDone.append(taskLabel, button);
                divDone.id = item.id_list
            } else {
                divInProgress.append(taskLabel, checkbox, button);
                divInProgress.id = item.id_list
            }
            
            // event to done task (change status)
            checkbox.addEventListener('click', doneList);
            
            async function doneList(e){

                e.preventDefault();
                
                let updatStatus = await fetch('./src/Controller/ControllerHandleTasks.php?status=' + item.id_list)
                window.location.reload();
        
                e.stopPropagation();

            }

            // Add divs into the dom
            display.append(divInProgress, divDone);

            // Event delete list
            button.addEventListener('click', deletList)
            
            async function deletList(e){
                let deleteList = await fetch('./src/Controller/ControllerHandleTasks.php?delete=' + item.id_list)
                window.location.reload();
                e.stopPropagation();

            } 

            // todo ceation tasks List event
            divInProgress.addEventListener('click', (e)=>{

                console.log('ok DIV');
                e.stopPropagation();
            })
        })
    }
});
