showData();
function showData(){
    const url = 'http://localhost/pizzaria-hi-tech2/montar.php';
    fetch(url,{
        method:"GET"        
    }).then(response => response.text())
    .then(response => results.innerHTML=response)
    .catch(err => console.log(err))
}

function createPedido(){
    const name = document.getElementById('name').value
    const valor = document.getElementById('valor').value

    const form = new FormData()

    form.append('name', name);
    form.append('valor', valor);

    const url = 'http://localhost/pizzaria-hi-tech2/cadastroitem.php';

    fetch(url,{
        method:'POST', 
        body: form
    }).then(response =>{
        response.json().then(result =>{
            Swal.fire(result.message); 

            document.getElementById('name').value = "";
            document.getElementById('valor').value = "";
            
        })
    }).catch(err => console.log(err))
}