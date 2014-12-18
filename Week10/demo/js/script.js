// XML HTTP Request
var xhr = new XMLHttpRequest();

xhr.onreadystatechange = function() { 
    if ( xhr.readyState === 4 && xhr.status === 200 ) {  
        callback();  
   } 
};  

var emailField = document.querySelector('#email');
var emailInfo = document.querySelector('.emailtaken');

emailField.addEventListener('blur',makeAJAXCall);


function makeAJAXCall(){
       
    xhr.open('POST', 'emailtaken.php', true);
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhr.send('email='+emailField.value);

}

function callback() {
        var response = JSON.parse(xhr.responseText);
        emailInfo.innerHTML = response.taken;       
}