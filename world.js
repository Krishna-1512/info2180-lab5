window.onload= mystarter;
function mystarter(){
    let countrybtn = document.getElementById('lookup');
    let citybtn = document.getElementById('l2');
    let message = document.getElementById('result');
    console.log(countrybtn)
    countrybtn.addEventListener('click',function(element){
        element.preventDefault();
        var mi_form = document.getElementById("country").value;
        console.log ("Error");
        fetch("world.php"+"? country=" +mi_form)
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
    citybtn.addEventListener('click',function(element){
        element.preventDefault();
        var mi_form = document.getElementById("country").value;
        var cities= document.getElementById("country").value;
        console.log ("Error");
        fetch("world.php"+"?country= " +mi_form + "context=cities")
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


