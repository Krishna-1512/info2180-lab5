window.onload= mystarter;
function mystarter(){
    let searchbtn = document.getElementById('lookup');
    let searchbtn2 = document.getElementById('l2');
    let message = document.getElementById('result');
    console.log(searchbtn)
    searchbtn.addEventListener('click',function(element){
        element.preventDefault();
        var mi_form = document.getElementById("country").value;
        console.log ("Error");
        fetch("world.php"+"?country=" +mi_form)
        .then(response =>{
            if (response.ok){
                return response.text()
            } else{
                return Promise.reject("Something went wrong")
            }
        
        })
        .then(data => {
            message.innerHTML = data;
        })
        .catch(error => console.log('There was an error: ' + error));
    });
    searchbtn2.addEventListener('click',function(element){
        element.preventDefault();
        var mi_form = document.getElementById("country").value;
        var cities= document.getElementById("country").value;
        console.log ("Error");
        fetch("world.php"+"?country=" +mi_form + "context=cities")
        .then(response =>{
            if (response.ok){
                return response.text()
            } else{
                return Promise.reject("Something went wrong")
            }
        
        })
        .then(data => {
            message.innerHTML = data;
        })
        .catch(error => console.log('There was an error: ' + error));
    });

}


