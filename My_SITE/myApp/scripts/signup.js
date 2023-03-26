document.querySelector('#signUpForm').addEventListener('submit',
    (event) => {
        const pass1 = document.querySelector('#signUpPass1');
        const pass2 = document.querySelector('#signUpPass2');

        if(pass1.value === pass2.value){
            return true;
        }
        else {
            alert('Passwords do NOT match!');
            event.preventDefault();
        }   
    }
)
document.querySelector('#subscribeForm').addEventListener('submit',
    (event)=>{
        const inputEmail = document.querySelector('#Input1');
        
        if (inputEmail.value == '') {
            alert('Please add an email address!');
            event.preventDefault();
        }
    }
)
